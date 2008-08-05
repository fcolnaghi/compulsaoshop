$(function(){

	// Menu Superior
	$('ul.jd_menu').jdMenu();
		// Add menu hiding on document click
		$(document).bind('click', function() {
			$('ul.jd_menu ul:visible').jdMenuHide();
	});
	
	
	/*$(':submit').addClass('submit');
	$(":checkbox").css('border','0px');*/
});