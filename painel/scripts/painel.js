$(function(){

	// show a simple loading indicator
	var loader = jQuery('<div id="loader"><span id="loader-content"><img src="../images/loading.gif" alt="Carregando..." /> Carregando...</span></div>')
		.hide()
		.appendTo("body");
	jQuery().ajaxStart(function() {
		loader.show();
	}).ajaxStop(function() {
		loader.hide();
	}).ajaxError(function(a, b, e) {
		throw e;
	});

	// Menu Superior
	$('ul.jd_menu').jdMenu();
		// Add menu hiding on document click
		$(document).bind('click', function() {
			$('ul.jd_menu ul:visible').jdMenuHide();
	});
	
	
	/*$(':submit').addClass('submit');
	$(":checkbox").css('border','0px');*/
});