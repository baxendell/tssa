<?php
/**
 * Sidebar template containing the primary widget area.
 *
 * Sidebar action methods are found in inc/sidebar-hooks.php
 *
 * @package WordPress
 * @subpackage CWS_Custom_Theme
 * @since CWS Custom Theme 1.0.0
 */
?>
<div id="primary" class="sidebar widget-area" role="complementary">

	<ul class="sidebar-widgets">

		<li class="siderbar-item"><?php get_template_part( 'partials/yoast-location' ) ?></li>

		<li class="sidebar-item">

			<a id="three-d" href="https://goo.gl/maps/US7dWPA87fA2" target="_blank">
				<h3><i class="icon icon-3dmarker"></i> Take a Google Virtual Tour of Our Office</h3>
				<img src="<?php bloginfo('template_url')?>/images/google-layout.jpg" alt="Hermann and Hermann Corpus Christi Office">
				<span class="text-uppercase">View on Google Maps <i class="icon icon-white-arrow"></i></span>
			</a>

		</li>

		<li class="siderbar-item"><?php do_action( 'cws_start_your_case' ) ?></li>

	</ul>

</div>
