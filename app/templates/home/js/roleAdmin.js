$(function(){

  initialize();



  function initialize(){
    getAll();
  }


  function getAll(){
    var dataSrc=[];
    var url = '/EWSD/role/getAll';
    var num = 0;
    $.when($.ajax({
      url : url,
      type : 'GET',
      dataType : 'JSON',
      success : function(response){

      },
      error:function(e){
        alert('Error in loading data');
      }
    })).then(function(data,textStatus,jqXHR){
      $.each(data,function(i,item){
          num++;
          var temp = [num,item.name,item.description,"<button class='btn btn-default'>Edit</button>","<button class='btn btn-danger'>Delete</button>"];
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
        { "sTitle": "Description" },
        { "sTitle": "Edit" },
        { "sTitle": "Delete" }
        ]
      });
    })
  }

});