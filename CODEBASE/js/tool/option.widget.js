
/**
 * 
 * 
 */
$.clkPostCmd = function(domElement){	
	$(domElement).bind('click',function(){
		console.log(this);
	})
}
$.fn.loopBind = function(func){
	$.each(this,function(k,v){
		func(v);
	})
}


$(function(){
	$('.clkPostCmd').loopBind($.clkPostCmd);
})