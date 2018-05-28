<?php
/**
 * Locations single
 */
get_header() ?>

	<section class="wrapper container">

		<div class="inner-wrapper row">

			<div class="content col-md-7 no-pad-right">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<p><?php the_content() ?></p>

					<?php endwhile ?>

				<?php endif ?>

			</div>

			<div class="col-md-4 col-md-offset-1" id="sidebar">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</div>

		</div>

	</section>

<?php get_footer() ?>