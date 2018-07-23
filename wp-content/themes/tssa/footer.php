<?php get_template_part('partials/awards'); ?>

    <footer>

      <div id="site-footer">

        <div class="container">

          <div id="bottom-nav" class="pre-footer-nav row">

            <nav class="col-md-12 text-center">

              <?php wp_nav_menu( array(
                'theme_location'  => 'footer-menu',
                'menu_class'    => 'nav navbar-nav',
                'walker'          => new Walker_Nav_Primary()
              ) ) ?>

            </nav>

          </div>

        </div>

      </div>

      <div id="copywrite">

        <div class="container">

          <div class="row">

            <div class="col-md-5 text-center-sm">

              <span class="copyright"> &copy; <?php echo date('Y'); ?> Tristate Surplus Sales and Auctions. All Rights Reserved.</span>

            </div>

            <div class="col-md-7 col-lg-offset-1 col-lg-5 text-center-sm text-right">

              <a class="built_by remove-decoration" href="https://www.wahhadesign.com/" target="_blank" rel="nofollow">Site by WahhaDesign.com</a>
            
            </div>

          </div>

        </div>
      </div>
    </footer>
    
    <!--<link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Asap:400,700" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700|Proza+Libre:400,400i,700" rel="stylesheet preconnect"> 
	<?php wp_footer() ?>

	</body>

</html>