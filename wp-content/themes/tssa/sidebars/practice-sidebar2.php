							<div class="primary sidebar widget-area" role="complementary">

								<ul class="sidebar-widgets">

									<li class="siderbar-item">

										<div class="green-type entry-content">

											<?php $sb_icon = get_field('green_sidebar_icon');
												$sb_url = $sb_icon['url'];
												$sb_alt = $sb_icon['alt'];
											?>

											<h3>
												<img src="<?php echo esc_url($sb_url) ?>" alt="<?php esc_attr($sb_alt) ?>"> <?php the_field('green_sidebar_title') ?></h3>

											<?php the_field('green_sidebar_text') ?>

										</div>

									</li>

								</ul>

							</div>