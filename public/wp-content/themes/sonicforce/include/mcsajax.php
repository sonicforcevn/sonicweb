<?php
/* Ajax solution */
function is_ajax_solution(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_json_solution');
function get_json_solution() {
	if(isset($_GET['get_json_solution']) && is_ajax_solution()){
		$business = $_GET['business'];
		$industries = $_GET['industries'];
		$role = $_GET['role'];
		$pagenumber = $_GET['page'];
		global $post;
		$numberp = 6;
		$solution_show_post = get_field('solution_show_post','option');
		if($solution_show_post) $numberp  = $solution_show_post;
		$length = 99999;
		if(get_field('solution_excerpt_length','option') || get_field('solution_excerpt_length','option') != 0) $length = get_field('solution_excerpt_length','option');
		ob_start();
		$args = array(
			'post_type'	=> 'solution',
			'posts_per_page'	=> $numberp,
			'paged'	=> $pagenumber,
			'tax_query'	=> array()
		);
		if($business) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'business_type',
				'field'		=> 'id',
				'terms'		=> $business
			);
		}
		if($industries) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'industries',
				'field'		=> 'id',
				'terms'		=> $industries
			);
		}
		if($role) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'role',
				'field'		=> 'id',
				'terms'		=> $role
			);
		}
		$the_query = new WP_Query( $args );
		if($the_query->have_posts()) {
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
		} else echo '<p class="nodata"><b>Sorry</b><br />No data matching search</p>';
		$data_post = ob_get_clean();
		$big = 999999999;
		$data_page = '';
		$mcs_paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => $pagenumber,
			'total' => $the_query->max_num_pages,
			'prev_text'    => __('«','yup'),
			'next_text'    => __('»','yup') 
		  ) );
		if($mcs_paginate_links) : 
			$data_page = $mcs_paginate_links;
		endif;
		$array_return = array($data_post,$data_page);
		echo json_encode($array_return);
		exit;
	}
}
/* Ajax success stories */
function is_ajax_stories(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_json_stories');
function get_json_stories() {
	if(isset($_GET['get_json_stories']) && is_ajax_stories()){
		$business = $_GET['business'];
		$industries = $_GET['industries'];
		$role = $_GET['role'];
		$pagenumber = $_GET['page'];
		global $post;
		$numberp = 6;
		$solution_show_post = get_field('stories_show_post','option');
		if($solution_show_post) $numberp  = $solution_show_post;
		$length = 99999;
		if(get_field('ss_excerpt_length','option') || get_field('ss_excerpt_length','option') != 0) $length = get_field('ss_excerpt_length','option');
		ob_start();
		$args = array(
			'post_type'	=> 'success_stories',
			'posts_per_page'	=> $numberp,
			'paged'	=> $pagenumber,
			'tax_query'	=> array()
		);
		if($business) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'business_type_stories',
				'field'		=> 'id',
				'terms'		=> $business
			);
		}
		if($industries) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'industries_stories',
				'field'		=> 'id',
				'terms'		=> $industries
			);
		}
		if($role) {
			$args['tax_query'][] = array(
				'taxonomy'	=> 'role_stories',
				'field'		=> 'id',
				'terms'		=> $role
			);
		}
		$the_query = new WP_Query( $args );
		if($the_query->have_posts()) {
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
		} else echo '<p class="nodata"><b>Sorry</b><br />No data matching search</p>';
		$data_post = ob_get_clean();
		$big = 999999999;
		$data_page = '';
		$mcs_paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => $pagenumber,
			'total' => $the_query->max_num_pages,
			'prev_text'    => __('«','yup'),
			'next_text'    => __('»','yup') 
		  ) );
		if($mcs_paginate_links) : 
			$data_page = $mcs_paginate_links;
		endif;
		$array_return = array($data_post,$data_page);
		echo json_encode($array_return);
		exit;
	}
}
/* Ajax apply form */
function is_ajax_apply(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_send_apply');
function get_send_apply() {
	if(isset($_POST['get_send_apply']) && is_ajax_apply()){
		$key = 'd3a5f999-9ec2-46b0-984d-ff81ae19be5b';
		$appy_key = get_field('appy_key','option');
		if($appy_key && $appy_key != '') $key = $appy_key;
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$position = $_POST['position'];
		$fileName = $_POST['fileName'];
		$fileType = $_POST['fileType'];
		$fileBody = $_POST['fileBody'];
		$cururl = 'https://hr-telelove.cs58.force.com/employee/services/apexrest/sonic/attachment';
		$apply_url_action = get_field('apply_url_action','option');
		if($apply_url_action && $apply_url_action != '') $cururl = $apply_url_action;
		// $fileBody = explode('base64,',$fileBody);
		// $fileBody = $fileBody[1];
		/* Send */
		$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $cururl,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\t\r\n\t\"request\" : {\r\n\t\t\"key\" : \"".$key."\",\r\n\t\t\"firstName\" : \"".$firstName."\",\r\n\t\t\"lastName\" : \"".$lastName."\",\r\n\t\t\"email\" : \"".$email."\",\r\n\t\t\"phone\" : \"".$phone."\",\r\n\t\t\"address\" : \"".$address."\",\r\n\t\t\"position\" : \"".$position."\",\r\n\t\t\"fileName\" : \"".$fileName."\",\r\n\t\t\"fileType\" : \"".$fileType."\",\r\n\t\t\"fileBody\" : \"".$fileBody."\"\r\n\t}\r\n}",
			  CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: b575280d-0c3e-c931-6c25-619a4003dfd6"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}
		echo json_encode($response);
		exit;
	}
}
/* Ajax Career */ function is_ajax_career(){  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';}add_action('init', 'get_json_career');function get_json_career() {	if(isset($_GET['get_json_career']) && is_ajax_career()){		$role = $_GET['role'];		$location = $_GET['location'];		$fulltime = $_GET['fulltime'];		
$project = $_GET['project'];	
$pagenumber = $_GET['page'];	
global $post;		
$numberp = 4;
$solution_show_post = get_field('careers_show_post','option');
if($solution_show_post) $numberp  = $solution_show_post;
ob_start();		$args = array(			'post_type'	=> 'career',			
'posts_per_page'	=> $numberp,
'paged'	=> $pagenumber,
'tax_query'	=> array()		);		if($role && $role != '') {			$args['tax_query'][] = array(				'taxonomy'	=> 'roles',				'field'		=> 'id',				'terms'		=> $role			);		}		if($fulltime && $fulltime != '') {			$args['tax_query'][] = array(				'taxonomy'	=> 'full_time',				'field'		=> 'id',				'terms'		=> $fulltime			);		}		if($location && $location != '') {			$args['tax_query'][] = array(				'taxonomy'	=> 'location',				'field'		=> 'id',				'terms'		=> $location			);		}		if($project && $project != '') {			$args['tax_query'][] = array(				'taxonomy'	=> 'duration',				'field'		=> 'id',				'terms'		=> $project			);		}		$the_query = new WP_Query( $args );		
if($the_query->have_posts()) {
while ($the_query->have_posts() ) : $the_query->the_post();		$loca_terms = wp_get_post_terms($post->ID,'location');		$time_terms = wp_get_post_terms($post->ID,'full_time');		?>		<li class="item-account">		  <div class="carrer-topinfo"><h3><?php the_title(); ?></h3>		  <ul class="sub-list">			<li><img src="<?php echo get_template_directory_uri(); ?>/images/role.png" alt="" />			Account</li>			<?php if(loca_terms) {?>			<li><img src="<?php echo get_template_directory_uri(); ?>/images/places.png" alt="" />				<?php echo $loca_terms[0]->name; ?></li>			<?php } ?>			<?php if(time_terms) {?>			 <li> <img src="<?php echo get_template_directory_uri(); ?>/images/time.png" alt="" />			 <?php echo $time_terms[0]->name; ?></li>			<?php } ?>		  </ul></div>		  <a class="show-details" href=""><i class="fa fa-angle-down"></i></i> <i class="fa fa-angle-up"></i></a>								  <div class="details-info">			 <?php the_content(); ?>			 <div class="btn-app">				<a class="show-popup button-apply" attr-position="<?php echo get_field('position_id',$post->ID); ?>" href="#popupAccount">APPLY</a>												 </div>		  </div>	   </li>		<?php		endwhile;		wp_reset_query();
} else echo '<p class="nodata"><b>Sorry</b><br />No data matching search</p>';	
$data_post = ob_get_clean();
	$big = 999999999;
	$data_page = '';
	$mcs_paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => $pagenumber,
		'total' => $the_query->max_num_pages,
		'prev_text'    => __('«','yup'),
		'next_text'    => __('»','yup') 
	  ) );
	if($mcs_paginate_links) : 
		$data_page = $mcs_paginate_links;
	endif;
	$array_return = array($data_post,$data_page);
	echo json_encode($array_return);		
exit;	}}
?>