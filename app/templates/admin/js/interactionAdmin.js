$(function () {

    initialize();

    function initialize() {
        getAll();
    }

});

function getAll() {
    var dataSrc = [];
    var url = '/EWSD/interaction/getAll';
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
            var temp = [num, item.name, item.description, item.type, item.status, "<button onclick='javascript:viewEditCreate(" + item.id + ")' class='btn btn-default' data-toggle='modal' data-target='#crudCreate' >Edit</button>", "<button onclick='javascript:deleteItem(" + item.id + ")' class='btn btn-danger'>Delete</button>"];
            dataSrc.push(temp);
        });

        $('#tblList').dataTable({
            "bDestroy": true,
            "bSort": true,
            "aaSorting": [],
            "aaData": dataSrc,
            "aoColumns": [
                {"sTitle": "#"},
                {"sTitle": "Name"},
                {"sTitle": "Description"},
                {"sTitle": "Type"},
                {"sTitle": "Status"},
                {"sTitle": "Edit"},
                {"sTitle": "Delete"}
            ]
        });
    })
}

function viewEditCreate(id) {
    var url = '/EWSD/interaction/get';
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
                $("input[name='type']").val(response.type);
                $("input[name='status']").prop('checked',response.status);
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
    var type = $("input[name='type']").val();
    var status = $("input[name='status']:checked").val();
    if (id != 0) {
        var url = '/EWSD/interaction/edit';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                name: name,
                description: description,
                type: type,
                status: status
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
    }
    else {
        var url = '/EWSD/interaction/save';
        var file_data = $('#uploadFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('name', name);
        form_data.append('description', description);
        form_data.append('type', type);
        form_data.append('status', status);
        alert(form_data);
        $.ajax({
            url: url, // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                console.log(response.msg);
            },
            error: function (e) {
                alert('Error in loading data:' + e);
            }
        });
    }
    resetValue();
    getAll();
}

function processDelete(id) {
    var url = '/EWSD/interaction/delete';
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