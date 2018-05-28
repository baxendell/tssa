<?php
/**
 * Roberts breadcrumb partial
 */
?>
<div class="breadcrumb-container hidden-xs hidden-sm">
  <div class="container"> 
	<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>

		<?php if(is_404()):?>

			<p class="breadcrumb">

				<span xmlns:v="http://rdf.data-vocabulary.org/#">

					<span typeof="v:Breadcrumb">

						<a href="/" rel="v:url" property="v:title">Home</a>  

						<span class="breadcrumb_last">Error 404: Page not found</span>

					</span>

				</span>

			</p>

		<?php else: yoast_breadcrumb( '<p class="breadcrumb">','</p>' ) ?>

		<?php endif; ?>

	<?php endif ?> 
  </div>
</div>
