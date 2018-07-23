<?php
/**
 * Standard Page partial
 */

?>
<section id="main-content">
	<div class="container">
	    <div class="row">
	    	<article class="col-xs-12 entry-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>

				<h1 class="section-title"><?php h1_title() ?></h1>


					<?php if ( has_post_thumbnail() ) : ?>

				<div class="feature-wrap">

					<?php the_post_thumbnail('medium') ?>

				</div>

					<?php endif ?>

				<div>

					<?php the_content() ?>

				</div>

				<?php endwhile; endif; ?>

			</article>

		</div>

	</div>

</section>

