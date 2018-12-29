jQuery(function(){
	//Menu mobile
	$('.toggle-menu').click(function() {
		$(this).toggleClass('change');
		$('.menu-main').fadeToggle();
		return false;
	});
	$('.slider-slick').slick({
		dots: true,
	 });
	$('.slider-hservices').slick({
		centerMode: true,
		arrows: false,
		dots: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 576,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerMode: true,
				dots: true,
				arrows: false,
			  }
			}
		]
	});
	//popup
	$('body').on('click','.show-popup',function() {
		var href = $(this).attr('href');
		$(href).fadeIn();
		$('html').addClass('noscroll');
		return false;
	});
	$('.popup-close').on('click',function() {
		$(this).parents('.popup').fadeOut();
		$('html').removeClass('noscroll');
		return false;
	});
	//Checkbox
	$('.sidebar-solution .widget .it-form label').on('click',function(){
		$(this).parents('.it-form').toggleClass('active');
		$(this).toggleClass('active');
	});
	
	$('.filter').on('click',function(){
		$(this).toggleClass('active');
		$('.sidebar-solution').toggleClass('active');
	  return false;
	});	

	$('.back-topp').click(function(){
		$('html, body').animate({scrollTop : 0},400);
		return false;
	});
});
jQuery(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('.back-topp').fadeIn();
	} else {
		$('.back-topp').fadeOut();
	}
});
jQuery(window).load(function(){	
	 $('.slider-slick-mb').slick({
		dots: true,
	 });
});