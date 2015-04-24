$(function(){

  initialize();

  function initialize(){
    getAll();
  }

  function getAll(){
    var dataSrc=[];
    var url = '/EWSD/project/getAll';
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
      var temp1 = [1, "Project 1", "This is project 1", "<button class='btn btn-default btn-edit'>Edit</button>","<button class='btn btn-danger btn-create'>Delete</button>"];
      var temp2 = [2, "Project 2", "This is project 2", "<button class='btn btn-default btn-edit'>Edit</button>","<button class='btn btn-danger btn-create'>Delete</button>"];
      var temp3 = [3, "Project 3", "This is project 3", "<button class='btn btn-default btn-edit'>Edit</button>","<button class='btn btn-danger btn-create'>Delete</button>"];
      dataSrc.push(temp1);
      dataSrc.push(temp2);
      dataSrc.push(temp3);
      $('#tblList').dataTable({
        "bDestroy": true,
        "bSort": true,
        "aaSorting": [],
        "aaData": dataSrc,
        "aoColumns": [
        { "sTitle": "#" },
        { "sTitle": "name" },
        { "sTitle": "Description" },
        { "sTitle": "Edit" },
        { "sTitle": "Delete" }
        ]
      });


    //})
  }
    function showCreateUpdatePopup (){
        $('.popup-over').popover({
            html: true,
            title: function(){
                return $('.modal-header').html();
            },
            content: function(){
                return $('.modal-content').html();
            }
        });
    };

});