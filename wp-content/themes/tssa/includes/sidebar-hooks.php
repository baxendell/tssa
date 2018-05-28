<?php
/**
 * Sidebar hooks
 */


/**
 * Related info in sidebar
 *
 * @add_action related_info
 *
 * @return void
 */
function cws_related_info_output() {
global $post;
$post_id = $post->ID;
$ri_args = array(
	'post_parent' => $post_id,
	'post_type' => array('page'),
	'posts_per_page' => -1,
	'order' => "ASC",
	);
$children = new WP_Query($ri_args);
if ($children->have_posts()):
?>
<div class="related-info blue-border-box">

	<h3>Related Information</h3>

	<ul class="news-list">

       <?php while($children->have_posts()): $children->the_post(); ?>

       	<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>

   		<?php endwhile ?>

  	</ul>

</div>

<?php
endif; wp_reset_postdata(); }
add_action( 'cws_related_info', 'cws_related_info_output' );


function cws_custom_sb_output() {
global $post;
$post_id = $post->ID;


$title        = get_field( 'useful_info_title' );
$post_objects = get_field( 'useful_information' );

$args = array(
	//'post_type'      => array( 'page', 'post', 'testimonial', 'results', 'testimonial-spanish', 'spanish-results' ),
	'posts_per_page' => -1,
	'post_parent'    => $post_id,
	'order'          => 'DESC',
);

if( $post_objects ) :
?>

<div class="useful-info blue-border-box">

	<?php if( $title ) : ?>

	<h3><?php echo esc_html( $title ) ?></h3>

	<?php else : ?>

	<h3>Useful Information</h3>

	<?php endif ?>

	<ul class="news-list">

		<?php foreach( $post_objects as $post_object ) : ?>

			<li>

				<div class="post-info">

					<a href="<?php echo get_permalink( $post_object->ID ) ?>"><?php echo get_the_title( $post_object->ID ) ?></a>

					<?php if(get_field('practice_area_topic', $post_object->ID)): ?>

					<span class="text-uppercase"><?php the_field('practice_area_topic', $post_object->ID) ?></span>

					<?php endif; if(get_field('topic_location', $post_object->ID)): ?>

                	<span><?php the_field('topic_location', $post_object->ID) ?></span>

                	<?php endif ?>

            	</div>

			</li>

		<?php endforeach ?>

	</ul>

</div>

<?php
endif;
}
add_action( 'cws_custom_sb', 'cws_custom_sb_output' );

/**
 * Locations we serve
 *
 * @add_action cws_locations_served
 *
 * @return void
 */

