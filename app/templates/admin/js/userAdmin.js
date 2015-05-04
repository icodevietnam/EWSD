$(function () {

    initialize();

    function initialize() {
        getAll();
    }

    function getAll() {
        var dataSrc = [];
        var url = '/EWSD/user/getAll';
        var num = 0;
        //$.when($.ajax({
        //  url : url,
        //  type : 'GET',
        //  dataType : 'JSON',
        //  success : function(response){
        //
        //  },
        //  error:function(e){
        //    alert('Error in loading data');
        //  }
        //})).then(function(data,textStatus,jqXHR){
        //  $.each(data,function(i,item){
        //      num++;
        //      var temp = [num,item.name,item.description,"<button class='btn btn-default btn-edit'>Edit</button>","<button class='btn btn-danger btn-create'>Delete</button>"];
        //      dataSrc.push(temp);
        //  });
        var temp1 = [1, "User 1", "01/01/1991", "Q1, Ho Chi Minh", "User1", "Male", "user1@fpt.com", "Supervisor 1", "Second marker 1", "Project 1"];
        var temp3 = [3, "User 3", "03/03/3993", "Q3, Ho Chi Minh", "User3", "Male", "user3@fpt.com", "Supervisor 3", "Second marker 3", "Project 3"];
        dataSrc.push(temp1);
        //dataSrc.push(temp2);
        dataSrc.push(temp3);
        $('#tblList').dataTable({
            "bDestroy": true,
            "bSort": true,
            "aaSorting": [],
            "aaData": dataSrc,
            "aoColumns": [
                {"sTitle": "#"},
                {"sTitle": "Name"},
                {"sTitle": "Birthday"},
                {"sTitle": "Address"},
                {"sTitle": "Username"},
                {"sTitle": "Password"},
                {"sTitle": "Gender"},
                {"sTitle": "Email"},
                {"sTitle": "Supervisor"},
                {"sTitle": "Second_marker"}
            ]
        });


        //})
    }

    $('.btn-edit').click(function () {
        var dataId = $(this).data('id');
        $('.save-form #txtName').val('User ' + dataId);
        $('.save-form #txtBirthday').val('0' + dataId + '/0' + dataId + '/' + dataId + '99' + dataId);
        $('.save-form #txtAddress').val('Q' + dataId + ', Ho Chi Minh');
        $('.save-form #txtEmail').val('user' + dataId + '@fpt.com');
        $('.save-form #txtUsername').val('User' + dataId);
        $('.save-form #txtPassword').val(dataId + dataId + dataId);
        $('.save-form #txtConfirmPassword').val(dataId + dataId + dataId);
    });

    $('.btn-create').click(function(){
        $('.save-form #txtName').val(null);
        $('.save-form #txtBirthday').val(null);
        $('.save-form #txtAddress').val(null);
        $('.save-form #txtEmail').val(null);
        $('.save-form #txtUsername').val(null);
        $('.save-form #txtPassword').val(null);
        $('.save-form #txtConfirmPassword').val(null);
    });

    $('.btn-yes').click(function(){
        //$('#delete-modal').fadeOut();
        alert('Delete successfully!')
    });
});