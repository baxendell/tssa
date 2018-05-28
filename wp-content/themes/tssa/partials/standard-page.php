<?php
/**
 * Standard Page partial
 */

?>
<section id="main-content">
	<div class="container">
	    <div class="row">
	    	<article class="col-md-7 no-pad-right entry-content">
				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

				<header>

					<?php if(!is_singular('attorney')): ?>
					<span class="heading-sub"><?php the_field('subtite') ?></span>

					<?php endif ?>

					<h1 class="page-title"><?php h1_title() ?></h1>

					<?php if(is_singular('attorney')): ?>
					<span class="heading-sub"><?php the_field('position') ?></span>
					<?php endif ?>

				</header>


						<?php if ( has_post_thumbnail() ) : ?>

				<div class="feature-wrap">

						<?php the_post_thumbnail('medium') ?>

				</div>

						<?php endif ?>

				<div>

					<?php the_content() ?>

				</div>

					<?php endwhile ?>

				<?php endif ?>

			</article>


			<aside class="col-md-4 col-md-offset-1" id="sidebar">

			<?php 

				if ( is_page( 'contact' ) ) {

					get_template_part( 'sidebars/contact-sidebar' );

				} elseif( is_singular( 'attorney' ) ) {

					get_template_part( 'sidebars/attorney-bio-sidebar' );

				} elseif( is_singular( 'wpseo_locations' ) ) {

					get_template_part( 'sidebars/location-sidebar' );

				} elseif( is_page_template('practice-area-landing.php')) {

					get_template_part( 'sidebars/legal-services-sidebar' );

				} else {

					get_template_part( 'sidebars/generic-sidebar' );

				}

			?>

			</aside>

		</div>

	</div>

</section>