function cws_locations_served_sidebar() {
	global $post;
	$args = array(
		'post_type' => 'wpseo_locations',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	);
	$loc_query = new WP_Query($args);
	if($loc_query->have_posts()): $i = 0;
?>

	<div class="locations-served-holder sidebar-border-box">

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			<div class="ac-list panel">

				<?php while($loc_query->have_posts()): $loc_query->the_post();
					$location_id = get_the_ID();
					$meta = get_post_meta($location_id);
					$i++;

					if($i == 1) {
						$open = "in";
						$class =" ";
					}
					else {
						$open = " ";
						$class = "collapsed";
					}
				?>

			    <div class="ac-title-wrapper" role="tab" id="heading<?php the_ID()?>">

			        <a id="ac-<?php the_ID() ?>" class="<?php echo $class ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php the_ID()?>" aria-expanded="true" aria-controls="collapse<?php the_ID()?>">
			          <span class="ac-title"><?php the_title() ?></span>
			        </a>

			    </div>

				<div id="collapse<?php the_ID()?>" class="panel-collapse collapse ac <?php echo $open ?>" role="tabpanel" aria-labelledby="heading<?php the_ID()?>">

					<div class="panel-body">
						<?php
						//map
						if( function_exists( 'wpseo_local_show_map' ) ) {
						  $params = array(
								'echo'       => true,
								'id'         => $location_id,
								'width'	     => 280,
								'height'     => 195,
								'zoom'       => 15,
								'show_route' => false
							);
							wpseo_local_show_map( $params );
						}
						?>

			            <div id="wpseo_location-<?php echo $location_id ?>" class="wpseo-location" itemscope="" itemtype="http://schema.org/Attorney">

  							<span class="wpseo-business-name law-firm-footer-title" itemprop="name"><strong>Herrman &amp; Herrman, P.L.L.C.</strong></span>

							<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress" class="wpseo-address-wrapper" >

				                <div class="street-address" itemprop="streetAddress"><?php echo $meta["_wpseo_business_address"][0]; ?></div>

				                  <span class="locality" itemprop="addressLocality"> <?php echo $meta["_wpseo_business_city"][0]; ?></span>, 

				                  <span class="region" itemprop="addressRegion"><?php echo $meta["_wpseo_business_state"][0]; ?></span>, 

				                  <span class="postal-code" itemprop="postalCode"><?php echo $meta["_wpseo_business_zipcode"][0]; ?></span>

			              	</div>

			              	<span class="wpseo-phone"><?php echo $GLOBALS['phone'] ?>: <span itemprop="telephone"><?php echo $meta["_wpseo_business_phone"][0]; ?></span></span>

			              	<br>

			            </div>

						<a href="<?php the_field( 'directions', $location_id ) ?>" target="_blank" class="btn btn-cta-green"><?php echo $GLOBALS['directions'] ?> <i class="icon icon-white-arrow"></i></a>

					</div>

			    </div>

				<?php endwhile ?>

		    </div>

	  	</div>	

	</div>

	<div class="sidebar-border-box location-meta-hours lmh-sidebar">

		<h3 class="text-uppercase"><?php echo $GLOBALS['hours'] ?></h3>

		<?php
		if(is_page_spanish()):
		?>
		<div class="wpseo-opening-hours-wrapper" itemscope="" itemtype="http://schema.org/LegalService">
			<meta itemprop="name" content="Corpus Christi, TX">
			<meta itemprop="address" content="1201 3rd Street">
			<meta itemprop="telephone" content="361.882.4357">
			<meta itemprop="name" content="Corpus Christi, TX">
			<meta itemprop="address" content="1201 3rd Street">
			<meta itemprop="telephone" content="361.882.4357">
			<meta itemprop="image" content="<?php bloginfo('template_url');?>/images/hermann-logo.png">
			<table class="wpseo-opening-hours">
				<tbody>
					<tr>
						<td class="day">Lunes&nbsp;</td>
						<td class="time">
							<time itemprop="openingHours" content="Mo 08:30-17:30">8:30 AM - 5:30 PM</time>
						</td>
					</tr>
					<tr>
						<td class="day">Martes&nbsp;</td>
						<td class="time">
							<time itemprop="openingHours" content="Mo 08:30-17:30">8:30 AM - 5:30 PM</time>
						</td>
					</tr>
					<tr>
						<td class="day">Miércoles&nbsp;</td>
						<td class="time">
							<time itemprop="openingHours" content="Mo 08:30-17:30">8:30 AM - 5:30 PM</time>
						</td>
					</tr>
					<tr>
						<td class="day">Jueves&nbsp;</td>
						<td class="time">
							<time itemprop="openingHours" content="Mo 08:30-17:30">8:30 AM - 5:30 PM</time>
						</td>
					</tr>
					<tr>
						<td class="day">Viernes&nbsp;</td>
						<td class="time">
							<time itemprop="openingHours" content="Mo 08:30-17:30">8:30 AM - 5:30 PM</time>
						</td>
					</tr>					
				</tbody>
			</table>
		</div>

		<?php else:
			if ( function_exists( 'wpseo_local_show_opening_hours' ) ) {
				$params = array(
					'id'          => '567122',
					'hide_closed' => false,
					'echo'        => true,
					'comment'     => '',
					'hide_closed'  => true
				);
				wpseo_local_show_opening_hours( $params );
			}
		endif;
		?>


	</div>


<?php
	endif; wp_reset_postdata();
}
add_action( 'cws_locations_served', 'cws_locations_served_sidebar' );

/**
 * Categories sidebar
 *
 * @add_action cws_category_sidebar
 *
 * @return void
 */
