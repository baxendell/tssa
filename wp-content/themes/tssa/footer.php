<?php get_template_part('partials/awards'); ?>

    <footer>

      <div id="site-footer">

        <div class="container">

          <div class="row">

            <div class="col-md-4 text-center-sm" itemscope itemtype="http://schema.org/Organization">

              <a href="/" itemprop="url">

                <img itemprop="logo"  src="<?php bloginfo('template_url') ?>/images/client-footer-logo.png" alt="Client Name">

              </a>

            </div>

            <div class="no-pad col-md-5 pull-right-md">

              <ul class="list-inline social-icon-list clearfix text-center-sm">

                <?php if(get_field('linkedin_link', 'option')): ?>

                <li><a href="<?php the_field('linkedin_link', 'option') ?>" target="_blank"><?php include('images/icons/social_icons/linkedin-icon.svg') ?></a></li>            

                <?php endif; if(get_field('google_plus_link', 'option')): ?>

                <li><a href="<?php the_field('google_plus_link', 'option') ?>" target="_blank"><?php include('images/icons/social_icons/google-plus-icon.svg') ?></a></li>

                <?php endif; if(get_field('youtube_link', 'option')): ?>

                <li><a href="<?php the_field('youtube_link', 'option') ?>" target="_blank"><?php include('images/icons/social_icons/youtube-icon.svg') ?></a></li>

                <?php endif; if(get_field('facebook_link', 'option')): ?>

                <li><a href="<?php the_field('facebook_link', 'option') ?>" target="_blank"><?php include('images/icons/social_icons/facebook-icon.svg') ?></a></li>

                <?php endif; if(get_field('twitter_link', 'option')): ?>

                <li><a href="<?php the_field('twitter_link', 'option') ?>" target="_blank"><?php include('images/icons/social_icons/twitter-icon.svg') ?></a></li>

                <?php endif ?>

              </ul>

            </div>

          </div>

          <div id='footer-map-section' class=" location row">

            <div class="col-md-7 col-lg-8 pr-70-lg">

              <div class="blue-border-box clearfix">

                <div class="col-md-6 no-pad-right">

                  <?php 
                  $location_id = '12681';
                  $meta = get_post_meta($location_id); ?>

                  <div class="location-meta-address">

                    <div id="wpseo_location-<?php echo $location_id ?>" class="wpseo-location" itemscope="" itemtype="http://schema.org/Attorney">

                      <span class="wpseo-business-name law-firm-footer-title" itemprop="name"><!--client name--></span>

                      <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress" class="wpseo-address-wrapper" >

                        <div class="street-address" itemprop="streetAddress"><?php echo $meta["_wpseo_business_address"][0]; ?></div>

                          <span class="locality" itemprop="addressLocality"> <?php echo $meta["_wpseo_business_city"][0]; ?></span>, <span class="region" itemprop="addressRegion"><?php echo $meta["_wpseo_business_state"][0]; ?></span>, <span class="postal-code" itemprop="postalCode"><?php echo $meta["_wpseo_business_zipcode"][0]; ?></span>

                      </div>

                      <span class="wpseo-phone"><span itemprop="telephone"><?php echo $meta["_wpseo_business_phone"][0]; ?></span></span>

                    </div>   


                  </div>

                </div>

                <div class="no-pad-right col-md-6 pl-40-lg no-pad-sm">

                  <div class="visible-xs">

                    <?php get_template_part('partials/mobile-btns') ?>

                  </div>

                    <?php
                    //map
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
                    }
                    ?>

                </div>

              </div>

            </div>

          </div>

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

            <div class="bottom-footer-menu col-xs-12 text-center">

              <a class='remove-decoration' href="/disclaimer/"><span>Terms of Use</span> / <span>Privacy Policy</span> / <span>Disclaimer</span></a>

            </div>

            <div class="col-md-5 text-center-sm">

              <span class="copyright"> &copy; <?php echo date('Y'); ?> <!--client name--> All Rights Reserved.</span>

            </div>

            <div class="col-md-7 col-lg-offset-1 col-lg-6 text-center-sm">

              <a class="built_by remove-decoration hidden-xs" href="https://www.consultwebs.com/" target="_blank" rel="nofollow">
                <i class="icon icon-cw"></i>Site by Consultwebs.com: Law Firm Website Designers / Personal Injury Lawyer Marketing</a>

               <a class="built_by remove-decoration visible-xs" href="https://www.consultwebs.com/" target="_blank" rel="nofollow">
                <i class="icon icon-cw"></i>Site by Consultwebs.com</a>
            
            </div>

          </div>

        </div>
      </div>
    </footer>
    
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Asap:400,700" rel="stylesheet">

	<?php wp_footer() ?>

	</body>

    <script>

    function loadCSS( href, before, media, callback ){
        "use strict";
        var ss = window.document.createElement( "link" );
        var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
        var sheets = window.document.styleSheets;
        ss.rel = "stylesheet";
        ss.href = href;
        // temporarily, set media to something non-matching to ensure it'll fetch without blocking render
        ss.media = "only x";
        // DEPRECATED
        if( callback ) {
            ss.onload = callback;
        }
        // inject link
        ref.parentNode.insertBefore( ss, ref );
        // This function sets the link's media back to `all` so that the stylesheet applies once it loads
        // It is designed to poll until document.styleSheets includes the new sheet.
        ss.onloadcssdefined = function( cb ){
            var defined;
            for( var i = 0; i < sheets.length; i++ ){
                if( sheets[ i ].href && sheets[ i ].href === ss.href ){
                    defined = true;
                }
            }
            if( defined ){
                cb();
            } else {
                setTimeout(function() {
                    ss.onloadcssdefined( cb );
                });
            }
        };
        ss.onloadcssdefined(function() {
            ss.media = media || "all";
        });
        return ss;
    }
    // use loadCSS to load fonts.css
    loadCSS('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    </script>

</html>