<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Mix Colors
 * @version 1.0
 */

get_header(); ?>

	<div class="mcs_wrap">
	
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found container">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'mcs' ); ?></h1>
					</header>
					<!-- .page-header -->
					
					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'mcs' ); ?></p>

						<?php get_search_form(); ?>

					</div>
					<!-- .page-content -->
					
				</section>
				<!-- .error-404 -->
				
			</main><!-- #main -->
		</div><!-- #primary -->
		
	</div>
	<!-- .mcs_wrap -->

<?php get_footer();
