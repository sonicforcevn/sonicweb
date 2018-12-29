<?php 
/* Template Name: Home */
$pageid = get_the_ID();
get_header();
the_post();
?>
<main id="content" class="content-home">
	<div id="home" class="banner-home banner-general content-onepage" style="background-image: url(<?php echo get_field('banner_home',$pageid);?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-12">
					<div class="animated fade-left">
						<h1><?php echo get_field('title_intro',$pageid);?></h1>
						<p><?php echo get_field('description_intro',$pageid); ?></p>
						<div class="menu-onepage"><a href="#contact">Contact</a></div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="img-intro  animated fade-right"><img src="<?php echo get_field('image_intro',$pageid); ?>" alt="" /></div>
				</div>
			</div>
		</div>
	</div>
	<div id="services" class="services content-general content-onepage">
      	<div class="container">
	        <div class="content-services">
	            <div class="container-inner">
	               <h2 class="title-main animated fade-in"><?php echo get_field('title_services',$pageid); ?></h2>
	               <p class="description  animated fade-in"><?php echo get_field('des_services',$pageid); ?></p>
	               <div class="slider-services slider-slick">
						<?php
							$listservices = get_field('list_services',$pageid);
							$counts = count($listservices);
							if($listservices){
							$check = 1;
						?>
	                    <div class="item-slider-services">
		                    <div class="row">
		                     	<?php foreach($listservices as $index=>$lsv )	{ ?>
								<div class="col-lg-4 col-md-6 col-sm-12">
								   <div class="item-services animated fade-in">
									  <div class="thumbnail">
										 <img src="<?php echo $lsv['icon_services']; ?>" alt="">	
									  </div>
									  <div class="services-name">
										 <p><?php echo $lsv['name_services']; ?></p>
									  </div>
								   </div>
								</div>
								<?php 
								if($check%6 == 0 && $check < $counts) {
								?>
								</div> 
								</div>
								 <div class="item-slider-services">
								<div class="row">
								<?php
								} $check++;  } ?>
							</div> 
						</div>
						<?php } ?>
	            	</div>
					<div class="slider-services slider-slick-mb">
					  <div class="item-slider-services">
						 <div class="row slider-hservices">
							<?php
								$listservices = get_field('list_services',$pageid);
								if($listservices){
								foreach($listservices as $lsv )	{ 
							?>
								<div class="col-lg-4 col-md-6 col-sm-12">
								   <div class="item-services animated fade-in">
									  <div class="thumbnail">
										 <img src="<?php echo $lsv['icon_services']; ?>" alt="">	
									  </div>
									  <div class="services-name">
										 <p><?php echo $lsv['name_services']; ?></p>
									  </div>
								   </div>
								</div>
							<?php }} ?>
						 </div>
					  </div>
				   </div>
	         	</div>
	     	</div>
		</div>
	</div>
	<?php 
		$length = 99999;
		if(get_field('solution_excerpt_length','option') || get_field('solution_excerpt_length','option') != 0) $length = get_field('solution_excerpt_length','option');
	?>
   	<div id="solutions" class="solution content-general content-onepage">
      <div class="container">
         <div class="content-solutions">
            <div class="container-inner">
               <h2 class="title-main animated fade-in"><?php echo get_field('title_solution',$pageid); ?></h2>
               <p class="description animated fade-in">
                 <?php echo get_field('des_solution',$pageid); ?>
               </p>
               <a class="view" href="<?php echo get_permalink(21); ?>">VIEW ALL</a>
               <div class="list-solution slider-slick">
					 <?php $hsolution_feature = get_field('hsolution_feature',$pageid); 
							$counts = count($hsolution_feature);
							if($hsolution_feature) {
							$check = 1;
						?>
						<div class="item-list-solution">
							<ul class="row list-hsolution">
								<?php foreach($hsolution_feature as $index=>$sl)	{ ?>
								<li class="col-sm-6">
								   <div class="item-solution animated fade-in">
									  <div class="solution-image banner-general" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($sl)); ?>);">
										 <a href="<?php echo get_permalink($sl); ?>"></a>	
									  </div>
									  <div class="content-item">
										 <h3  class="sub-title"><a href="<?php echo get_permalink($sl); ?>"><?php echo get_the_title($sl); ?></a></h3>
										 <p><?php echo wp_trim_words(get_the_excerpt($sl), $length); ?></p>
										 <a class="btn-more" href="<?php echo get_permalink($sl); ?>">Learn about <?php echo get_the_title($sl); ?><img src=" <?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a>
									  </div>
								   </div>	
								</li>
								<?php 
								if($check%4 == 0 && $check < $counts) {
								?>
							</ul>
						</div>
						<div class="item-list-solution">
							<ul class="row list-hsolution">
						<?php
						} $check++;  } ?>
						</ul> 
						</div>
					<?php } ?>
               </div>
               <div class="list-solution slider-slick-mb">
                  <div class="item-list-solution">
                     <ul class="row list-hsolution slider-hservices">
					  <?php $hsolution_feature = get_field('hsolution_feature',$pageid); 
							if($hsolution_feature) {
							 foreach($hsolution_feature as $sl)	{ 
						?>
                        <li class="col-sm-6">
						   <div class="item-solution animated fade-in">
							  <div class="solution-image banner-general" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($sl)); ?>);">
								 <a href="<?php echo get_permalink($sl); ?>"></a>	
							  </div>
							  <div class="content-item">
								 <h3  class="sub-title"><a href="<?php echo get_permalink($sl); ?>"><?php echo get_the_title($sl); ?></a></h3>
								 <p><?php echo wp_trim_words(get_the_excerpt($sl), $length); ?></p>
								 <a class="btn-more" href="<?php echo get_permalink($sl); ?>">Learn about <?php echo get_the_title($sl); ?><img src=" <?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a>
							  </div>
						   </div>	
						</li>
					<?php }} ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
		$length = 99999;
		if(get_field('expertise_excerpt_length','option') || get_field('expertise_excerpt_length','option') != 0) $length = get_field('expertise_excerpt_length','option');
   ?>
   <div id="expertise" class="expertise content-general content-onepage">
     	<div class="container">
         	<div class="content-expertise">
            <div class="container-inner">
            	<h2 class="title-main animated fade-in"><?php echo get_field('title_expertise',$pageid); ?></h2>
               <p class="description animated fade-in">
                 <?php echo get_field('des-expertise',$pageid); ?>
               </p>
               <div class="list-expertise slider-slick">
					<?php $hexpertise_feature = get_field('hexpertise_feature',$pageid); 
							$counts = count($hexpertise_feature);
							if($hexpertise_feature) {
							$check = 1;
						?>
					  <div class="item-slider">
						 <ul class="row list-hexpertise">
							<?php foreach($hexpertise_feature as $index=>$ex)	{ ?>
							<li class="col-sm-6">
							   <div class="item-expertise animated fade-in">
								  <div class="expertise-image">
									 <a href=""><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($ex)); ?>" alt=""></a>	
								  </div>
								  <div class="content-item">
									 <h3  class="sub-title"><a href="<?php echo get_permalink($ex); ?>"><?php echo get_the_title($ex); ?></a></h3>
									 <p><?php echo wp_trim_words(get_the_excerpt($ex), $length); ?></p>
									 <a class="btn-more" href="<?php echo get_permalink($ex); ?>">Learn more<img src=" <?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a>
								  </div>
							   </div>
							</li>
						   <?php 
							if($check%4 == 0 && $check < $counts) {
							?>
						</ul>
					 </div>
					  <div class="item-slider">
						 <ul class="row list-hexpertise">
						  <?php
							} $check++;  } ?>
						</ul>
					 </div>
                   <?php } ?>    
               </div>
               <div class="list-expertise slider-slick-mb">
                  <div class="item-slider">
                     <div class="row slider-hservices">
						<?php $hexpertise_feature = get_field('hexpertise_feature',$pageid); 
							if($hexpertise_feature) {
							 foreach($hexpertise_feature as $index=>$ex)	{ 
						?>
                        	<div class="col-sm-6">
							   <div class="item-expertise animated fade-in">
								  <div class="expertise-image">
									 <a href=""><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($ex)); ?>" alt=""></a>	
								  </div>
								  <div class="content-item">
									 <h3  class="sub-title"><a href="<?php echo get_permalink($ex); ?>"><?php echo get_the_title($ex); ?></a></h3>
									 <p><?php echo wp_trim_words(get_the_excerpt($ex), $length); ?> </p>
									 <a class="btn-more" href="<?php echo get_permalink($ex); ?>">Learn more<img src=" <?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a>
								  </div>
							   </div>
							</div>
                     	<?php }} ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="partners" class="partners">
      <div class="container">
         <div class="content-partners">
            <div class="container-inner">
               <h2 class="title-main animated fade-in"><?php echo get_field('title_partners',$pageid); ?></h2>
               <p class="description animated fade-in">
                 <?php echo get_field('des_partners',$pageid); ?>
               </p>
            </div>
            <ul>
            	<?php
					$listimages = get_field('list_images');
					if($listimages){
						foreach($listimages as $lsi )	
					{
				?>
               <li  class="animated fade-in">
	               	<a href="<?php echo $lsi['links_img']; ?>">
	               		<img src="<?php echo $lsi['item_images']; ?>" alt="">	
	               	</a>
               </li>
             <?php }} ?>
            </ul>
         </div>
      </div>
   </div>
   <div id="contact" class="contact banner-general content-onepage"  style="background-image: url(<?php echo get_field('bg_contact',$pageid); ?>);">
      <div class="content-contact">
         <div class="container-inner">
             <h2 class="title-main animated fade-in"><?php echo get_field('title_contact',$pageid); ?></h2>
            <p class="description animated fade-in">
                 <?php echo get_field('des_contact',$pageid); ?>
               </p>
         </div>
      </div>
   </div>
   <div class="form-contact">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
				<div class="animated fade-left">
				   <div class="general">
					  <h3>General inquiries</h3>
					  <p>
						 <a class="phone" href="tel:+44 (0)20 3005 8667"><img src=" <?php echo get_template_directory_uri(); ?>/images/phone.png" alt="">+44 (0)20 3005 8667</a>
						 <a class="phone-two" href="tel:+1 (415) 776 1956">+1 (415) 776 1956 </a>
					  </p>
					  <p><a class="link-email" href="mailto:hello@site.co.uk"><img src=" <?php echo get_template_directory_uri(); ?>/images/email.png ">hello@site.co.uk</a></p>
				   </div>
				   <div class="location">
					  <h3>Our location</h3>
					  <p><a href="">Level 1, 244 Smith Street,Fitzroy Vic 3065 AU</a></p>
				   </div>
			   </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 form-content">
				<div class="animated fade-right"><?php echo get_field('form_ctacthtml','option'); ?></div>
            </div>
         </div>
      </div>
   </div> <!-- End form-contact -->
   <div id="map-address">
      <?php echo get_field('contact_googlemap',$pageid); ?>
   </div>
