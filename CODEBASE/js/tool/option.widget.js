/**
 * 
 * 
 */
$.clkPostCmd = function(domElement) {
	$(domElement).bind('click', function() {
		console.log(this);
	})
}
$.fn.loopBind = function(func) {
	$.each(this, function(k, v) {
		func(v);
	})
}

$.fn.bindGetForm = function(form) {
	var _p = $(this);
	var _url = _p.attr('href');
	_p.click(function() {
		form.attr({
			'action' : _url,
			'method' : 'POST'
		}).submit();
		// form.submit();
		return false;
	})
}

$(function() {
	$('.clkPostCmd').loopBind($.clkPostCmd);

	$('#add_new_bookmark').bindGetForm($('#bookmark-_form-form'));
})