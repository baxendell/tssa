<?php
/**
 * CWS Custom Functions
 */



/**
 * Count Post Views
 *
 *
 * @return void
 */
function cws_set_post_views($postID) {
    $count_key = 'cws_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Remove all special chars and replace spaces with "-"
 * Good for turning page title into classes
 * Also good SEO friendly if used for URLs
 *
 * @param $string
 *
 * @return filtered string
 */
function cws_clean( $string ) {
	$string = str_replace( array( '[\', \']' ), '', $string);
	$string = preg_replace( '/\[.*\]/U', '', $string );
	$string = preg_replace( '/&(amp;)?#?[a-z0-9]+;/i', '-', $string );
	$string = htmlentities( $string, ENT_COMPAT, 'utf-8' );
	$string = preg_replace( '/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	$string = preg_replace( array('/[^a-z0-9]/i', '/[-]+/') , '-', $string );

	return strtolower( trim( $string, '-' ) );
}

/**
 * H1 title function
 *
 * @param $id boolean
 * @param $echo boolean
 *
 * @return boolean or $title string
 */
function h1_title( $id = false, $echo = true ) {
global $post;
$title = "";

	if ( $id ) {
		$title = get_field( 'h1_title', $id ) ? get_field( 'h1_title', $id ) : get_the_title( $id );
	} else {
		$title = get_field( 'h1_title', $post->ID ) ? get_field( 'h1_title', $post->ID ) : get_the_title($post->ID );
	}

	if ( $title != "" ) {
		if ($echo) {
			echo $title;
		} else {
			return $title;
		}
	} else {
		return false;
	}
}

/**
 * Retrieve the image attachment ID with it's URL.
 * Next, return alt text from the image's Attachment Details
 *
 * @param $image_url
 *
 * @return $alt_text string
 */
function cws_get_alt_text( $image_url ) {
	global $wpdb;

	if( ! isset( $image_url ) ) {
		echo "Please add an image.";
		return;
	}

	$attachment  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
	$alt_text    = get_post_meta( $attachment[0], '_wp_attachment_image_alt', true );
	$alt_default = 'CWS default alt tag';

	if( ! empty( $alt_text ) ) {
		return $alt_text;
	} else {
		return $alt_default;
	}
}

/**
 * Custom comments callback function
 *
 * @param $comment $args $depth
 *
 * @return void
 */
function cws_custom_commments( $comment, $args, $depth ) {
	$GLOBALS[ 'comment' ] = $comment ?>
		<li <?php comment_class() ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID() ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, $size = '48', $default = '<path_to_url>' ) ?>

					<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ) ?>
				</div>

				<?php if( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
				<?php endif ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ) ?>
					</a>
					<?php edit_comment_link( __( '(Edit)' ), ' ', '' ) ?>
				</div>

				<?php comment_text() ?>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
						)
					) ) ?>
				</div>
			</div>
		</li>
	<?php
}