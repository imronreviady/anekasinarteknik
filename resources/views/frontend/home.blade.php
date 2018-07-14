@extends('frontend.layout')
@section('content')
<main>
	
	@include('frontend.common.slider')

	<div class="content-wrapper">
		<div class="container">
			<div class="row">

				@include('frontend.common.leftSidebar')

				<div class="col-xl-9">
					<div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
						<div class="row">

							<div class="infinite-scroll">
								@if(count($result['products'])>0)
								@foreach ($result['products'] as  $key=>$product)
								<div class="xv-product-unit ">
									<div class="xv-product mb-15 mt-15 paper-block">
										<figure>
											<a href="#"><img class="xv-superimage" src="{{asset('').'/'.$product->products_image}}" alt=""></a>
											<figcaption>
												<ul class="style1">
													<li><a data-qv-tab="#qvt-wishlist" class=" btn-square btn-blue" href="#"><i class="icon icon-heart"></i></a></li>
													<li><a data-qv-tab="#qvt-compare" class=" btn-square btn-blue" href="#"><i class="icon icon-exchange"></i></a></li>
													<li><a class="btn-cart btn-square btn-blue" href="#"><i class="icon icon-expand"></i></a></li>
												</ul>
											</figcaption>
										</figure>
										<div class="xv-product-content">
											<h3><a href="shop-single.html">{{ $product->products_name }} @if(!empty($product->products_model)) ( {{ $product->products_model }} ) @endif</a></h3>
											<p>Aenean sollicitudin, nec sagittis sem lorem quist bibe dum auctor, nisi elit consequat ipsum. Duis sed odio sit amet nibh vulputate cursus a nec.</p>
											<ul class="color-opt">
												<li><a href="#">{{ $product->categories_name }}</a></li>
											</ul>
											<ul class="extra-links">
												<li><a href="#"><i class="icon icon-heart"></i>Wishlist</a></li>
												<li><a href="#"><i class="icon icon-exchange"></i>Compare</a></li>
												<li><a href="#"><i class="icon icon-expand"></i>Expand</a></li>
											</ul>
											<!--ul-->
											<div class="xv-rating stars-5"></div>
											<span class="xv-price">{{ $result['currency'][0]->currency_symbol }}{{ $product->products_price }}</span>
											<a data-qv-tab="#qvt-cart" href="shop-single.html" class="product-buy "><i class="icon icon-shopping-basket" aria-hidden="true"></i></a>
										</div>
										<!--xv-product-content-->
									</div>
								</div>
								@endforeach
								@endif

								{{$result['products']->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection