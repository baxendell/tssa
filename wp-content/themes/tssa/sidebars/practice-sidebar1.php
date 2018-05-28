							<div class="primary sidebar widget-area" role="complementary">

								<ul class="sidebar-widgets">

									<?php if(get_field('sidebar_copy')): ?>

									<li class="siderbar-item">

										<div class="sidebar-border-box custom-box">

											<?php the_field('sidebar_copy') ?>

											<div class="text-center-sm">

												<a href="/contact-us/" class="btn btn-success slogan-button"><span>Start Your Case Now </span><i class="icon icon-black-arrow hidden-xs"></i></a>

											</div>

										</div>

									</li>

									<?php endif ?>

									<li class="siderbar-item"><?php do_action( 'cws_related_info' ) ?></li>
								
								</ul>

							</div>