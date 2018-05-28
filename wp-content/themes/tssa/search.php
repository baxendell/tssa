<?php
/**
 * Template name: Search Page
 */
get_header();
?>

	<section id="main-content" class="wrapper">

		<div class="container">

			<div class="inner-wrapper row">

				<div id="page-content" class="col-md-7 no-pad-right">

					<h1 class="page-title">Search Results</h1>

					<div class="content">

						<?php if( have_posts() ) : ?>

							<?php get_template_part( 'partials/excerpt-loop' ) ?>

						<?php else : ?>

							<?php get_template_part( 'partials/404-partial' ) ?>

						<?php endif ?>

					</div>

				</div>

				<aside class="sidebar col-md-4 col-md-offset-1">

					<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

				</aside>

			</div>

		</div>

	</section>

<?php get_footer() ?>