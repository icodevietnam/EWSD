$(function () {

    initialize();

    function initialize() {
        getAll();
    }

    function getAll() {
        var dataSrc = [];
        var url = '/EWSD/role/getAll';
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
        var temp1 = [1, "role 1", "This is role 1", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='1'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='1'>Delete</button>"];
        var temp2 = [2, "role 2", "This is role 2", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='2'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='2'>Delete</button>"];
        var temp3 = [3, "role 3", "This is role 3", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='3'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='3'>Delete</button>"];
        dataSrc.push(temp1);
        dataSrc.push(temp2);
        dataSrc.push(temp3);
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


        //})
    }

    $('.btn-edit').click(function () {
        var dataId = $(this).data('id');
        $('.save-form #txtName').val('role ' + dataId);
        $('.save-form #txtDescription').val('This is role ' + dataId);
    });

    $('.btn-create').click(function(){
        $('.save-form #txtName').val(null);
        $('.save-form #txtDescription').val(null);
    });

    $('.btn-yes').click(function(){
        //$('#delete-modal').fadeOut();
        alert('Delete successfully!')
    });
});