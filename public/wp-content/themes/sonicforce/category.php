<?php 
   $term_current = get_queried_object();	
   $term_link = get_term_link($term_current,'category');
   get_header(); 
   ?>
<main id="content" class="category">
   <div class="event-content news">
      <div class="container">
         <ul>
            <li><a class="link-click active" href="<?php echo $term_link; ?>">News</a></li>
            <li><a class="link-click" href="<?php the_permalink(23); ?>">Events</a></li>
         </ul>
         <div class="list-content" id="list-news">
            <div class="post-featured">
               <?php 
					$args = array(							
						'posts_per_page' => 1,					
					);						 
					$the_query = new WP_Query( $args );						
					while ($the_query->have_posts() ) : $the_query->the_post();				
				?>					
               <div class="row">
                  <div class="col-md-6">
                     <div class="thumnail-post">								
						<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>							
					 </div>
                  </div>
                  <div class="col-md-6">
                     <div class="content-post">
                        <a href="<?php echo $term_link; ?>" class="cate">News</a>								
                        <h2 class="title-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="des-post">									
							<?php echo get_field('short_description',$post->ID);?>					
						</div>
                        <p class="date"> <?php echo get_the_date('j M, g:i A'); ?></p>
                     </div>
                  </div>
               </div>
               <?php					
				   endwhile;						
				   wp_reset_query();				
			   ?>				
            </div>
            <div class="list-post">
               <div class="row">
                  <?php							
					  $args = array(								
						  'post__not_in' => array( $post->ID ),					  
						  'paged'	=> max ($page ,$paged)						  
					  );							 
					  $the_query = new WP_Query( $args );
					  while ($the_query->have_posts() ) : $the_query->the_post();						
				  ?>						
                  <div class="col-md-4">
                     <div class="item-news text-center">
                        <div class="thumnail">									
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>							
						</div>
                        <div class="item-content">
                           <a href="<?php echo $term_link; ?>" class="cate">News</a>									
                           <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                           <div class="des-item">										
								<?php echo get_field('short_description',$post->ID);?>		
							</div>
                           <p class="date"> <?php echo get_the_date('j M, g:i A');?></p>
                        </div>
                     </div>
                  </div>
                  <?php							
					  endwhile;							
					  wp_reset_query();						
				  ?>					
               </div>
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
      </div>
   </div>
</main>
<?php get_footer();?>