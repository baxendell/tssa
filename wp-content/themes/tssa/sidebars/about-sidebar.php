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
		<?php if(get_field('main_video_image')):
			$v_img = get_field('main_video_image');
			$v_url = $v_img['url'];
			$v_alt = $v_img['alt'];
		?>
		<li class="siderbar-item">
			<a href="#" data-toggle="modal" data-target="#sidebarVid1">
				<img src="<?php echo $v_url ?>" alt="<?php echo $v_alt ?>">
			</a>	

		</li>
		<?php endif;?>
		<li class="siderbar-item"><?php do_action( 'cws_testimonial_sidebar' ) ?></li>

	</ul>

	<!-- Modal -->
	<div class="modal fade" id="sidebarVid1" tabindex="-1" role="dialog" aria-labelledby="sidebarVid1">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body">
	      	<div class="embed-responsive embed-responsive-4by3">
		        <?php $vid_sc = get_field('main_video_shortcode'); echo do_shortcode($vid_sc); ?>
			</div>
	      </div>
	    </div>
	  </div>
	</div>		
</div>
