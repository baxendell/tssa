<?php
/**
 * CWS Custom Shortcodes
 */

/**
 * Loaction information
 * output Yoast location data
 *
 * @add_action cws_location
 *
 * @return 
 */
function cws_location_output() {
	ob_start();
		get_template_part( 'partials/location-main' );
	return ob_get_clean();
}
add_shortcode( 'cws_location', 'cws_location_output' );


/**
 * Map for content areas
 *
 * @add_shortcode
 *
 * @return get_template_part( 'content-map' ) partial
 */
function cws_form_output() {
	ob_start();
	?>
	<div class="banner-form-container form-block">
		<?php get_template_part( 'partials/form' ) ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cws_form', 'cws_form_output' );


/**
 * Download Form
 *
 * @add_shortcode
 *
 * @return get_template_part( 'content-map' ) partial
 */
function cws_download_form() {
	ob_start();
	?>
	<div class="banner-form-container form-block">
		<?php get_template_part( 'partials/downloadform' ) ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cws_download', 'cws_download_form' );

/**
 * Download Form
 *
 * @add_shortcode
 *
 * @return get_template_part( 'content-map' ) partial
 */
function cws_request_form() {
	ob_start();
	?>
	<div class="banner-form-container form-block">
		<?php get_template_part( 'partials/requestform' ) ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cws_request', 'cws_request_form' );



//Contact Button
function contact_btn() {
	return '<a href="/contact-us" class="btn btn-cta-green btn-lg"><span>Tell Us About Your Case</span><i class="icon ion-log-in"></i></a>';
}
add_shortcode('btn_contact', 'contact_btn');

//Column

function cw_one_third( $atts, $content = null ) {
   return '<div class="no-pad-left col-sm-4 no-p">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'cw_one_third');

function cw_one_half( $atts2, $content2 = null ) {
   return '<div class="no-pad-left col-sm-6 no-p">' . do_shortcode($content2) . '</div>';
}
add_shortcode('one_half', 'cw_one_half');

//Green Button

function green_btn_sc($atts) {
	$a = shortcode_atts(
		array(
			'link' => '',
			'text' => '',
			), $atts
		);
	return '<a class="btn-cta-green" href="'.$a['link'].'">
              <span>'.$a['text'].'</span>
              <i class="icon icon-white-arrow"></i>
            </a>';
}
add_shortcode('green_btn', 'green_btn_sc');

//Call too Action
function cw_call_to( $atts3, $content3 = null ) {
   return '<div class="col-md-8 center-col get-help-callout text-center clearfix"><h4>Contact us any time, 24/7. Call or click now!</h4><div class="left-col"><a href="/contact-us/">361.792.2586<span>Request a call back</span></a></div><div class="right-col"><a href="/contact-us/" class="btn btn-success slogan-button"><span>Start Your Case Now </span><i class="icon icon-black-arrow"></i></a></div></div>';
}
add_shortcode('cw_call', 'cw_call_to');

//Testimonial
function cws_testimony_output() {
	ob_start();
		get_template_part( 'partials/testimonial-short' );
	return ob_get_clean();
}
add_shortcode( 'cw_testimonial', 'cws_testimony_output' );