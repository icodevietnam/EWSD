$(function(){
  
  initialize();
  alert("Dep trai");
  function initialize(){
    getProject();
  }

});

function getProject(){
  var url = '/EWSD/project/getProject';
  $.ajax({
            url : url,
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                $.each(response,function(k,v){
                  $('#selectProject').append("<option value='"+v.id+"'>"+v.name + "</option>");
                })
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
  });
}



