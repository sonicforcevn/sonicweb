<?php 
	$postid = get_the_ID();
	$post_terms = wp_get_post_terms($postid,'category');
	get_header(); 
	the_post();
?>
<main id="content" class="post-detail">
	<div class="banner-top banner-general" style="background-image: url(<?php echo get_field('banner_single_post',$postid);?>);">
		<div class="container">
			<div class="content-bannner">
				<div class="container-inner">
					<h2><?php the_title(); ?></h2>
					<p>
						<?php echo get_field('short_description',$postid);?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content">
		<div class="container">
			<div class="singlebox-content">
				<div class="list-feature">
					<ul class="row feature-lst">
						<?php 	
							$featured_video = get_field('featured_video',$pageid);						
							if($featured_video){							
							foreach($featured_video as $item){	
							if($item['link_video'] != '') {
						?>
						<li class="col-12 col-md-6">
							<div class="item-feature">
								<div class="item-images"> <a href="<?php echo $item['link_video'];?>" data-fancybox><img src="<?php echo $item['icon_video'];?>" alt=""></a> </div>
								<div class="item-text">
									<h3><a><?php echo $item['name_video'];?></a></h3>
									<p>
										<?php echo $item['description'];?>
									</p>
								</div>
							</div>
						</li>
						<?php } } }?>
					</ul>
				</div>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer();?>