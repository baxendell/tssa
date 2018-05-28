<?php
/**
 * Locations archive
 */

get_header();
?>

	<main id="main" role="main">

		<section id="main-content" class="wrapper">

			<div class="container">

				<div class="inner-wrapper row">

					<div id="page-content" class="col-md-7 no-pad-right">

						<h1 class="page-title">Locations</h1>

						<div class="content">

						<?php $i = 0 ?>

						<?php if ( have_posts() ) : ?> 

							<?php while ( have_posts() ) : the_post(); $i++ ?>

								<?php 

									global $post;
									$home = esc_attr( home_url() );

								?>					

							<article class="blog-holder">

								<div class="blog-post clearfix">

									<div class="post-wrap">

										<div class="description-holder blog-excerpt entry-content">

											<div class="blog-title">

												<h2><?php the_title() ?></h2>

											</div>									

											<?php the_excerpt() ?>

										</div>

										<div class="text-right">

											<a class="blog-read-more-btn op-alt-teal btn uppercase" href="<?php the_permalink()?>">View Location</a>

										</div>

									</div>

								</div>

							</article>

							<?php endwhile ?>

						<?php endif ?>

						</div>

					</div>

					<div class="col-md-4 col-md-offset-1" id="sidebar">

						<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

					</div>

				</div>

			</div>

		</section>

	</main>

<?php get_footer() ?>