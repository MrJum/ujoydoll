function changeContentOrder(o, reqUrl){
	
	 var cname = o.name;
	 
	 var cid = 0;
	 var cs = cname.split("_");
	 
	 if(cs && cs.length > 1){
		 cid = cs[1];
	 }
	 
	 var args = {
			  "id":cid,
	          "order":o.value
	        };

    $.post(reqUrl + '/changeContentOrder',args,function(data){
        window.location.reload();
    });
}

function show_err_alert(title, message){
	bootbox.alert({
		title: '<div class="yyg-msg-title"><span class="glyphicon glyphicon-remove-circle yyg-error" aria-hidden="true"></span>' + title + '</div>',
		message: '<div class="yyg-msg-message">' + message + '</div>',
		size: 'small'
	});
}

function show_success_alert(title, message, callback){
	bootbox.alert({
		title: '<div class="yyg-msg-title"><span class="glyphicon glyphicon-ok yyg-success" aria-hidden="true"></span>' + title + '</div>',
		message: '<div class="yyg-msg-message">' + message + '</div>',
		size: 'small',
		callback:callback
	});
}

function comm_parseJsonResult(result) {
	if(typeof result != 'object'){
		result = JSON.parse(result);
	}
	if(result['errCode'] != 0){
		show_err_alert('错误', result['errMsg']);
	}else{
		return result['data'];
	}
}

var getEvent = function(){
	return window.event || arguments.callee.caller.arguments[0];
};

var yygcms_confirm = function (message, callback) {
	bootbox.confirm({size:"small",message : message,
		buttons: {
			confirm: {
				label: '确定',
				className: 'btn-success'
			},
			cancel: {
				label: '取消',
				className: 'btn-danger'
			}
		},
		callback : function(result){
			if(result){
				callback(result);
			}
		}});
};


var yygcms_logout = function(url){
	bootbox.confirm({size:"small",message : '确定要退出？',
		buttons: {
			confirm: {
				label: '确定',
				className: 'btn-success'
			},
			cancel: {
				label: '取消',
				className: 'btn-danger'
			}
		},
		callback : function(result){
			if(result){
				window.location.href = url;
			}
		}});
};

function yyg_check_login(data){
	if(data['errCode'] == -2){
		setTimeout("window.location.href = '/'", 1000);
	}
}
