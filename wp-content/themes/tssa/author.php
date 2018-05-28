<?php 
/**
 * Author template
 */
get_header();
?>

	<section class="wrapper container">

		<div class="inner-wrapper row">

			<div class="content col-md-7 no-pad-right">

				<?php get_template_part( 'partials/excerpt-loop' ) ?>

			</div>

			<div class="col-md-4 col-md-offset-1" id="sidebar">

				<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

			</div>

		</div>

	</section>

<?php get_footer() ?>