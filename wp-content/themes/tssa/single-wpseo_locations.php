<?php
/**
 * Locations single
 */
get_header();
?>

<div class='contact-location-content'>
	<section class="no-top-block">
		
		<div class="container">
		
			<div class="row">
					    	
		    	<article class="col-md-12 no-pad-right entry-content">
								
					<?php if ( have_posts() ) : ?> 

						<?php while ( have_posts() ) : the_post() ?>

							<header class='text-center'>

								<h1 class="page-title"><?php h1_title() ?></h1>

								<span class="heading-sub text-center"><?php the_field('location_subtitle') ?></span>

							</header>
							
							<?php if ( has_post_thumbnail() ) : ?>

								<div class="feature-wrap-r">

										<?php the_post_thumbnail('full') ?>

								</div>

							<?php endif ?>

							<div>

								<?php the_content() ?>

							</div>						

						<?php endwhile ?>

					<?php endif ?>

				</article>			

			</div>

		</div>

	</section>

	<div class="lt-blue-bg">

		<?php get_template_part('partials/yoast-location'); ?>	

	</div>

</div>
		
<?php get_footer(); ?>