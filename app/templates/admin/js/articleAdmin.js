$(function(){

    $("textarea[name='content']").trumbowyg();

    initialize();

    function initialize(){
        getAll();
    }

});

function getAll(){
    var dataSrc=[];
    var url = '/EWSD/article/getAll';
    var num = 0;
    $.when($.ajax({
        url : url,
        type : 'GET',
        dataType : 'JSON',
        success : function(response){
        },
        error:function(e){
            alert('Error in loading data:'+e);
        }
    })).then(function(data,textStatus,jqXHR){
        $.each(data,function(i,item){
            num++;
            if (item.content.length > 30){
                item.content = item.content.substring(1,30);
            }
            var temp = [num,item.title,item.content,"<button onclick='javascript:viewEditCreate("+ item.id +")' class='btn btn-default' data-toggle='modal' data-target='#crudCreate' >Edit</button>","<button onclick='javascript:deleteItem("+ item.id +")' class='btn btn-danger'>Delete</button>"];
            dataSrc.push(temp);
        });

        $('#tblList').dataTable({
            "bDestroy": true,
            "bSort": true,
            "aaSorting": [],
            "aaData": dataSrc,
            "aoColumns": [
                { "sTitle": "#" },
                { "sTitle": "name" },
                { "sTitle": "Content" },
                { "sTitle": "Edit" },
                { "sTitle": "Delete" }
            ]
        });
    })
}

function viewEditCreate(id){
    var url = '/EWSD/article/get';
    $('span#modelId').html(id);
    if(id!=0){
        $.ajax({
            url : url,
            type : 'GET',
            data :{
                id:id
            },
            dataType : 'JSON',
            success : function(response){
                $("input[name='name']").val(response.title);
                $("textarea[name='content']").val(response.content);
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
        });
    }
    return;
}

function actionEditCreate(){
    var id = $('span#modelId').html();
    var name = $("input[name='name']").val();
    var content = $("textarea[name='content']").val();
    if(id != 0){
        var url = '/EWSD/article/edit';
        $.ajax({
            url : url,
            type : 'POST',
            data :{
                id : id,
                name :name,
                content : content
            },
            dataType : 'JSON',
            success : function(response){
                console.log(response.msg);
            },
            error:function(e){
                console.table(e);
                alert('Error in loading data:'+e);
            }
        });
    }
    else{
        var url = '/EWSD/article/save';
        $.ajax({
            url : url,
            type : 'POST',
            data :{
                name :name,
                content : content
            },
            dataType : 'JSON',
            success : function(response){
                console.log(response.msg);
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
        });
    }
    resetValue();
    getAll();
}

function processDelete(id){
    var url = '/EWSD/article/delete';
    $.ajax({
        url : url,
        type : 'POST',
        data :{
            id : id
        },
        dataType : 'JSON',
        success : function(response){
            console.log(response.msg);
        },
        error:function(e){
            alert('Error in loading data:'+e);
        }
    });
    resetValue();
    getAll();
}

function deleteItem(id){
    notifys.mId = id;
    notifyAlert.confirm(notifys.msg);
}

function resetValue(){
    closeModal();
    $('span#modelId').html(0);
    $("input[name='name']").val('');
    $("textarea[name='content']").val('');
}

function closeModal(){
    $('#crudCreate').modal('hide');
}

notifys = {
    mId : 0,
    msg : 'Are you sure to delete this item?',
    callbackFunc : function(result){
        var id = notifys.mId;
        if(result){
            processDelete(id);
        }
    }
}