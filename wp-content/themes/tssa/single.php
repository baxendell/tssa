<?php
/**
 * Single blog template
 */
get_header();

?>

	<section id="blog">

		<div class="container">

			<div class="inner-wrapper row">

				<div class="content col-md-8">

					<?php get_template_part( 'partials/excerpt-loop' ) ?>

					<?php get_template_part('partials/share') ?>
				</div>

				<aside id="sidebar" class="col-md-4">

					<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

				</aside><!--#sidebar-->

			</div><!--.row-->

		</div>

	</section><!--.container-->

</div><!--.schema-wrap-->

<?php get_footer() ?>