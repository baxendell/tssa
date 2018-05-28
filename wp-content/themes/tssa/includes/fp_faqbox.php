<?php
	global $stylesheet_directory;
	$isfirst = true;
	$args = array('post_type' => 'qa_faqs', 'posts_per_page' => 5);
	/*global $faq_category;
	if(isset($faq_category) && $faq_category != ''){
		$args['tax_query'] = array(
			array(
				'taxonomy'=>'faq_category',
				'field'=>'slug',
				'terms'=>$faq_category 
			)
		);
	}*/
	$the_query = new WP_Query( $args );
?>
<div class="onethird faqbox padded_full_mobile">
	<div class="inner">
		<p>FREQUENTLY ASKED QUESTIONS</p>
<?php
	// The Loop
	if ( $the_query->have_posts() ) {							
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
?>
		<div class="fp_faqbox" id="faq_<?php the_ID(); ?>" <?php echo $isfirst?'':' style="display:none;"' ?>>
			<h3><a href="<?php echo get_permalink()?>"><?php the_title(); ?></a></h3>
			<p><?php echo excerpt(25); ?> <a href="<?php echo get_permalink(); ?>" class="readmorefaqlink">Read More</a></p>
			<a href="#" class="nextfaq nextquestion" id="faq_next_<?php the_ID(); ?>">NEXT QUESTION</a>
		</div>
<?php
			
			$isfirst = false;
		}							
	} else {
		// no posts found
	}
?>
	</div>
</div>

<?php
	/* Restore original Post Data */
	wp_reset_postdata();
?>