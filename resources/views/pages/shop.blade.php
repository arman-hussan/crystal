@extends('index')
@section('content')
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Shop PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							<li><a href="#">Music</a></li>
							<li><a href="#">Song</a></li>
							<li><a href="#">Instrumental</a></li>
							<li><a href="#">Bangla</a></li>
							<li><a href="#">Indian</a></li>
							<li><a href="#">Traditional</a></li>
						</ul>
					</div>
		
		

				
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
							@foreach($all_product as $product)
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
										<a href="{{URL::to('/view_product/'.$product->product_id)}}">	<img src="{{URL::to($product->product_image)}}" alt=""></a>
									<div class="pi-links">
										<a href="{{URL::to('/view_product/'.$product->product_id)}}" class="add-card"><i class="flaticon-bag"></i><span>VIEW ITEM</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>£{{$product->product_price}}+vat</h6>

									<p>{{$product->product_name}}</p>
								</div>
							</div>
						</div>
						@endforeach
				

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection

