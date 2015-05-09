$(function(){
  
  initialize();
  function initialize(){
    getProject();
  }

  $("#divStudent").hide();
  $("#divSupervisor").hide();
  $("#divSecondMarker").hide();

  
  
  
  $("#projNext").click(function(e){
    e.preventDefault();
    $("#divStudent").show();
    $('#selectStudent').empty();
    var url = '/EWSD/account/getStudent';
    $.ajax({
            url : url,
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                $.each(response,function(k,v){
                  $('#selectStudent').append("<option value='"+v.id+"'>"+v.name + "</option>");
                })
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
    });
    $("#projNext").hide();
  });

  $("#studPrev").click(function(e){
    e.preventDefault();
    $("#divStudent").hide();
    $("#projNext").show();
  });

  $("#studNext").click(function(e){
    e.preventDefault();
    $("#divSupervisor").show();
    var url = '/EWSD/account/getStaff';
    alert($('#selectStudent').val());
    $.ajax({
            url : url,
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                $.each(response,function(k,v){
                  $('#selectSupervisor').append("<option value='"+v.id+"'>"+v.name + "</option>");
                })
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
    });
    $("#studNext").hide();
    $("#studPrev").hide();
  });

  $("#supePrev").click(function(e){
    e.preventDefault();
    $("#selectSupervisor").empty();
    $("#divSupervisor").hide();
    $("#studNext").show();
    $("#studPrev").show();    
  });

  $("#supeNext").click(function(e){
    e.preventDefault();
    $("#divSecondMarker").show();
    staffId = $("#selectSupervisor").val(); 
    var url = '/EWSD/account/getStaff';
    $('#selectSecondMarker').empty();
    $.ajax({
            url : url,
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                $.each(response,function(k,v){
                  if(v.id != staffId){
                    $('#selectSecondMarker').append("<option value='"+v.id+"'>"+v.name + "</option>");
                  }
                })
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
    });

    $("#supeNext").hide();
    $("#supePrev").hide();
  });

  $("#selectSupervisor").change(function(){
    staffId = $("#selectSupervisor").val(); 
    $("#selectSecondMarker").empty();
    var url = '/EWSD/account/getStaff';
    $.ajax({
            url : url,
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                $.each(response,function(k,v){
                  if(v.id != staffId){
                    $('#selectSecondMarker').append("<option value='"+v.id+"'>"+v.name + "</option>");
                  }
                })
            },
            error:function(e){
                alert('Error in loading data:'+e);
            }
    });
  });

  $("#secoPrev").click(function(e){
    $("#supeNext").show();
    $("#supePrev").show();
    $("#selectSecondMarker").empty();
    $("#divSecondMarker").hide();
  });

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



