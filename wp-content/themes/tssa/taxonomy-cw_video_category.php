<?php
/*
 * Categories template
 */
get_header(); ?>

<div class="main-wrapper category-view">

    <section id="blog" class="main-content top-40">

        <div class="container">

            <div class="inner-wrapper row">

                <div class="content col-md-8">

                    <h1 class="page-title">Category page: <?php the_archive_title(); ?></h1>

                    <div class="inner-content">

						<?php get_template_part( 'partials/excerpt-video-loop' ) ?>

                    </div><!--.inner-content-->

                    <div class="blog-pagination">

						<?php do_action( 'cws_pagination' ) ?>

                    </div><!--.blog-pagination-->

                </div><!--.content-->

                <div class="col-sm-4 sidebar bg-left-shadow">

					<?php do_action('cws_featured_post') ?>

                    <?php do_action('cws_category_sidebar') ?>

                </div>

                <div class="clearfix"></div>

            </div><!--.row-->

        </div>

    </section>

</div>

<?php get_footer() ?>
