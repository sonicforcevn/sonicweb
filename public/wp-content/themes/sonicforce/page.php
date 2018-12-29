<?php 
$pageid = get_the_ID();
get_header();
the_post(); 
?>
<div id="content" class="site-content home-page">
	<div class="container">
		<div class="breadcrumb">
			<a href="<?php echo home_url(); ?>"></a>
			<i class="fa fa-long-arrow-right"></i>
			<a class="current" href=""><?php the_title(); ?></a>
		</div>
		<?php the_content(); ?>
	</div>
</div><!-- .site-content -->
<?php get_footer(); ?>