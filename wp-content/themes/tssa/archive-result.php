<?php
/**
 * Template Name: Results archive
 */
get_header();
?>

<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'result',
	'order'     => 'ASC',
	'orderby' => 'menu_order',
	'paged'          => get_query_var( 'paged' ),
);

$query = new WP_Query( $args );

$your_query = new WP_Query( 'pagename=case-results' );

?>

	<section id="main-content">

		<div class="container">

			<div class="inner-wrapper row">

				<div class="content col-md-7 no-pad-right">
		
			    <?php while ( $your_query->have_posts() ) : $your_query->the_post() ?>

			    	<div class="entry-content">

						<h1 class="page-title"><?php h1_title() ?></h1>

			    	<?php if( has_post_thumbnail() ) : ?>

			    		<div class="feature-wrap">
			    		
			    			<?php the_post_thumbnail('medium') ?>

			    		</div><!--.post-thumbnail-->

			    	<?php endif; 

			        the_content();

			        ?>

			        </div>
			    	<?php endwhile; wp_reset_postdata(); ?>			

				<?php if( $query->have_posts() ) : ?>

					<?php while( $query->have_posts() ) : $query->the_post() ?>

						<div class="result">

							<h3 class="text-center"><?php the_title() ?></h3>

							<h4 class="text-center"><?php the_content() ?></h4>

						</div>

					<?php endwhile ?>

				<?php endif; ?>

				<?php do_action( 'cws_pagination' ) ?>

				<?php wp_reset_postdata() ?>

				</div>

				<div class="col-md-4 col-md-offset-1" id="sidebar">

					<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

				</div>

			</div>

		</div>

	</section>

<?php get_footer() ?>