jQuery(function(){
	var host=window.location.host;
	var referer=document.referrer;
	if(/^[^m].(.*)\.ly200\.net(.*)$/g.test(host) || /^[^m].(.*)\.ueeshop\.com(.*)$/g.test(host)){// && setStr.IsMobile!='Y'
		var toper='<link type="text/css" rel="stylesheet" href="http://www.ueeshop.com/css/open.css" /><div id="open_title"><div id="open_inner"><img src="http://www.ueeshop.com/images/ul.png" class="fl" /><div class="fr open_fr"><div class="opfl"></div><div class="fr fr_inner"><div class="fwrx">服务热线：</div><div class="item">400-9922-270</div><img src="http://www.ueeshop.com/images/l3.png" class="fr close" /></div></div><div class="clear">,/div></div></div>';
		
		jQuery('body').prepend(toper).css('margin-top', '44px');
		jQuery('body').delegate('#open_title .close', 'click', function(){jQuery('#open_title').fadeOut();jQuery('html,body').animate({marginTop:'0px'}, 500);});
		
		referer.indexOf(host)==-1 && jQuery('body').append('<iframe src="/source.php?referer='+referer+'" style="display:none;"></iframe>');
		
		jQuery('body').delegate('#open_title .opfl', 'click', function(){
			jQuery.get('/source.php', '', function(data){
				window.location.href="http://"+(data.ret==1?data.msg:'www.ueeseop.com')+"/reg.php";//console.log(data.msg);
			}, 'json');
		});
		
		/*var copyright='<div class="crt">Copyright © 2005-2015 UEESHOP Ltd. All Rights Reserved.&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://www.ueeshop.com" target="_blank">POWERED BY UEESHOP</a></div>';
		jQuery('#footer').append(copyright);
		*/
	}else if(/^(.*)\.vgcart\.com(.*)$/g.test(host)){
		jQuery('.copyright').html('&nbsp;');//.remove();
	}
});
