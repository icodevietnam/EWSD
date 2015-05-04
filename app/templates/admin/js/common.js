var notifyAlert = {
	alert:function(){
		bootbox.alert(options.msg,options.callbackFunc);
	},
	confirm : function(){
		bootbox.confirm(options.msg,options.callbackFunc);
	},
	prompt : function(){
		bootbox.prompt(options.msg,options.callbackFunc);
	}
}

options = {
	msg : 'Default value',
	callbackFunc : function(result){
	}
}


