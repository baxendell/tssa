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

		<?php if(is_post_type_archive('wpseo_locations')): ?>

		<li class="siderbar-item"><?php do_action( 'cws_form_sidebar' ) ?></li>

		<?php endif ?>

		<li class="siderbar-item"><?php do_action( 'cws_related_info' ) ?></li>

		<li class="siderbar-item"><?php do_action( 'cws_custom_sb' ) ?></li>

  </ul>

</div>
