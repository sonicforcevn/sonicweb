<?php 
	/* Template Name: About Us */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="content-home events-details content-about">
   <div class="banner-about banner-general" style="background-image: url(<?php echo get_field('banner_about',$pageid);?>);">
	  <div class="container">
		 <div class="content-bannner">
			<h2><?php the_title(); ?></h2>
			<p class="description text-center"><?php echo get_field('short_description',$pageid);?></p>
		 </div>
	  </div>
   </div>  
   <div class="about">
		<div class="container">
			<div class="about-us">
				<?php the_content(); ?>
			</div>
	   </div>
   </div>
   <div id="contact" class="contact banner-general"  style="background-image: url(<?php echo get_field('bg_contact',15); ?>);">
      <div class="content-contact">
         <div class="container-inner">
             <h2 class="title-main"><?php echo get_field('title_contact',15); ?></h2>
            <p class="description">
                 <?php echo get_field('des_contact',15); ?>
               </p>
         </div>
      </div>
   </div>
   <div class="form-contact">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
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
            <div class="col-lg-9 col-md-8 col-sm-12 form-content"><?php echo get_field('form_ctacthtml','option'); ?></div>
         </div>
      </div>
   </div> <!-- End form-contact -->
   <div id="map-address">
      <?php echo get_field('contact_googlemap',15); ?>
   </div>
</main>

<?php get_footer(); ?>
<script type="text/javascript">	
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