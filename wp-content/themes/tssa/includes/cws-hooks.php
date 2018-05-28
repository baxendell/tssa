<?php
/**
 * CWS Custom Action Hooks
 */

/**
* Remove Category and Tags from Title
*/
add_filter('gettext', 'remove_classifier_words', 20, 3);
function remove_classifier_words( $translated_text, $untranslated_text, $domain ) {

    $custom_field_text = 'Tag: %s';
    if ( !is_admin() && $untranslated_text === $custom_field_text ) {
        return '%s';
    }

    $custom_field_text = 'Category: %s';
    if ( !is_admin() && $untranslated_text === $custom_field_text ) {
        return '%s';
    }

    return $translated_text;
}

/**
 * Custom Post Type Category: Practice Area Category
 */
function practice_area_taxonomy() {

	$labels = array(
		'name'              => _x( 'Practice Area Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Practice Area Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Practice Area Categories' ),
		'all_items'         => __( 'All Practice Area Categories' ),
		'parent_item'       => __( 'Parent Practice Area Category' ),
		'parent_item_colon' => __( 'Parent Practice Area Category:' ),
		'edit_item'         => __( 'Edit Practice Area Category' ),
		'update_item'       => __( 'Update Practice Area Category' ),
		'add_new_item'      => __( 'Add New Practice Area Category' ),
		'new_item_name'     => __( 'New Practice Area Category' ),
		'menu_name'         => __( 'Practice Area Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'practice-area-category' ),
	);

	register_taxonomy( 'practice_area', array( 'practice_area' ), $args );
}
add_action( 'init', 'practice_area_taxonomy' );

/**
 * Add pagination to blog archive templates
 *
 * @add_action cws_pagination
 *
 * @return void
 */
function cws_numeric_posts_nav() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="blog-navigation"><ul>' . "\n";

	/** print Page */
	printf( '<li class="page-li">Page</li>' );

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="prev-link">%s</li>' . "\n", get_previous_posts_link('<', '', 'no') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>...</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="next-link">%s</li>' . "\n", get_next_posts_link(' ', '', 'no') );

	echo '</ul></div>' . "\n";
}
add_action( 'cws_pagination', 'cws_numeric_posts_nav' );

/**
 * Show random testimonies from clients
 *
 * @add_action cws_testimony
 *
 * @return void
 */
function cws_show_testimony() {
global $wpdb;

/* get a random testimonial */
 $testimonials = "
    SELECT *
    FROM $wpdb->posts wposts, $wpdb->postmeta metadate, $wpdb->postmeta metatime
    WHERE (wposts.ID = metadate.post_id AND wposts.ID = metatime.post_id)
    AND wposts.post_type = 'testimonial'
    AND wposts.post_status = 'publish'
    ORDER BY RAND() 
    LIMIT 1
 ";

$testimony = $wpdb->get_results( $testimonials, OBJECT );

?>
	<div class="testimonial-wrapper-content">
		<?php if( $testimony ) :
			global $post;
				 foreach ( $testimony as $post ) :
					setup_postdata( $post ) ?>
					<div class="testimonal-content">
						<blockquote class="testimonial">
							<q><?php the_content() ?></q>
							<footer><i><?php the_title() ?></i></footer>
						</blockquote>
					</div>
			<?php endforeach;
		endif; wp_reset_postdata() ?>
	</div>
<?php
}
add_action( 'cws_testimony', 'cws_show_testimony' );

/**
 * Loaction information
 * output Yoast location data
 *
 * @add_action cws_location
 *
 * @return void
 */
function cws_location_footer_output() {
	$location_id = 1508 ?>

	<div class="location-meta">
		<div class="location-meta-address">
			<span class="law-firm-footer-title"><!--client name here--></span>
			<?php 
			//address
			if( function_exists( 'wpseo_local_show_address' ) ) {
			  $params = array(
					'echo'         => true,
					'id'           => $location_id,
					'show_state'   => true,
					'show_country' => false,
					'show_phone'   => true,
					'oneline'      => false
				);
				wpseo_local_show_address( $params );
			}
			?>
		</div>
	</div>	

<?php
}
add_action( 'cws_location_footer', 'cws_location_footer_output' );

/**
 * Set Breadcrumbs for a submenu
 *
 * @add_action set_header
 *
 * @return void
 */
