<?php
/**
 * Loaction information
 * output Yoast location data
 */
global $post;
                  
$location_id = '12681';
$meta = get_post_meta($location_id); 

?>

<section class='location-container'>

	<div class='container'>

		<div class='row location'>

			<div id='location-map-box' class="blue-border-box offset-box__block clearfix">

				<div class="col-md-6 col-lg-6">

					<div class="location-meta-address">

					    <div id="wpseo_location-<?php echo $location_id ?>" class="wpseo-location" itemscope="" itemtype="http://schema.org/Attorney">

					      <span class="wpseo-business-name law-firm-footer-title" itemprop="name"><!--client name--></span>

					      <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress" class="wpseo-address-wrapper" >

					        <div class="street-address" itemprop="streetAddress"><?php echo $meta["_wpseo_business_address"][0]; ?></div>

					          <span class="locality" itemprop="addressLocality"> <?php echo $meta["_wpseo_business_city"][0]; ?></span>, <span class="region" itemprop="addressRegion"><?php echo $meta["_wpseo_business_state"][0]; ?></span>, <span class="postal-code" itemprop="postalCode"><?php echo $meta["_wpseo_business_zipcode"][0]; ?></span>

					      </div>

					      <span class="wpseo-phone"><span itemprop="telephone"><?php echo $meta["_wpseo_business_phone"][0]; ?></span></span>

					    </div> 

					    <div class='location-buttons text-center-sm'>

							<a href="<?php the_field('directions', $location_id)?>" target="_blank" class="btn text-uppercase op-alt-teal remove-decoration">GET DIRECTIONS</a>

							<a href="#" target="_blank" class="btn text-uppercase op-alt-teal remove-decoration" data-toggle="modal" data-target="#officeModal">OFFICE HOURS</a>

							<div class="modal fade" id="officeModal" tabindex="-1" role="dialog">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h2 class="modal-title">Office Hours</h2>
							      </div>
							      <div class="modal-body">
							        <?php if ( function_exists( 'wpseo_local_show_opening_hours' ) ) { 
							        	$params = array( 
							        		'id' => $location_id,
							        		'hide_closed' => false,
							        		'echo'=> true,
							        		'comment' => ''
										);
										wpseo_local_show_opening_hours( $params );
										}
									?>
							      </div>
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

						</div>

					</div>					

				</div>

				<div class="no-pad-right col-md-6 col-lg-6 no-pad-sm">

					<?php
                    //map
                    if( function_exists( 'wpseo_local_show_map' ) ) {
                      $params = array(
                        'echo'       => true,
                        'id'         => $location_id,
                        'width'      => 293,
                        'height'     => 390,
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

</section>