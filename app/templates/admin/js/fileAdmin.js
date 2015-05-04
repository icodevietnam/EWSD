$(function () {

    initialize();

    function initialize() {
        getAll();
    }

    function getAll() {
        var dataSrc = [];
        var url = '/EWSD/file/getAll';
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
        var temp1 = [1, "File 1", "jpg", "/image/", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='1'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='1'>Delete</button>"];
        var temp2 = [2, "File 2", "jpg", "/image/", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='2'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='2'>Delete</button>"];
        var temp3 = [3, "File 3", "jpg", "/image/", "<button class='btn btn-default btn-edit' data-toggle='modal' data-target='#popup-modal' data-id='3'>Edit</button>", "<button class='btn btn-danger btn-delete' data-toggle='modal' data-target='#delete-modal' data-id='3'>Delete</button>"];
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
                {"sTitle": "File name"},
                {"sTitle": "Extension"},
                {"sTitle": "Path"},
                {"sTitle": "Edit"},
                {"sTitle": "Delete"}
            ]
        });


        //})
    }

    $('.btn-edit').click(function () {
        var dataId = $(this).data('id');
        $('.save-form #txtFileName').val('File ' + dataId);
        $('.save-form #txtExtension').val('jpg');
        $('.save-form #txtPath').val('/image/');
    });

    $('.btn-create').click(function(){
        $('.save-form #txtFileName').val(null);
        $('.save-form #txtExtension').val(null);
        $('.save-form #txtPath').val(null);
    });

    $('.btn-yes').click(function(){
        //$('#delete-modal').fadeOut();
       alert('Delete successfully!')
    });
});