function cws_yoast_breadcrumb_menu() {
	if( ! is_front_page() ) : ?>
		<div class="breadcrumb-bar hidden-sm hidden-xs">
			<div class="container">
			<?php 
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				} 
			?>
			</div>
		</div>
	<?php endif;
}
add_action( 'cws_breadcrumb', 'cws_yoast_breadcrumb_menu' );


/**
 * H1 Title
 *
 * @add_action cws_h1_title
 *
 * @return void
 */
function cws_h1_title_output() {
	if( ! is_front_page() ) : ?>

		<div class="h1-title">
			<div class="container">
				<?php if( get_field( 'h1_title' ) ) : ?>

					<h1><?php the_field( 'h1_title' ) ?></h1>

				<?php elseif( is_home() ) : ?>

					<h1><?php the_field( 'h1_title' ) ?></h1>

				<?php else : ?>

					<h1><?php the_title() ?></h1>

				<?php endif ?>
			</div>
		</div>

	<?php endif;
}
add_action( 'cws_h1_title', 'cws_h1_title_output' );

/**
* Breaking News
*
*/
function cws_breaking_news_columns_output() {
	global $post;
	$post_objects = get_field('breaking_news');

	$bn_args = array(
		'post_type' => 'post',
		'posts_per_page' => 5,
		'category_name'  => 'featured',
		);

	if( $post_objects ): ?>

	<div class='breaking-news-columns'>

	   <div class="practice-icons-circle">

	      <div class="practice-icons-circle__inner text-center">

	        <?php include(STYLESHEETPATH.'/images/icons/horn.svg'); ?>

	      </div>

	    </div>

	  <h3 class='uppercase'>Breaking News</h3>

	  <div class='breaking-subtitle'>

	  	Get up-to-date information about legal issues impacting your local community and families nationwide.

  	  </div>

	  <ul class="news-list">

	    <?php foreach( $post_objects as $post):?>
	        <?php setup_postdata($post); ?>

	    <li class="clearfix">

	      <div class="post-info">

	        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>

	        <span><?php echo get_the_date() ?></span>

	      </div>

	    </li>  
	    <?php endforeach; ?>

	  </ul>

	  <a class="uppercase btn btn-wide op-alt-teal remove-decoration" href="/blog/">View All News</a>

	</div>          

	<?php wp_reset_postdata(); else:
	$bn_query = new WP_Query($bn_args);

	if($bn_query->have_posts()):
	?>
	<div class='breaking-news-columns'>

	  <div class="practice-icons-circle">

      	<div class="practice-icons-circle__inner text-center">

        	<?php include(STYLESHEETPATH.'/images/icons/horn.svg'); ?>

      	</div>

      </div>

	  <h3 class='uppercase'>Breaking News</h3>

	  <div class='breaking-subtitle'>

	  	Get up-to-date information about legal issues impacting your local community and families nationwide.

  	  </div>

	  <ul class="news-list">
	  <?php while($bn_query->have_posts()): $bn_query->the_post(); ?>
	    <li class="clearfix">

	      
	      <div class="post-info">

	        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>

	        <span><?php echo get_the_date() ?></span>

	      </div>

	    </li>
	 	<?php endwhile; endif; wp_reset_postdata(); ?> 	

	 </ul>

	 <a class="uppercase btn btn-wide op-alt-teal remove-decoration" href="/blog/">View All News</a>

	</div> 
	<?php
 	endif;
}
add_action( 'cws_breaking_news_columns', 'cws_breaking_news_columns_output' );

function cws_useful_info_columns_output() {
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

<div class="useful-info-columns">

	<div class="practice-icons-circle">

      <div class="practice-icons-circle__inner text-center">

        <?php include (STYLESHEETPATH.'/images/icons/paper.svg'); ?>

      </div>

    </div>

	<?php if( $title ) : ?>

	<h3  class='uppercase'><?php echo esc_html( $title ) ?></h3>

	<?php else : ?>

	<h3 class='uppercase'>Useful Information</h3>

	<?php endif ?>

	<div class='breaking-subtitle'>

  		Learn more about your legal rights in regards to your defective product, medical malpractice or personal injury case.

    </div>

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

	<a class="uppercase btn btn-wide op-alt-teal remove-decoration" href="/blog/">View All Articles</a>

</div>	

<?php
endif;
}
add_action( 'cws_useful_info_columns', 'cws_useful_info_columns_output' );
