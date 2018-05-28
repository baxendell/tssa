<?php
/**
 * Excerpt loop
 */

$i    = 0; 
$home = esc_attr( home_url() );

?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); $i++ ?>

        <article class="row <?php echo( is_single() ) ? 'blog-holder' : 'post-excerpt' ?> <?php echo "excerpt-" . $i ?>">

            <div class="blog-post clearfix">
                
                <div class="col-sm-12 <?php echo ( is_single() ) ? 'blog-title' : 'excerpt-title' ?>">

                    <?php
                        global $post;
                        $author_id     = get_the_author_meta( 'ID' );
                        $author        = get_author_posts_url( $author_id );
                        $author_name   = get_the_author_meta( 'display_name' );
                        $category      = get_terms(array('taxonomy' => 'cw_video_category'));
                        $category_name = $category[0]->name;
                        $category_id   = $category[0]->term_id;
                        $link          = get_category_link( $category_id );
                    ?>
                          
                    <h2 itemprop="name headline"><?php the_title() ?></h2>

                    <div class="post-meta-wrap">

                        <div class="post-meta" itemprop="author">
                                    
                            <span>

                                <meta itemprop="datePublished" content="<?php echo get_the_date() ?>">
                        
                                <time class="month" datetime="<?php the_time('F j, Y')?>"><?php the_time('F j, Y') ?></time>

                                |
                                
                                <a href="<?php echo $link?>"><?php echo $category_name ?></a>
                            
                            </span>
    
                        </div><!--.post-meta-->

                    </div><!--.post-meta-wrap-->

                </div><!--.blog-title-->
                
                <?php if ( ! is_single() ) : ?>
                
                    <?php if ( has_post_thumbnail() ) : ?>
                    
                        <div class="image-holder post-featured-image col-sm-4 no-pad-right">
    
                            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    
                                <meta itemprop="url" content="<?php the_post_thumbnail_url() ?>">
    
                                <meta itemprop="width" content="120">
    
                                <meta itemprop="height" content="120">
    
                                <img src="<?php the_post_thumbnail_url() ?>" class="img-responsive" />
    
                            </div>
    
                        </div><!--.image-holder-->
    
                    <?php endif ?>
                
                    <div class="post-wrap <?php echo ( has_post_thumbnail() ) ? 'col-sm-8 no-pad-left' : 'col-sm-12' ?>">
    
                        <div class="<?php echo ( is_single() ) ? 'blog-content' : 'blog-excerpt' ?>" itemprop="articleBody">
    
                            <?php the_excerpt() ?>


                        <?php 
                        $video_ID = get_the_ID();

                        echo do_shortcode('[videosingle id="'.$video_ID.'" width="735" height="315" showinfo="true" rel="false" format="true" /]');
                        
                        ?>
    
                        </div>
    
                    </div>
                
                <?php endif ?>
                
                <?php if( is_single() ) : ?>
                
                    <div class="post-wrap col-sm-12">
    
                        <div class="blog-content" itemprop="articleBody">
                        
                            <?php if( has_post_thumbnail() ) : ?>
    
                                <div class="image-holder featured-image col-sm-4 no-pad">
        
                                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
            
                                        <meta itemprop="url" content="<?php the_post_thumbnail_url() ?>">
            
                                        <meta itemprop="width" content="120">
            
                                        <meta itemprop="height" content="120">
            
                                        <img src="<?php the_post_thumbnail_url() ?>" class="img-responsive" />
            
                                    </div>
            
                                </div>
                                
                            <?php endif ?>

                            <?php the_content() ?>
    
                        </div>
    
                    </div>

                    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

                        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

                            <meta itemprop="url" content="<?php echo $home ?>/logo.jpg">

                            <meta itemprop="width" content="600">

                            <meta itemprop="height" content="60">

                        </div>

                        <meta itemprop="name" content="<?php bloginfo( 'name' ) ?>">

                    </div>
                
                <?php endif ?>
                
                <!-- END NEW -->

            </div>
        
        </article>

    <?php endwhile ?>

<?php endif ?>
