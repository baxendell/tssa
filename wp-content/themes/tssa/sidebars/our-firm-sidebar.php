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
	<?php
		if ( is_active_sidebar( 'cws_our_firm_sidebar' ) ) {
			dynamic_sidebar( 'cws_our_firm_sidebar' );
		} else {
			echo 'Please insert a sidebar widget.';
		}
	?>
</div>
