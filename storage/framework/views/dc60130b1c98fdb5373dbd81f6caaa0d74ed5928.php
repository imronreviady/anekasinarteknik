<?php $__env->startSection('content'); ?>
<main>
	
	<?php echo $__env->make('frontend.common.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="content-wrapper">
		<div class="container">
			<div class="row">

				<?php echo $__env->make('frontend.common.leftSidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<div class="col-xl-9">
					<div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
						<div class="row">

							<div class="infinite-scroll">
								<?php if(count($result['products'])>0): ?>
								<?php $__currentLoopData = $result['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="xv-product-unit ">
									<div class="xv-product mb-15 mt-15 paper-block">
										<figure>
											<a href="#"><img class="xv-superimage" src="<?php echo e(asset('').'/'.$product->products_image); ?>" alt=""></a>
											<figcaption>
												<ul class="style1">
													<li><a data-qv-tab="#qvt-wishlist" class=" btn-square btn-blue" href="#"><i class="icon icon-heart"></i></a></li>
													<li><a data-qv-tab="#qvt-compare" class=" btn-square btn-blue" href="#"><i class="icon icon-exchange"></i></a></li>
													<li><a class="btn-cart btn-square btn-blue" href="#"><i class="icon icon-expand"></i></a></li>
												</ul>
											</figcaption>
										</figure>
										<div class="xv-product-content">
											<h3><a href="shop-single.html"><?php echo e($product->products_name); ?> <?php if(!empty($product->products_model)): ?> ( <?php echo e($product->products_model); ?> ) <?php endif; ?></a></h3>
											<p>Aenean sollicitudin, nec sagittis sem lorem quist bibe dum auctor, nisi elit consequat ipsum. Duis sed odio sit amet nibh vulputate cursus a nec.</p>
											<ul class="color-opt">
												<li><a href="#"><?php echo e($product->categories_name); ?></a></li>
											</ul>
											<ul class="extra-links">
												<li><a href="#"><i class="icon icon-heart"></i>Wishlist</a></li>
												<li><a href="#"><i class="icon icon-exchange"></i>Compare</a></li>
												<li><a href="#"><i class="icon icon-expand"></i>Expand</a></li>
											</ul>
											<!--ul-->
											<div class="xv-rating stars-5"></div>
											<span class="xv-price"><?php echo e($result['currency'][0]->currency_symbol); ?><?php echo e($product->products_price); ?></span>
											<a data-qv-tab="#qvt-cart" href="shop-single.html" class="product-buy "><i class="icon icon-shopping-basket" aria-hidden="true"></i></a>
										</div>
										<!--xv-product-content-->
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>

								<?php echo e($result['products']->links()); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>