<?php
/*
 * Index
 */
get_header() ?>

	<section class="wrapper container">

		<div class="inner-wrapper row">

			<div class="content col-sm-7 col-md-8">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<p><?php the_content() ?></p>

					<?php endwhile ?>

				<?php endif ?>

			</div>

			<div class="col-sm-5 col-md-4" id="sidebar">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</div>

		</div>

	</section>

<?php get_footer() ?>