function cws_category_sidebar_output() {
?>

<div class="locations-served-holder blue-border-box offset-box__block">

	<div class="search-wrap">

		<?php get_search_form( ) ?>

	</div>

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

		<div class="ac-list panel">

			<div class="ac-title-wrapper" role="tab" id="heading_cat">

				<a id="ac_cat" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_cat" aria-expanded="true" aria-controls="collapse_cat">
					<span class="ac-title">Categories</span>
				</a>

			</div><!--ac-list-wrapper-->

			<div id="collapse_cat" class="panel-collapse collapse ac" role="tabpanel" aria-labelledby="heading_cat">

				<div class="panel-body">

					<ul>

						<?php
							$args = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'include'            => '',
								'hierarchical'       => 1,
								'title_li'           => __( '' ),
								'show_option_none'   => __( '' ),
								'number'             => 25,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
								'walker'             => null
							);
							wp_list_categories( $args );
						?>

					</ul>

				</div><!--.panel-body-->

			</div><!--#collapse_cat-->


			<div class="ac-title-wrapper" role="tab" id="heading_arch">

				<a id="ac_arch" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_arch" aria-expanded="true" aria-controls="collapse_arch">
					<span class="ac-title">Archive</span>
				</a>

			</div><!--ac-list-wrapper-->

			<div id="collapse_arch" class="panel-collapse collapse ac" role="tabpanel" aria-labelledby="heading_arch">

				<div class="panel-body">

					<ul>

						<?php
							$args = array(
								'type'            => 'yearly',
								'limit'           => 5,
								'format'          => 'html', 
								'before'          => '',
								'after'           => '',
								'show_post_count' => false,
								'echo'            => 1,
								'order'           => 'DESC',
								'post_type'       => 'post'
							);
							wp_get_archives( $args );
						?>

					</ul>

				</div><!--.panel-body-->

			</div><!--#collapse_arch-->

		</div><!--.ac-list-->

	</div><!--.panel-group-->

</div><!--.locations-served-holder-->

<?php
}
add_action( 'cws_category_sidebar', 'cws_category_sidebar_output' );

/**
 * Meet Team sidebar
 *
 * @add_action cws_team_sidebar
 *
 * @return void
 */
function cws_team_sidebar_output() {
global $post;

$args = array(
	'post_type'    => 'attorney',
	'post__not_in' => array( $post->ID )
);

$team = new WP_Query( $args );
?>

<?php if( $team->have_posts() ) : ?>
 
<div class="team-holder">

	<h3>Meet Our Attorneys</h3>

	<ul class="info-list">

		<?php while( $team->have_posts() ) : $team->the_post();
			$sb_image = get_field('sidebar_image');
			$sb_url = $sb_image['url'];
			$sb_alt = $sb_image['alt'];
			$sb_width = $sb_image['width'];
			$sb_height = $sb_image['height'];
			if($sb_image):
		 ?>

			<li class="clearfix">

				<img class="sb-image" src="<?php echo $sb_url?>" alt="<?php echo $sb_alt?>" width="<?php echo $sb_width ?>" height="<?php echo $sb_height?>">

				<div class="attorney-sb-info">

					<h4>Meet<br/> <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>

					<span class="job-position"><?php the_field('position') ?></span>

					<a href="<?php the_permalink() ?>"><span class="info-icon"></span></a>

				</div>

			</li>

		<?php endif; endwhile; ?>

		<div class="text-center">

			<a class="red-arrow-btn" href="/personal-injury-law-firm">Meet the Rest of the Team</a>

		</div>

	</ul>

</div>

<?php endif; wp_reset_postdata();
}
add_action( 'cws_team_sidebar', 'cws_team_sidebar_output' );

/**
 * Search Sidebar 
 *
 * @add_action cws_form_sidebar
 *
 * @return void
 */
function cws_search_sidebar_output() {
?>

<div id="sidebar-search" class="blue-holder">

	<div class="blue-holder-inner">

		<?php get_search_form( ) ?>

		<div class="magnify">

			<i class="icon icon-search-icon"></i>

		</div>

	</div>

</div>

<?php
}
add_action( 'cws_search_sidebar', 'cws_search_sidebar_output' );

/**
 * Form Sidebar 
 *
 * @add_action cws_form_sidebar
 *
 * @return void
 */
function cws_form_sidebar_output() {
?>

<div id="aside-form" class="form-block banner-form-container">

	<?php get_template_part( 'partials/banner-form' ) ?>

</div>

<?php
}
add_action( 'cws_form_sidebar', 'cws_form_sidebar_output' );

