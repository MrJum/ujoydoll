/*
Powered by ly200.com		http://www.ly200.com
广州联雅网络科技有限公司		020-83226791
*/
window.onresize = function(){
	l = $('#prev');
	r = $('#next');
	var $Img = $('.small_img_list span');
	var $oDiv = $('.small_img_list .bd')
	var $iWidth = parseInt($Img.width()+parseInt($Img.css("margin-left"))+parseInt($Img.css("margin-right")));//$Img的marginRight
	//alert($iWidth);
	var $len = $Img.length;
	var $sWidth = $len*$iWidth;
	var $maxLength = 3;
	$oDiv.width($sWidth);
	if($len>$maxLength){
		l.click(function(){
			if(!$oDiv.is(":animated")){
				$offLeft = $oDiv.css("left");
				if($offLeft!=parseInt('-'+($sWidth-$iWidth*$maxLength))+"px"){
					$oDiv.animate({left:'-='+($iWidth)+"px"});
				}
			}
		});
		r.click(function(){
			if(!$oDiv.is(":animated")){
				$offLeft = $oDiv.css("left");
				if($offLeft!="0px"){
					$oDiv.animate({left:'+='+($iWidth)+"px"});
				}
			}
		});
	}	
}
$(function ($){
	showthis('.description .hd span','.description .bd >div',0,'cur');
	$('.description .hd span').click(function(){
		showthis('.description .hd span','.description .bd .desc_txt',$(this).index(),'cur');
	});
	nav(".nav .w1160",".nav .i");
	$('#small_img .small_img_list .bd').delegate('span', 'click', function(){
		var img=$(this).attr('pic');
		$('#bigimg_src').attr('src', img).parent().attr('href', img);
		$(this).addClass('on').siblings('span').removeClass('on');
		
		$('#zoom').css('width', 'auto');
		var_j(document).a('domready', MagicZoom.refresh);
		var_j(document).a('mousemove', MagicZoom.z1);
	});  
	
	l = $('#prev');
	r = $('#next');
	var $Img = $('.small_img_list span');
	var $oDiv = $('.small_img_list .bd')
	var $iWidth = parseInt($Img.width()+parseInt($Img.css("margin-left"))+parseInt($Img.css("margin-right")));//$Img的marginRight
	//alert($iWidth);
	var $len = $Img.length;
	var $sWidth = $len*$iWidth;
	var $maxLength = 3;
	$oDiv.width($sWidth);
	if($len>$maxLength){
		l.click(function(){
			if(!$oDiv.is(":animated")){
				$offLeft = $oDiv.css("left");
				if($offLeft!=parseInt('-'+($sWidth-$iWidth*$maxLength))+"px"){
					$oDiv.animate({left:'-='+($iWidth)+"px"});
				}
			}
		});
		r.click(function(){
			if(!$oDiv.is(":animated")){
				$offLeft = $oDiv.css("left");
				if($offLeft!="0px"){
					$oDiv.animate({left:'+='+($iWidth)+"px"});
				}
			}
		});
	}
	
	
});
