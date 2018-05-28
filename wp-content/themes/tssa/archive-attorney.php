<?php
/**
 * Attorney archive
 */
get_header(); 

$args = array( 
	'post_type' => 'attorney'
);

$attorney = new WP_Query( $args );
?>
<main id="main" role="main">

	<section id="main-content">

		<div class="container">

			<div class="inner-wrapper row">

				<div class="content col-md-7 col-lg-8">

					<?php if( $attorney->have_posts() ) : $i = 0; ?>

					<div class="attorney-list clearfix">

						<?php while( $attorney->have_posts() ) : $attorney->the_post();
							$first_name = get_the_title();
							$first_name = explode(' ', $first_name);
							$i++;
						 ?>

						<div class="col-sm-6 attorney-<?php echo $i ?>">

							<a href="<?php the_permalink()?>" class="attorney">

								<?php the_post_thumbnail('attorney-medium') ?>

								<div class="attorney-block">

									<h3><?php the_title() ?></h3>

									<h4><?php the_field('position') ?></h4>

									<span class="text-uppercase">Get to know <?php echo $first_name[0] ?><i class="icon-arrow-full"></i></span>

								</div>

							</a>

						</div>

						<?php endwhile ?>

					</div>

					<?php endif; wp_reset_postdata() ?>

				</div>

				<div class="col-md-5 col-lg-4" id="sidebar">

					<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

				</div>

			</div>

		</div>

	</section>

</main>

<?php get_footer() ?>