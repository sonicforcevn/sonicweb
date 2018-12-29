<?php 
include(TEMPLATEPATH.'/include/menus.php');
include(TEMPLATEPATH.'/include/mcsajax.php');
add_theme_support( 'post-thumbnails', array('post','page','solution','expertise','event','career','success_stories') );
/* Script Admin */
function my_script() { ?>
	<style type="text/css">
		#dashboard_primary,#icl_dashboard_widget,
		#dashboard_right_now #wp-version-message,#wpfooter{
			display:none;
		}
	</style>
<?php }
add_action( 'admin_footer', 'my_script' );
function custom_style_login() {
	?>
    <style type="text/css">
		.login h1 a {
			background-image: url( <?php echo get_template_directory_uri(); ?>/images/logo.png);
			background-size: 100% auto;
			height: 70px;
			width: 200px;
		}
		.wp-social-login-provider-list img {
			max-width:100%;
		}
	</style>
<?php }
add_action( 'login_head', 'custom_style_login' );
/* add css, jquery */
function theme_mcs_scripts() {
	wp_enqueue_style( 'style-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300i,400,600,700' );
	wp_enqueue_style( 'style-fonts-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
	wp_enqueue_style( 'style-reset', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'style-bootstrap', get_template_directory_uri() . '/css/mcs.reset.css' );
	wp_enqueue_style( 'style-animate', get_template_directory_uri() . '/css/animate.min.css' );	wp_enqueue_style( 'style-fancybox', get_template_directory_uri() . '/js/fancybox3/jquery.fancybox.min.css' );
	wp_enqueue_style( 'style-slick', get_template_directory_uri() . '/js/slick/slick.css' );
	wp_enqueue_style( 'style-slick-them', get_template_directory_uri() . '/js/slick/slick-theme.css' );
	wp_enqueue_style( 'style-scroll', get_template_directory_uri() . '/js/scroll/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-responsive', get_template_directory_uri() . '/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_mcs_scripts' );

/* register page option ACF */
if( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page( array(
		'page_title' => 'Sonicforce Options',
		'menu_title' => 'Sonicforce Options',
		'icon_url' => 'dashicons-image-filter',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sonicforce',
		'menu_title' 	=> 'Sonicforce',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	  show_admin_bar(false);
}
?>