$(document).ready(function() {

	var header_h = 510; // Высота шапки
	var menu = $('#aside1');
	menu.css({'position' : 'fixed', 'top' : header_h + 'px'});
	
	$(window).scroll(function(){
		var top = $(window).scrollTop();
		if(top < header_h){
			menu.css({'top': header_h - top +'px'});
		} else {
			menu.css({'top': '0'});
		}
	});
});
