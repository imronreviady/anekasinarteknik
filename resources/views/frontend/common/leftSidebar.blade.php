<div class="col-xl-3">
	<div class="sidebar">
		<div class="widget search-widget">
			<form>
				<input placeholder="Search Product" type="text" class="form-control form-control-lg">
				<button type="submit" class=""><span class="icon icon-search"></span></button>
			</form>
		</div>
		<div class="widget no-p">
			<ul class="sidebar-menu border-list">

				@if(count($result['categories'])>0)
				@foreach ($result['categories'] as $key=>$category)
				@if($category->language_id == '1')
				<li class="treeview">
					<?php $colors = array('red', 'blue', 'primary', 'success', 'danger', 'green', 'light-blue'); ?>
					<a href="#">
						<i class="icon icon-circle-o text-<?php echo $colors[array_rand($colors)];?>"></i> <span>{{ $category->name }}</span>
					</a>
					@if(count($result['myVar']->getSubCategoryByParentId($category->language_id, $category->id))>0)
					<ul class="treeview-menu">
						@foreach ($result['myVar']->getSubCategoryByParentId($category->language_id, $category->id) as $key=>$subcategory)
						<li>
							<a href="#"><i class="icon icon-circle-o"></i> {{ $subcategory->name }}</a>
						</li>
						@endforeach
					</ul>
					@endif
				</li>
				@endif
				@endforeach
				@endif

			</ul>
		</div>
		<div class="widget widget-tags">
			<h3>Popular Tags</h3>
			<ul class="iconList">
				<li><a href="#">Men</a></li>
				<li><a href="#">Women</a></li>
				<li><a href="#">Jewelry</a></li>
				<li><a href="#">Art Direction</a></li>
				<li><a href="#">User Interface</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="widget widget-best-sellers">
			<h3>Best Sellers</h3>
			<ul>
				<li class="shop-product">
					<figure>
						<img src="{!! asset('resources/views/frontend/assets/img/demo/s3.png') !!}" alt="">
					</figure>
					<div class="product-info"><a href="#">FASHION NICE JACKET</a>
						<div class="price-tag">$40</div>
					</div>
				</li>
				<li class="shop-product">
					<figure>
						<img src="{!! asset('resources/views/frontend/assets/img/demo/s4.png') !!}" alt="">
					</figure>
					<div class="product-info"><a href="#">FASHION NICE JACKET</a>
						<div class="price-tag">$40</div>
					</div>
				</li>
				<li class="shop-product">
					<figure>
						<img src="{!! asset('resources/views/frontend/assets/img/demo/s5.png') !!}" alt="">
					</figure>
					<div class="product-info"><a href="#">FASHION NICE JACKET</a>
						<div class="price-tag">$40</div>
					</div>
				</li>
			</ul>
		</div>
		<!--widget-best-seller-->
	</div>
</div>