<?php get_template_part('partials/awards'); ?>

    <footer>

      <div id="site-footer">

        <div class="container">

          <!--

          <div class="row">

            <div class="col-md-4 text-center-sm" itemscope itemtype="http://schema.org/Organization">

              <a href="/" itemprop="url">

                <img itemprop="logo"  src="<?php bloginfo('template_url') ?>/images/client-footer-logo.png" alt="Client Name">

              </a>

            </div>

          </div>
          -->
          <!--

          <div id='footer-map-section' class=" location row">

            <div class="col-md-7 col-lg-8 pr-70-lg">

              <div class="blue-border-box clearfix">

                <div class="col-md-6 no-pad-right">

                  <?php 
                  //$location_id = '12681';
                  //$meta = get_post_meta($location_id); ?>

                  <div class="location-meta-address">

                    <div id="wpseo_location-<?php //echo $location_id ?>" class="wpseo-location" itemscope="" itemtype="http://schema.org/Attorney">

                      <span class="wpseo-business-name law-firm-footer-title" itemprop="name">TSSA</span>

                      <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress" class="wpseo-address-wrapper" >

                        <div class="street-address" itemprop="streetAddress"><?php //echo $meta["_wpseo_business_address"][0]; ?></div>

                          <span class="locality" itemprop="addressLocality"> <?php //echo $meta["_wpseo_business_city"][0]; ?></span>, <span class="region" itemprop="addressRegion"><?php //echo $meta["_wpseo_business_state"][0]; ?></span>, <span class="postal-code" itemprop="postalCode"><?php //echo $meta["_wpseo_business_zipcode"][0]; ?></span>

                      </div>

                      <span class="wpseo-phone"><span itemprop="telephone"><?php //echo $meta["_wpseo_business_phone"][0]; ?></span></span>

                    </div>   


                  </div>

                </div>

                <div class="no-pad-right col-md-6 pl-40-lg no-pad-sm">

                  <div class="visible-xs">

                  </div>

                    <?php
                    //map
                    /*
                    if( function_exists( 'wpseo_local_show_map' ) ) {
                      $params = array(
                        'echo'       => true,
                        'id'         => $location_id,
                        'width'      => 293,
                        'height'     => 272,
                        'zoom'       => 15,
                        'show_route' => false
                      );
                      wpseo_local_show_map( $params );
                    }*/
                    ?>

                </div>

              </div>

            </div>

          </div>

          -->

          <div id="bottom-nav" class="pre-footer-nav row">

            <nav class="col-xs-12 text-center">

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
    
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Asap:400,700" rel="stylesheet">

	<?php wp_footer() ?>

	</body>

</html>