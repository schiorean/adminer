$(function(){
	$('body').keydown(function(event) {
		var scrollTarget = $(this).find('pre.sqlarea.jush');
		if (scrollTarget.length == 0) {
			scrollTarget = $(this).find('textarea.sqlarea');
		}

		var form = scrollTarget.closest('form');

		if (event.ctrlKey && event.keyCode === 13) {
			// Ctrl+Enter
			event.preventDefault();
			form.submit();

		} else if (event.ctrlKey && event.keyCode == 32) {
			scrollTarget.focus();

			// Ctrl+Space
			$('html, body').animate({
    			scrollTop: (scrollTarget.offset().top),
			},0);
		}
	})
});
