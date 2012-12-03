$.fn.setFormParam = function(txt, form) {
	var _input = $('<input>').attr({
		'name' : 'funcName',
		'value' : txt,
		'type' : 'hidden'
	});
	form.append(_input).submit();
}

$(function() {
	$('.functions_names a').click(function() {
		$(this).setFormParam($(this).text(), $('form'));
	})
})();