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
<div class="sidebar widget-area" role="complementary">

	<ul class="sidebar-widgets">

		<li class="sidebar-item">

			<div class="sidebar-border-box">

				<h3><i class="icon icon-judge"></i> <?php the_field('custom_sidebar_block_title') ?></h3>

				<?php the_field('custom_sidebar_block_content') ?>

			</div>

		</li>

		<?php if(get_field('main_video_image')):
			$v_img = get_field('main_video_image');
			$v_url = $v_img['url'];
			$v_alt = $v_img['alt'];
		?>
		<li class="siderbar-item text-center-sm">
			<a href="#" data-toggle="modal" data-target="#sidebarVid1">
				<img src="<?php echo $v_url ?>" alt="<?php echo $v_alt ?>">
			</a>	

		</li>
		<?php endif;?>		


	</ul>

</div>
