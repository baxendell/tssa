<?php
/**
 * Template Name: Contact
 *
 * 
 */
get_header();
 ?>

<div class='contact-location-content'>
	<section class="cl-top-content" class="no-top-block">
		
		<div class="container">
		
			<div class="row">
					    	
		    	<article class="col-md-12 no-pad-right">
								
					<?php if ( have_posts() ) : ?> 

						<?php while ( have_posts() ) : the_post() ?>

							<?php the_content() ?>

						<?php endwhile ?>

					<?php endif ?>

				</article>	

				<?php get_template_part('partials/yoast-location'); ?>	

				<?php get_template_part('partials/contact-form') ?>

			</div>

		</div>

	</section>

</div>

<?php get_footer() ?>