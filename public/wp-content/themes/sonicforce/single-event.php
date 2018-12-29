<?php 
	$postid = get_the_ID();
	$post_terms = wp_get_post_terms($postid,'event');
	get_header(); 
	the_post();
?>
<main id="content" class="events-details">
	<div class="banner-top banner-general" style="background-image: url(<?php echo get_field('banner_event_single',$postid); ?>);" >
		<div class="container">
			<div class="content-bannner">
				<div class="btn-event">
					<a href="">Events</a>
				</div>
				<h2><?php the_title(); ?></h2>
				<p>
					<?php echo get_field('short_description',$pageid);?>
				</p>
				<p class="time"><?php echo get_the_date('j M Y'); ?></p>
				<ul class="intro-social">
					<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink();?>&title=<?php the_title();?>"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="http://twitter.com/home?status=<?php the_title();?>+<?php the_permalink();?>"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
					<li><a target="_blank" href=""><img src="<?php echo get_template_directory_uri(); ?>/images/events/email-ev.png" alt="" /></a></li>
				</ul>
			</div>	
		</div>
	</div>
	<div class="content-details">
		<div class="container">
			<div class="speaker">
				<h2>Speaker</h2>
				<div class="list-speaker">
					<div class="row">
						<?php 
							$speaker = get_field('speaker',$pageid);
							if($speaker){
								foreach($speaker as $item){
						?>
						<div class="col-sm-4">
							<div class="item-info">
								<div class="image-info">
									<img src="<?php echo $item['avatar'];?>" alt="" />
								</div>
								<div class="content-info">
									<h3><?php echo $item['name'];?></h3>
									<p><?php echo $item['job'];?></p>
								</div>
							</div>
						</div>
						<?php } }?>
					</div>
				</div>
			</div>
			<div class="about">
				<?php the_content(); ?>
			</div>
			<div class="share">
				<ul class="social-bottom">
					<li><a href="">Share</a> </li>
					<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink();?>&title=<?php the_title();?>"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="http://twitter.com/home?status=<?php the_title();?>+<?php the_permalink();?>"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
					<li><a target="_blank" href=""><img src="<?php echo get_template_directory_uri(); ?>/images/event-gray.png" alt="" /></a></li>
				</ul>
				<div class="scroll">
					<a href="" class="scroll-event">SCROLL TO TOP<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-gray.png" alt="" /></a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</main>
<?php get_footer();?>
<script type="text/javascript">
	jQuery(function(){
		$('.scroll-event').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});
	});
</script>