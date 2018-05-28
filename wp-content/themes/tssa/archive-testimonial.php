<?php
/**
 * Template name: Testimonial archive
 */
get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

?>

	<section id="main-content" itemscope itemtype="http://schema.org/Review">

		<div class="container">

			<meta itemprop="itemReviewed" content="Clients Name Here." />

			<div class="inner-wrapper row">

				<div class="content col-md-7 no-pad-right clearfix">

					<h1 class="page-title"><?php h1_title( 558928 ) ?></h1>

					<?php if(have_posts() ) : ?>

						<?php while( have_posts() ) : the_post() ?>

							 <div class="testimonial col-sm-6 text-center">

					          <h3 class="testimonial-title"><?php the_title() ?></h3>

					          <blockquote>
					          <?php the_excerpt();
					            if (has_term('car-accident', 'testimonial_category', $post->ID) ){
					              $svg = 'wheel';
					              $cat = 'car-accident';
					            }
					            elseif (has_term('defective-products', 'testimonial_category', $post->ID) ){
					              $svg = 'pills';
					              $cat = 'defective-products';
					            }
					            elseif (has_term('medical-malpractice', 'testimonial_category', $post->ID) ){
					              $svg = 'star_of_life';
					              $cat = 'medical-malpractice';
					            }            
					            else {

					            }
					          ?>
					            <div class="practice-icons-circle">

					              <div class="practice-icons-circle__inner text-center <?php echo $cat?>-category">

					                <?php include('images/icons/'.$svg.'.svg'); ?>

					              </div>

					            </div>


					            <footer>

					              <cite><?php the_field('client') ?></cite>

					              <?php the_field('client_type') ?>

					            </footer>

					          </blockquote>

					        </div>

						<?php endwhile ?>

					<?php endif; wp_reset_postdata() ?>

					<?php do_action( 'cws_pagination' ) ?>

				</div>

				<div class="col-md-4 col-md-offset-1" id="sidebar">

					<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

				</div>

			</div>

		</div>

	</section>

<?php get_footer() ?>