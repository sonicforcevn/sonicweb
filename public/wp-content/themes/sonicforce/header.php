<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
	<title>
		<?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		?>
	</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php the_field('favicon','option'); ?>" />
</head>
<body <?php body_class( $class ); ?>> 
<div class="the-header">
	<header id="header">
		<div class="container">
			<div class="main-header">
				<div class="logo-header"><a href="<?php echo home_url(); ?>"><img src="<?php the_field('logo','option');?>" alt="Sonicforce" /></a></div>
				<div class="menu-main">					
					<nav>
						<?php echo wp_nav_menu(array('theme_location' => 'menu_main' )); ?>					
					</nav>
				</div>			
				<a href="" class="toggle-menu">		
					<div class="bar1"></div>				
					<div class="bar2"></div>				   
					<div class="bar3"></div>				
				</a>
			</div>
		</div>
	</header> <!-- End header  -->
</div>
	