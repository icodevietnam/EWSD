var notifyAlert = {
	alert:function(){
		bootbox.alert(notifys.msg,notifys.callbackFunc);
	},
	confirm : function(){
		bootbox.confirm(notifys.msg,notifys.callbackFunc);
	},
	prompt : function(){
		bootbox.prompt(notifys.msg,notifys.callbackFunc);
	}
}

notifys = {
	msg : 'Default value',
	callbackFunc : function(result){
	}
}


