<?php
/**
 * Front-page
 *
 * Front page action hooks in inc/front-page-hooks.php
 */

get_header();

?>

<?php if(get_field('warehouse_content')): ?>
<section id="warehouse" class="warehouse">

	<div class="container">

		<div class="row">

			<div class="col-md-12 warehouse-content">

				<?php 
					$wImg = get_field('warehouse_image');
				if($wImg):
				?>
				<img class="img-responsive" src="<?php echo $wImg['url'] ?>" alt="<?php echo $wImg['url'] ?>">

				<?php endif ?>

				<h1 class="section-title">Our Warehouse</h1>

				<?php the_field('warehouse_content') ?>

			</div>

		</div>

	</div>

</section>
<?php endif ?>

<?php if ( have_posts() ) : ?> 

<section id="about" class="home-about">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<h2 class="section-title">About Us</h2>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content() ?>

				<?php endwhile ?>

			</div>

		</div>

	</div>

</section>
<?php endif ?>

<?php 
	$args = array(
	'post_type' => 'item',
	'posts_per_page' => -1,
	);

	$item_query = new WP_Query($args);
	if($item_query->have_posts()):
?>
<section id="inventory">

	<div class="container">

		<div class="row">

			<h2 class="section-title">Our Inventory</h2>

			<div class="items-list">

			<?php while($item_query->have_posts()): $item_query->the_post(); ?>

				<a href="<?php the_permalink() ?>" class="items__item">

					<div class="items__box">

						<?php the_post_thumbnail('item_img') ?>

						<div class="items__content">

							<h3><?php the_title() ?></h3>

							<p><strong>Tri States Low Price: <?php the_field('low_price') ?></strong></p>

							<p><strong>Home Center Pricing: <?php the_field('home_center_price') ?></strong></p>

						</div>

					</div>

				</a>

			<?php endwhile; wp_reset_postdata(); ?>

			</div>

		</div>

	</div>

</section>

<?php endif ?>
<?php get_footer(); ?>

