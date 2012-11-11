$(document).ready(function() {
	$('.search_bar_form').bind('mouseover', function() {
		var $input = $(this).find('input');
		$input.addClass('text-border-over')
	})
	$('.search_bar_form').bind(' mouseout', function() {
		var $input = $(this).find('input');
		$input.removeClass('text-border-over')
	})
})