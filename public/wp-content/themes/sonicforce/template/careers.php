<?php 
/* Template Name: Careers */
$pageid = get_the_ID();
get_header();
the_post();
?>
<main id="content" class="careers">
   <div class="container">
      <form action="" method="POST" id="filtercaForm">
         <div class="about-careers">
			<?php the_content(); ?>
            <div class="group-select">
               <div class="it-form">
                  <div class="mcscustom-select">
                     <a class="click-select" href=""><span>ROLE</span> <i class="fa fa-caret-down"></i></a>							
                     <ul class="list-select list-roles">
						<li>
							<a href="" attr-value="">Role</a>
						</li>
						<?php 
							$terms = get_terms('roles',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
							if($terms){
								foreach($terms as $term){	
						?>
						 <li>
							<a href="" attr-value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
						</li>
						<?php }}?>
                     </ul>
                     <input type="hidden" name="filter_role" id="fillRole" class="filterget-data" />						
                  </div>
               </div>
               <div class="it-form">
                  <div class="mcscustom-select">
                     <a class="click-select" href=""><span>TYPE</span> <i class="fa fa-caret-down"></i></a>							
                     <ul class="list-select list-fulltime">
						<li>
							<a href="" attr-value="">Type</a>
						</li>
						<?php 
							$terms = get_terms('full_time',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
							if($terms){
								foreach($terms as $term){
						?>
                       <li><a href="" attr-value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a></li>
                        <?php }}?>
                     </ul>
                     <input type="hidden" name="filter_time" id="fillTime" class="filterget-data" />						
                  </div>
               </div>
               <div class="it-form">
                  <div class="mcscustom-select">
                     <a class="click-select" href=""><span>LOCATION</span> <i class="fa fa-caret-down"></i></a>							
                     <ul class="list-select list-location" >
						<li>
							<a href="" attr-value="">Location</a>
						</li>
                        <?php 
							$terms = get_terms('location',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
							if($terms){
								foreach($terms as $term){
						?>
                       <li><a href="" attr-value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a></li>
                        <?php }}?>
                     </ul>
                     <input type="hidden" name="filter_location" id="fillLocation" class="filterget-data" />						
                  </div>
               </div>
               <div class="it-form">
                  <div class="mcscustom-select">
                     <a class="click-select" href=""><span>Duration</span> <i class="fa fa-caret-down"></i></a>							
                     <ul class="list-select list-project">
						<li>
							<a href="" attr-value="">Duration</a>
						</li>
                        <?php 
							$terms = get_terms('duration',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
							if($terms){
								foreach($terms as $term){
						?>
                       <li><a href="" attr-value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a></li>
                        <?php }}?>
                     </ul>
                     <input type="hidden" name="filter_project" id="fillProject" class="filterget-data" />						
                  </div>
               </div>
            </div>
         </div>
         <div class="account-specialist">
			<div class="the-json the-jsonfull">
				<ul class="list-account">
					<?php
						$numberp = 4;
						$solution_show_post = get_field('careers_show_post','option');
						if($solution_show_post) $numberp  = $solution_show_post;
						$args = array(
							'post_type'	=> 'career',
							'posts_per_page' => $numberp,
							'paged'	=> max($page,$paged)							
						);
						 $the_query = new WP_Query( $args );
						while ($the_query->have_posts() ) : $the_query->the_post();
						$postid = $post->ID;
						$loca_terms = wp_get_post_terms($postid,'location');
						$time_terms = wp_get_post_terms($postid,'full_time');
					?>

				   <li class="item-account">
						<div class="carrer-topinfo">
						  <h3><?php the_title(); ?></h3>
						  <ul class="sub-list">
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/role.png" alt="" />
							Account</li>
							<?php if($loca_terms) {?>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/places.png" alt="" />
								<?php echo $loca_terms[0]->name; ?></li>
							<?php } ?>
							<?php if($time_terms) {?>
							 <li>
							 <img src="<?php echo get_template_directory_uri(); ?>/images/time.png" alt="" />
							 <?php echo $time_terms[0]->name; ?></li>
							<?php } ?>
						  </ul>
					  </div>
					  <a class="show-details" href=""><i class="fa fa-angle-down"></i></i> <i class="fa fa-angle-up"></i></a>						
					  <div class="details-info">
						 <?php the_content(); ?>
						 <div class="btn-app">
							<a class="show-popup button-apply" attr-position="<?php echo get_field('position_id',$post->ID); ?>" href="#popupAccount">APPLY</a>							
						 </div>
					  </div>
				   </li>
				   <?php 
						endwhile;
						wp_reset_query();
				   ?>
				</ul>
				<div class="json-loading lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div>
			</div>
			<?php	$big = 999999999;
				$mcs_paginate_links = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $the_query->max_num_pages,
						'prev_text'    => __('«','yup'),
						'next_text'    => __('»','yup') 
					  ) );
					if($mcs_paginate_links) : 
				?>
						  <div class="pagi-custom">
				  <?php echo $mcs_paginate_links ?>
				</div>
			<?php endif; ?>			
         </div>
      </form>
   </div>
   	<div id="popupAccount" class="popup">
		<div class="popup-bg"></div>
		<div class="popup-content">
			<a href="" class="popup-close"><img src="<?php echo get_template_directory_uri(); ?>/images/exit.png" alt="" /></a>
			<div class="popup-primary">
				<div class="popup-inner list-account">
					<div class="item-account carrer-modalinfo"></div>	
					 <div class="form-content">
						<form  method="POST" action="<?php if(get_field('apply_url_action','option')) echo get_field('apply_url_action','option'); else echo 'https://hr-telelove.cs58.force.com/employee/services/apexrest/sonic/attachment'; ?>" enctype="multipart/form-data" id="applyForm">
							<div class="form-general">
								<div class="form-group">
									<input  id="firstName" maxlength="40" name="firstName" size="20" type="text" placeholder="First Name (Required)" /><br>
								</div>
								 <div class="form-group">
									<input  id="lastName" maxlength="80" name="lastName" size="20" type="text" placeholder="Last Name (Required)" /><br>
								 </div>
								 <div class="form-group">
									<input  id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email (Required)" /><br>
								 </div>
								 <div class="form-group">
									<input  id="phone" maxlength="40" name="phone" size="20" type="text" placeholder="Mobile (Required)" /><br>
								 </div>
								 <div class="form-group">
									<input  id="address" maxlength="80" name="address" size="20" type="text" placeholder="Address (Optional)" /><br>
								 </div>
								 <input type="hidden" id="getPosition" name="position" />
								 <div class="form-group form-groupfull">
									<label class="file-group">
										<span class="up-file"><img src="<?php echo get_template_directory_uri(); ?>/images/upload.png" alt="" /> <span class="filename">Upload file (Required)</span></span> or Drop File
										<input type="hidden" id="getFilename"  />
										<input type="hidden" id="getFileType"  />
										<input type="hidden" id="getFileContent"  />
										<input type="file" id="upload" class="input-file" name="myFile" placeholder="Upload file" accept=".txt,.xls,.xlsx,.doc,.docx,.pdf" />
									</label>
								 </div>
								 <div class="bottom-group">
									 <div class="form-group capchar">
										<script src='https://www.google.com/recaptcha/api.js'></script>
										<div class="g-recaptcha" data-sitekey="6Le6toIUAAAAAHPND6ghUYptqvFw_B0tmMSN2W3q"></div>
									 </div>
									<div class="form-group">
										<input type="submit" name="submit" value="submit">
										<div class="loadingjax"><div class="lds-css ng-scope"><div class="lds-spinner" style="100%;height:100%"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>
									</div>
								</div>
								<div class="alert alert-success message-alertform" role="alert">Send apply successfully!</div>
							</div>
					   </form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
var page = 1;
jQuery(function(){	
	$('body').on('click','.item-account .show-details',function(){			
		if($(this).hasClass('active')){			
			$(this).removeClass('active');			
			$(this).parents('.item-account').removeClass('open');			
			$(this).parents('.item-account').find('.details-info').slideUp();		
		}else{			
			$('.item-account .show-details').removeClass('active');			
			$(this).addClass('active');			
			$('.item-account').removeClass('open');			
			$(this).parents('.item-account').addClass('open');			
			$('.details-info').slideUp('slow');			
			$(this).parents('.item-account').find('.details-info').slideDown();
			$('html,body').animate({ scrollTop:$('.item-account').offset().top - $('#header').outerHeight()	- 30 }, 400);			
		}
		return false;	
	});

	$('.click-select').click(function() {			
		if($(this).hasClass('active')){			
			$(this).removeClass('active');			
			$(this).parents('.mcscustom-select').removeClass('open');			
			$(this).parents('.mcscustom-select').find('.list-select').slideToggle();		
		}else{			
			$('.click-select').removeClass('active');			
			$(this).addClass('active');			
			$('.mcscustom-select').removeClass('open');			
			$(this).parents('.mcscustom-select').addClass('open');			
			$('.list-select').slideUp('slow');			
			$(this).parents('.mcscustom-select').find('.list-select').slideDown();		
		}		
		return false;		
	});
	$('.mcscustom-select .list-select li a').on('click',function(){
		var tex = $(this).html();
		var paren = $(this).parents('.mcscustom-select');
		paren.find('.list-select').slideUp()
		paren.find('.click-select span').html(tex);
		paren.find('.filterget-data').attr('value',$(this).attr('attr-value'));
		page = 1;
		career_ajax();
		return false;
	});
	$('body').on('click','.button-apply',function() {
		$('#getPosition').attr('value',$(this).attr('attr-position'));
		$('.carrer-modalinfo').html($(this).parents('li').find('.carrer-topinfo').html());
	});
	setInterval(function(){ 
		if($('#upload').hasClass('error')) $('.file-group').addClass('error');
		else $('.file-group').removeClass('error');
	}, 100);
	$('#applyForm').validate({
		rules: {
			firstName: {
				required: true,
			},
			lastName: {
				required: true
			},
			phone: {
				required: true,
				number: true
			},
			email: {
				required: true,
				email: true
			},
			myFile: {
				required: true
			}
		},
		messages: {
			phone: {
				number: 'Phone number is not formatted correctly'
			},
			email: {
				email: 'Email is not formatted correctly'
			}
		},
		submitHandler: function(form) {
			 if (grecaptcha.getResponse()) {
				var url = $(form).attr('action');
				console.log(url);
				$('.loadingjax').show();
				setTimeout(function(){ 
					$('.loadingjax').hide();
					$('.message-alertform').slideDown();
					$('form').trigger('reset');
					$('.filename').text('Upload file (Required)');
					grecaptcha.reset();
				}, 2000);
				setTimeout(function(){ 
					$('.message-alertform').fadeOut();
				}, 5000);
				$.ajax({
					url:'<?php echo get_option('home') ?>/',
					type: 'POST', 
					cache: false,
					dataType: "json",
					proccessData: false,
				   data: {
						'firstName':$('#firstName').val(),
						'lastName':$('#lastName').val(),
						'email' : $('#email').val(),
						'phone':$('#phone').val(),
						'address':$('#address').val(),
						'position':$('#getPosition').val(),
						'fileName' : $('#getFilename').val(),
						'fileType' : $('#getFileType').val(),
						'fileBody' : $('#getFileContent').val(),
						'get_send_apply':true 
				   },
				   success: function(data) {
					   console.log(data);
				   }
				 });
			} else {
				alert('Please confirm captcha to proceed')
			}
		}
	});
	loadimage();
	$('body').on('click','.pagi-custom .page-numbers',function(){
		var href = $(this).attr('href');
		page = href.split('page/');
		page = page[1];
		career_ajax();
		return false;
	});
});
$(window).load(function() {
	$('.popup-inner').mCustomScrollbar();
});
function loadimage() {
	$('.input-file').on('change', function(event){
		var files = this.files;
		var file = files[0];
		$('.filename').text(file.name);
		$('#getFilename').attr('value',file.name);
		$('#getFileType').attr('value',file.type);
		var reader = new FileReader();
		reader.onload = function (e) {
			var urlf = e.target.result;
			urlf = urlf.split('base64,');
			$('#getFileContent').attr('value',urlf[1]);
		};
		reader.readAsDataURL(file);
	});
}
function career_ajax() {
	$('.json-loading').fadeIn();
	$('html,body').animate({ scrollTop: 0 }, 400);
	$.ajax({
		url:'<?php echo get_option('home') ?>/',
		type: 'GET', 
		cache: false,
		dataType: "json",
		data: {
			role: $('#fillRole').val(),  
			fulltime: $('#fillTime').val(),
			location: $('#fillLocation').val(),
			project: $('#fillProject').val(),
			page: page,
			'get_json_career':true 

		},
		success: function(data) {
			$('.account-specialist .list-account').html(data[0]);
			if(data[1] != '') {
				$('.pagi-custom').html(data[1]);
				$('.pagi-custom').show();
			} else $('.pagi-custom').hide();
			$('.json-loading').fadeOut();
		}

	});

}
</script>