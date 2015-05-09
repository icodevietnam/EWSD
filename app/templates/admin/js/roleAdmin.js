$(function () {

    initialize();

    function initialize() {
        getAll();
    }

});

function getAll() {
    var dataSrc = [];
    var url = '/EWSD/role/getAll';
    var num = 0;
    $.when($.ajax({
        url: url,
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {
        },
        error: function (e) {
            alert('Error in loading data:' + e);
        }
    })).then(function (data, textStatus, jqXHR) {
        $.each(data, function (i, item) {
            num++;
            var temp = [num, item.name, item.description, "<button onclick='javascript:viewEditCreate(" + item.id + ")' class='btn btn-default' data-toggle='modal' data-target='#crudCreate' >Edit</button>", "<button onclick='javascript:deleteItem(" + item.id + ")' class='btn btn-danger'>Delete</button>"];
            dataSrc.push(temp);
        });

        $('#tblList').dataTable({
            "bDestroy": true,
            "bSort": true,
            "aaSorting": [],
            "aaData": dataSrc,
            "aoColumns": [
                {"sTitle": "#"},
                {"sTitle": "name"},
                {"sTitle": "Description"},
                {"sTitle": "Edit"},
                {"sTitle": "Delete"}
            ]
        });
    })
}

function viewEditCreate(id) {
    var url = '/EWSD/role/get';
    $('span#modelId').html(id);
    if (id != 0) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function (response) {
                $("input[name='name']").val(response.name);
                $("input[name='description']").val(response.description);
            },
            error: function (e) {
                alert('Error in loading data:' + e);
            }
        });
    }
    return;
}

function actionEditCreate() {
    var id = $('span#modelId').html();
    var name = $("input[name='name']").val();
    var description = $("input[name='description']").val();
    if (id != 0) {
        var url = '/EWSD/role/edit';
        if (name != "" && description != "" && name.length > 4 && description.length > 4) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    description: description
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.msg);
                },
                error: function (e) {
                    console.table(e);
                    alert('Error in loading data:' + e);
                }
            });
            resetValue();
            getAll();
        } else {
            alert('Invalid data! Please input again!')
        }
    }
    else {
        var url = '/EWSD/role/save';
        if (name != "" && description != "" && name.length > 4 && description.length > 4) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    name: name,
                    description: description
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.msg);
                },
                error: function (e) {
                    alert('Error in loading data:' + e);
                }
            });
            resetValue();
            getAll();
        } else {
            alert('Invalid data! Please input again!')
        }
    }
}

function processDelete(id) {
    var url = '/EWSD/role/delete';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'JSON',
        success: function (response) {
            console.log(response.msg);
        },
        error: function (e) {
            alert('Error in loading data:' + e);
        }
    });
    resetValue();
    getAll();
}

function deleteItem(id) {
    notifys.mId = id;
    notifyAlert.confirm(notifys.msg);
}

function resetValue() {
    closeModal();
    $('span#modelId').html(0);
    $("input[name='name']").val('');
    $("input[name='description']").val('');
}

function closeModal() {
    $('#crudCreate').modal('hide');
}

notifys = {
    mId: 0,
    msg: 'Are you sure to delete this item?',
    callbackFunc: function (result) {
        var id = notifys.mId;
        if (result) {
            processDelete(id);
        }
    }
}