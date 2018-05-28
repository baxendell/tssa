<?php
/*
 * Blog page "Home"
 */
get_header() ?>

	<section id="blog">

		<div class="container">

			<div class="inner-wrapper row">

				<div class="content col-md-8">
	            
        			<h1 class="page-title">Client Name</h1>

					<div class="inner-content">

						<?php get_template_part( 'partials/excerpt-loop' ) ?>

					</div><!--.inner-content-->

					<div class="blog-pagination">

						<?php do_action( 'cws_pagination' ) ?>

					</div><!--.blog-pagination-->

				</div><!--.content-->

				<aside id="sidebar" class="col-md-4">

					<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

				</aside><!--#sidebar-->
	            
	            <div class="clearfix"></div>

			</div><!--.row-->

		</div>

	</section><!--.container-->

<?php get_footer() ?>