</main>

<?php get_footer(); ?>
<script type="text/javascript">	
	$(window).load(function() {
		var has = window.location.hash;	
		if(has) {		
			$('html, body').animate({			
				scrollTop: $(has).offset().top - $('#header').outerHeight()}, 800);	
		}
		$('.menu-home').on('click',function() {
			$('html,body').animate({ scrollTop: 0 }, 1200);
			if($(window).width() < 992) {
				$('.menu-main').fadeOut();
				$('.toggle-menu').removeClass('change');
			}
			return false;
		});
	});
	$(window).scroll(function() {
		var ws = $(window).scrollTop();
		$('.content-onepage').each(function() {
			var id = '#'+$(this).attr('id');
			var offset = $(this).offset().top - $('#header').height();
			if(ws >= offset) {
				$('.menu-main li').removeClass('current-menu-item');
				$('.menu-onepage').each(function() {
					if($(this).find('a').attr('href') == id) $(this).addClass('current-menu-item');
				});
			}
		});
		if(ws < $('#services').offset().top -  $('#header').height()) {
			$('.menu-home').addClass('current-menu-item');
		}
	});
function recaptchaCallback() {
	var response = grecaptcha.getResponse(),
		$button = jQuery(".button-register");
	jQuery("#hidden-grecaptcha").val(response);
	console.log(jQuery("#registerForm").valid());
	if (jQuery("#registerForm").valid()) {
		$button.attr("disabled", false);
	}
	else {
		$button.attr("disabled", "disabled");
	}
}
	jQuery(function($) {
		$('#contactForm').validate({
			rules: {
				first_name: {
					required: true,
				},
				last_name: {
					required: true
				},
				mobile: {
					required: true,
					number: true
				},
				email: {
					required: true,
					email: true
				},
				company: {
					required: true
				},
				country: {
					required: true
				},
				'00N0l000002YdnE': {
					required: true
				},
				"hidden-grecaptcha": {
				  required: true,
				  minlength: "255"
				}
			},
			messages: {
				'00N0l000002YdnE': {
					required: 'This field is required.'
				},
				mobile: {
					number: 'Phone number is not formatted correctly'
				},
				email: {
					email: 'Email is not formatted correctly'
				},
				"hidden-grecaptcha": {
				  required: 'Please enter the verification code'
				}
			}
		});
		$('#00N0l000002YdnE').change(function() {
			if($(this).val() == 'Others') $("#00N0l000002YOpB").rules("add", "required");
			else $("#00N0l000002YOpB").rules("remove", "required");
		});
	});
</script>