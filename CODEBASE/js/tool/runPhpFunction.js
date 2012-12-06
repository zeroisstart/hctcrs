$.fn.setFormParam = function(json, form, submit) {

	var	_input = $('<input>').attr(json);
	submit && form.append(_input).submit();

};

$(document).ready(function() {
	$('.functions_names a').click(function() {
		$(this).setFormParam({
			'name' : 'funcName',
			'value' : $(this).text(),
			'type' : 'hidden'
		}, $('form'), 1);
	})

	$('.args_btn a').click(function() {
		$(this).setFormParam({
			'name' : 'args',
			'value' : $(this).text(),
			'type' : 'hidden'
		}, $('form'), 1);
	})
});
