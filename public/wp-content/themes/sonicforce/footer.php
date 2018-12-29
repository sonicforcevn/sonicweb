<footer id="footer">
   <div class="copyright text-center">
      <div class="container">
         <p><?php the_field('copyright','option'); ?></p>
      </div>
   </div>
</footer>
<div class="back-topp">
	<a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/Top.png" alt="" /></a>
</div>
<!--  End footer -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mcs.animate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox3/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mcs.custom.js"></script>
<script type="text/javascript">	
$(window).load(function(){
	$('.menu-onepage').on('click',function() {
		var neo = $(this).find('a').attr('href');
		if($('body').hasClass('home')){				
			$('html,body').animate({ scrollTop: $(neo).offset().top - $('#header').outerHeight() }, 1200);
			if($(window).width() < 992) {
				$('.menu-main').fadeOut();
				$('.toggle-menu').removeClass('change');
			}
		} else{	
			window.location.href = "<?php echo home_url(); ?>"+neo;		
		}
		return false;
	});
	if($(window).width() < 992){
		$('#menu-menu-main > .menu-item-has-children > a').on('click',function() {
			$(this).parents('li').find('ul').slideToggle();
			return false;
		});
	}
});
</script>
<?php wp_footer();?>
</body>
</html>
