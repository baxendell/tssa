<?php
/**
 * Comments Template
 * @package WordPress
 * @subpackage Default_Theme
 */

if( have_comments() ) : ?>

	<section id="post-comments">
		<h4 id="comments"><?php comments_number( '0', 'One Comment', '% Comments' ) ?></h4>

		<ul class="comment-list">
			<?php wp_list_comments( 'callback=set_custom_commments' ) ?>
		</ul>
	</section>

<?php endif ?>

<?php

$args = array(
	'id_form'           => 'commentform',
	'class_form'        => 'noauto',
	'id_submit'         => 'submit_comment',
	'class_submit'      => 'submit_comment',
	'name_submit'       => 'submit_comment',
	'title_reply'       => __( 'Leave a Reply' ),
	'title_reply_to'    => __( 'Leave a Reply to %s' ),
	'cancel_reply_link' => __( 'Cancel Reply' ),
	'label_submit'      => __( 'Post Comment' )
);

comment_form( $args );


