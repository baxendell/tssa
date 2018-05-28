      <?php 

        $awards_args = array(
        'post_type'      => 'awards',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
        );

        $awards_query = new WP_Query( $awards_args );

        if($awards_query->have_posts() ) :

      ?>

      <section id="callouts" class="carousel-holder carousel-wrapper hidden-print">

        <div class="container">

          <div class="row carousel">

            <h3 class="text-center text-uppercase">a practice built on trust</h3>

            <div class="mask">

              <div id="association-rack" class="col-xs-12">

                <?php while($awards_query->have_posts()): $awards_query->the_post();?>

                <div class="slide item">

                  <div class="image-holder">

                    <?php if(get_field('script')): the_field('script'); else: ?>

                    <a href="<?php the_field('award_link') ?>" target="_blank">

                      <?php the_post_thumbnail('full');?>

                    </a>

                    <?php endif; ?>

                  </div>

                </div>

                <?php endwhile; wp_reset_postdata(); ?>

              </div>

            </div>

            <div class="customNavigationAwards"></div>

          </div>

        </div>

      </section>

      <?php endif; wp_reset_postdata();?>
