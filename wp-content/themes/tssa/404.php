<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

	<div class="four-o-four col-md-6">

		<header>
			<span>Error Code: 404</span>
			<h1>We can’t seem to find the page you’re looking for.</h1>
		</header>
		
		<p>The page you were looking for appears to have been moved, deleted or does not exist. Go back to the previous page, go straight to our <a href="/">homepage</a> or contact us now—</p>

		<div class="search-wrap">

			<?php get_search_form( ) ?>

		</div>		

	</div>


<?php get_footer();?>