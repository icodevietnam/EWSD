$(function () {

    initialize();

    function initialize() {
        getAll();
    }

});

function getAll() {
    var dataSrc = [];
    var url = '/EWSD/account/getAll';
    var num = 0;
    var currentRole = $("#currentRole").html();
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
          var temp = [num,item.name,item.birthday,item.address,item.username,item.gender,item.email,showEditButton(currentRole,item.role_name,item.id,item.role_id),showDeleteButton(currentRole,item.role_name,item.id,item.role_id)];
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
                {"sTitle": "birthday"},
                {"sTitle": "address"},
                {"sTitle": "username"},
                {"sTitle": "gender"},
                {"sTitle": "email"},
                {"sTitle": "Edit"},
                {"sTitle": "Delete"}
            ]
        });
    })
}

function showEditButton(currentRole,roleName,userId,roleId){
  if(currentRole !=  roleName){
     return "<button onclick='javascript:viewEditCreate("+ userId +","+roleId+")' class='btn btn-default' data-toggle='modal' data-target='#crudCreate' >Edit</button>"
  }
  return "";
}

function showDeleteButton(currentRole,roleName,userId,roleId){
  if(currentRole !=  roleName){
    return "<button onclick='javascript:deleteItem("+ userId + "," + roleId + ")' class='btn btn-danger'>Delete</button>"
  }
  return "";
}

function showDivPassword(){
    $(".ipPassword").show();
    $(".ipConfirmpassword").show();
    $(".ipUsername").show();
}

function viewEditCreate(id, roleId) {
    var url = '/EWSD/account/get';
    $('span#modelId').html(id);
    $('span#roleId').html(roleId);
    if (id != 0) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function (response) {
                removeCheckBox();
                $("input[name='name']").val(response.name);
                $("input[name='address']").val(response.address);
                $("input[name='email']").val(response.email);
                $("input[name='username']").val(response.username);
                $.each($("input[name='gender']"), function (key, value) {
                    if ($(value).val() == response.gender) {
                        $(value).prop('checked', 'checked');
                    }
                });
                $.each($("input[name='role']"), function (key, value) {
                    if ($(value).val() == roleId) {
                        $(value).prop('checked', 'checked');
                    }
                });
                var birthDate = response.birthday.split(" ")[0];
                $("#birthday .form-control").val(birthDate);
                $(".ipPassword").hide();
                $(".ipUsername").hide();
                $(".ipConfirmpassword").hide();
            },
            error: function (e) {
                alert('Error in loading data:' + e);
            }
        });
    }
    return;
}

function removeCheckBox() {
    $("input[name='gender']").removeAttr("checked");
    $("input[name='role']").removeAttr("checked");
}

function actionEditCreate() {
    var id = $('span#modelId').html();
    var oldRoleId = $('span#roleId').html();
    var name = $("input[name='name']").val();
    var address = $("input[name='address']").val();
    var username = $("input[name='username']").val();
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();
    var confirmPassword = $("input[name='confirmpassword']").val();
    var birthday = $("#birthday .form-control").val();
    var gender = $("input[name='gender']:checked").val();
    var role = $("input[name='role']:checked").val();
    if (id != 0) {
        var url = '/EWSD/account/edit';
        if (name != "" && address != "" &&  isValidEmailAddress(email) && birthday != "" && gender != null && role != null && name.length > 4 && address.length > 4 &&  email.length > 4) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    address: address,
                    email: email,
                    birthday: birthday,
                    gender: gender,
                    role: role,
                    oldRoleId: oldRoleId
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.msg);
                },
                error: function (e) {
                    console.table(e);
                    console.log('Error in loading data:' + e);
                }
            });
            resetValue();
            getAll();
        } else {
            alert('Invalid data! Please input again!')
        }
    }
    else {
        var url = '/EWSD/account/save';
        if (name != "" && address != "" && username != "" && confirmPassword != "" && isValidEmailAddress(email) && password != "" && birthday != "" && gender != null && role != null && name.length > 4 && address.length > 4 && username.length > 4 && email.length > 4 && password.length > 4 && confirmPassword.length > 4 && password == confirmPassword) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    name: name,
                    address: address,
                    username: username,
                    password: password,
                    email: email,
                    birthday: birthday,
                    gender: gender,
                    role: role
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.msg);
                },
                error: function (e) {
                    console.log('Error in loading data:' + e);
                }
            });
            resetValue();
            getAll();
        } else {
            alert('Invalid data! Please input again!')
        }
    }
}

function processDelete(id, roleId) {
    var url = '/EWSD/account/delete';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            id: id,
            roleId: roleId
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

function deleteItem(id, roleId) {
    notifys.mId = id;
    notifys.mRoleId = roleId;
    notifyAlert.confirm(notifys.msg);
}

function resetValue() {
    closeModal();
    $('span#modelId').html(0);
    var name = $("input[name='name']").val('');
    var address = $("input[name='address']").val('');
    var username = $("input[name='username']").val('');
    var email = $("input[name='email']").val('');
    var password = $("input[name='password']").val('');
    var birthday = $("#birthday .form-control").val('2015-05-08');
}

function closeModal() {
    $('#crudCreate').modal('hide');
}

notifys = {
    mId: 0,
    mRoleId: 0,
    msg: 'Are you sure to delete this item?',
    callbackFunc: function (result) {
        var id = notifys.mId;
        var roleId = notifys.mRoleId;
        if (result) {
            processDelete(id, roleId);
        }
    }
}