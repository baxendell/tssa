<?php
/*
 * Archive template
 */
get_header();
?>

	<section id="main-content" class="wrapper">

		<div class="container">

			<div class="inner-wrapper row">

				<div id="page-content" class="col-md-7 no-pad-right">

					<h1 class="page-title"><?php the_archive_title() ?></h1>

					<div class="content">

						<?php get_template_part( 'partials/excerpt-loop' ) ?>

					</div>

					<div class="blog-pagination">

						<?php do_action( 'cws_pagination' ) ?>

					</div>
					
				</div>

				<div class="col-md-4 col-md-offset-1" id="sidebar">

					<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

				</div>

			</div>

		</div>

	</section>

<?php get_footer() ?>
