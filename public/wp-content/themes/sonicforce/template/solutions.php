<?php 
	/* Template Name: Solutions */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="page-solution">
	<form action="" autocomplete="off">
		<div class="the-solution">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3">
						<div class="btn-filter">
							<a class="filter" href=""><img src="<?php echo get_template_directory_uri(); ?>/images/fillter.png" alt="" />FILTERS</a>
						</div>
						<div class="sidebar-solution">
							<div class="widget widget-business">
								<h2 class="title-widget">Business Type</h2>
								<div class="list-business">
									<?php 
										$terms = get_terms('business_type',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
										if($terms ) {
										foreach ( $terms as $term ) {
										$tid = $term->term_id;
									?>
									<div class="it-form">
										<input class="it-checkbox" value="<?php echo $tid; ?>" id="check<?php echo $tid; ?>" type="checkbox">
										<label for="check<?php echo $tid; ?>"><?php echo $term->name; ?></label>       
									</div>
									<?php } } ?>
								</div>
							</div>
							<div class="widget widget-industries">
								<h2 class="title-widget">Industries</h2>
								<div class="list-industries">
									<?php 
										$terms = get_terms('industries',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
										if($terms ) {
										foreach ( $terms as $term ) {
										$tid = $term->term_id;
									?>
									<div class="it-form">
										<input class="it-checkbox" value="<?php echo $tid; ?>" id="check<?php echo $tid; ?>" type="checkbox">
										<label for="check<?php echo $tid; ?>"><?php echo $term->name; ?></label>       
									</div>
									<?php } } ?>
								</div>
							</div>
							<div class="widget widget-role">
								<h2 class="title-widget">Role</h2>
								<div class="list-role">
									<?php 
										$terms = get_terms('role',array('hide_empty' => false,'orderby' => 'ID','order' => 'DESC'));
										if($terms ) {
										foreach ( $terms as $term ) {
										$tid = $term->term_id;
									?>
									<div class="it-form">
										<input class="it-checkbox" value="<?php echo $tid; ?>" id="check<?php echo $tid; ?>" type="checkbox">
										<label for="check<?php echo $tid; ?>"><?php echo $term->name; ?></label>       
									</div>
									<?php } } ?>
								</div>
							</div>	
							<div class="widget-btn">
								<button class="btn-apply" type="submit">APPLY FILTERS</button>
								<button class="btn-reset" type="reset">RESET</button>
							</div>	
						</div>
					</div>
					 <?php
						$length = 99999;
						if(get_field('solution_excerpt_length','option') || get_field('solution_excerpt_length','option') != 0) $length = get_field('solution_excerpt_length','option');
				   ?>
					<div class="col-12 col-md-9 solution-primary the-pagi" attr-cat="1">
						<div class="solution the-json the-jsonfull">
							<div class="row solution-list filldata">
								<?php
									$numberp = 6;
									$solution_show_post = get_field('solution_show_post','option');
									if($solution_show_post) $numberp  = $solution_show_post;
									$args = array(
										'post_type'	=> 'solution',
										'posts_per_page'	=> $numberp,
										'paged'	=> max($page,$paged)
									);
									$the_query = new WP_Query( $args );
									while ($the_query->have_posts() ) : $the_query->the_post();
								?>
								<div class="col-sm-6">
									<div class="item-solution">
										<div class="solution-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>	
										</div>
										<div class="content-item">
											<h3  class="sub-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p><?php echo wp_trim_words(get_the_excerpt($post->ID), $length); ?></p>
											<a class="btn-more" href="<?php the_permalink(); ?>">Learn about <?php the_title(); ?><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a>
										</div>
									</div>	
								</div>
								<?php
									endwhile;
									wp_reset_query();
								?>
							</div>
							<?php	
							$big = 999999999;
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
							<div class="json-loading lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</form>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
var business = [];
var industries = [];
var role = [];
var page = 1;
jQuery(function($) {
	$('.btn-apply').click(function() {
		business = [];
		industries = [];
		role = [];
		page = 1;
		$('.list-business .it-form.active').each(function() {
			business.push($(this).find('input').val());
		});
		$('.list-industries .it-form.active').each(function() {
			industries.push($(this).find('input').val());
		});
		$('.list-role .it-form.active').each(function() {
			role.push($(this).find('input').val());
		});
		solution_ajax();
		return false;
	});
	$('.btn-reset').click(function() {
		$('.it-form').removeClass('active');
		$('.it-form label').removeClass('active');
		business = [];
		industries = [];
		role = [];
		page = 1;
		solution_ajax();
		return false;
	});
	
	$('body').on('click','.pagi-custom .page-numbers',function(){
		var href = $(this).attr('href');
		page = href.split('page/');
		page = page[1];
		solution_ajax();
		return false;
	});
});
function solution_ajax() {
	$('.json-loading').fadeIn();
	$('html,body').animate({ scrollTop: 0 }, 400);
	console.log(page);
	$.ajax({
		url:'<?php echo get_option('home') ?>/',
		type: 'GET', 
		cache: false,
		dataType: "json",
		data: {
			business: business,  
			industries: industries,  
			role: role,
			page: page,
			'get_json_solution':true 
		},
		success: function(data) {
			$('.filldata').html(data[0]);
			if(data[1] != '') {
				$('.pagi-custom').html(data[1]);
				$('.pagi-custom').show();
			} else $('.pagi-custom').hide();
			$('.json-loading').fadeOut();
		}
	});
}
</script>