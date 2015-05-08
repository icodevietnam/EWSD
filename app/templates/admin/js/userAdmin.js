$(function(){

  initialize();

  function initialize(){
    getAll();
  }

});

function getAll(){
    var dataSrc=[];
    var url = '/EWSD/account/getAll';
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
          var temp = [num,item.name,item.birthday,item.address,item.username,item.gender,item.email,"<button onclick='javascript:viewEditCreate("+ item.id +")' class='btn btn-default' data-toggle='modal' data-target='#crudCreate' >Edit</button>","<button onclick='javascript:deleteItem("+ item.id +")' class='btn btn-danger'>Delete</button>"];
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
        { "sTitle": "birthday" },
        { "sTitle": "address" },
        { "sTitle": "username" },
        { "sTitle": "gender" },
        { "sTitle": "email" },
        { "sTitle": "Edit" },
        { "sTitle": "Delete" }
        ]
      });
    })
}

function showDivPassword(){
    $(".ipPassword").show();
    $(".ipConfirmpassword").show();   
}

function viewEditCreate(id){
    var url = '/EWSD/account/get';
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
          $("input[name='name']").val(response.name);
          $("input[name='address']").val(response.address);
          $("input[name='email']").val(response.email);
          $("input[name='username']").val(response.username);
          var birthDate = response.birthday.split(" ")[0];
          $("#birthday .form-control").val(birthDate);
          $(".ipPassword").hide();
          $(".ipConfirmpassword").hide();
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
      var url = '/EWSD/course/edit';
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
      var url = '/EWSD/course/save';
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
  var url = '/EWSD/course/delete';
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