/**
 * Testimonial sidebar
 *
 * @add_action cws_testimonial
 *
 * @void
 */
function cws_testimonial_sidebar_output() {

	if(get_field('testimonial_sidebar')):
?>
	
	<div class="testimonial-holder sidebar-border-box">

		<h3><i class="icon icon-chat"></i>Real Clients, Real Stories</h3>

		<?php

		$post_object = get_field('testimonial_sidebar');

		if( $post_object ): 

			// override $post
			$post = $post_object;
			setup_postdata( $post ); 

			?>
		    <div itemscope itemtype="http://schema.org/Review">
		    	<div itemprop="reviewBody"><?php the_content() ?></div>
				<footer>
					<cite title="Source Title">– <span itemprop="author"><?php echo get_the_title($post->ID) ?></span><br/><span><?php the_field('client_type', $post->ID) ?></cite>
				</footer>
		    </div>
		    <?php wp_reset_postdata(); ?>
		<?php endif; ?>

	</div>

<?php
	endif;
}
add_action( 'cws_testimonial_sidebar', 'cws_testimonial_sidebar_output' );

/**
 * Results sidebar
 *
 * @add_action cws_results
 *
 * @return void
 */
function cws_results_sidebar() {
global $cws_img_path;
$args = array(
	'post_type'      => 'results',
	'posts_per_page' => 2
	);

$result = new WP_Query( $args ) ?>

	<div class="results">
		<h4>Our Attorneys Get Results</h4>

			<?php $i = 0 ?>

			<?php if( $result->have_posts() ) : while( $result->have_posts() ) : $result->the_post() ?>
				<?php $i++ ?>

				<div class="results-content <?php echo esc_attr( 'results-' . $i ) ?>">
					<img src="<?php echo esc_url( $cws_img_path ) ?>/images/checkmark-inline.png" alt="Armstrong Law Firm Checkmark" >
					<h5><?php the_field( 'sidebar_result_title' ) ?></h5>
					<h6><?php the_field( 'settlement' ) ?></h6>
				</div>

			<?php endwhile; endif; wp_reset_postdata() ?>

		<span class="icon-plus moveable"><a href="<?php echo home_url() ?>/results" class="learn-btn">Discover More Results</a></span>
	</div>

<?php 
}
add_action( 'cws_results', 'cws_results_sidebar' );

/**
 * Attorney Credential sidebar
 *
 * @add_action cws_credential_sidebar
 *
 * @return void
 */
function cws_credential_sidebar_output() {
global $post;
$title_raw   = get_the_title( $post->ID );
$title_array = explode( ' ', $title_raw );



$title = $title_array[0] . "'s";




if( have_rows( 'attorney_credentials' ) ) : $i = 0;
?>
	<section class="credential-holder sidebar-border-box">

		<h4><i class="icon icon-senate"></i><?php echo esc_html( $title ) ?> Credentials</h4>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			<div class="ac-list panel">

				<?php while( have_rows( 'attorney_credentials' ) ) : the_row() ?>

					<?php $i++;
					if($i == 1) {
						$open = "in";
						$collapsed = " ";
					}
					else {
						$open = " ";
						$collapsed = "collapsed";
					}
					?>

					<?php $cred_title = get_sub_field( 'credential_title' ) ?>

			    <div class="ac-title-wrapper" role="tab" id="heading-<?php echo $i ?>">

			        <a id="ac-<?php echo $i ?>" class="<?php echo $collapsed ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php the_ID()?>">
			          <span class="ac-title"><?php echo esc_html( $cred_title ) ?></span>
			        </a>

			    </div>

			    <div id="collapse-<?php echo $i ?>" class="panel-collapse collapse ac <?php echo $open ?>" role="tabpanel" aria-labelledby="heading-<?php echo $i ?>">
					<div class="panel-body entry-content" itemprop="affiliation">

						<?php the_sub_field( 'credential_list' ) ?>

					</div>
				</div>

				<?php endwhile ?>

		    </div>

	  	</div>	

	</section>

<?php
endif;
}
add_action( 'cws_credential_sidebar', 'cws_credential_sidebar_output' );
