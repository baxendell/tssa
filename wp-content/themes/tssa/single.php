<?php
/**
 * Single blog template
 */
get_header();

?>

	<section id="blog">

		<div class="container">

			<div class="inner-wrapper row">

				<div class="content col-xs-12">

					<?php get_template_part( 'partials/excerpt-loop' ) ?>

					<?php //get_template_part('partials/share') ?>
				</div>

			</div><!--.row-->

		</div>

	</section><!--.container-->

</div><!--.schema-wrap-->

<?php get_footer() ?>