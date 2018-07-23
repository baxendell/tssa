<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
		<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo( 'name' ) ) ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2"/>
		<meta name="format-detection" content="telephone=no">
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ) ?>">
		<?php get_template_part('partials/favicons') ?>

				<link href="#" rel="publisher"/>
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php wp_head() ?>

		<?php
			$post_slug = $post->post_name;
			$page_slug = 'page-'.$post_slug;
			$post_id   = 'post-id-'.$post->ID;
			$classes   = array( $page_slug, $post_id );

			if(is_front_page()) {
				$menu = 'header-menu';
			} else {
				$menu = 'interior-menu';
			}
		?>
		<!-- Google Tag Manager -->

	</head>
	<body <?php body_class( $classes ) ?>>
		<a href="#main-content" class="skiplink" tabindex="-1">Skip Navigation</a>
		<!-- Google Tag Manager (noscript) -->

		<nav id="nav" class="navbar" data-spy="affix">

			<div class="container">

				<a class="logo" href="/">

					<strong>Tri State</strong><br/>
					Surplus Sales and Auctions

				</a>

				<div class="row">

					<div class="col-xs-12">

						<?php wp_nav_menu( array( 
							'container'         => 'div',
							'theme_location'  => $menu,
							'menu_class' 		=> 'nav navbar-nav',
							'walker'          => new Walker_Nav_Primary()

						) ) ?>

					</div>

				</div>

			</div>

		</nav>
		