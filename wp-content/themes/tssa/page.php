<?php
/**
 * Page Template
 *
 * Page action methods found in inc/set-vars-hooks.php
 */
get_header();
get_template_part('partials/top-nav');
//get_template_part('partials/title-holder');
 ?>

<main id="main" role="main">

<?php if( is_page( 'site-map' ) ) : ?>

	<?php get_template_part( 'partials/sitemap' ) ?>

<?php else : ?>

	<?php get_template_part( 'partials/standard-page' ) ?>

<?php endif ?>

<?php //get_template_part('partials/breaking-useful-columns'); ?>

<?php get_template_part('partials/call-to-action-section'); ?>

</main>

<?php get_footer() ?>
