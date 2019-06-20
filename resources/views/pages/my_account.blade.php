@extends('index')
@section('content')
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>My Account PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">MY ACCOUNT</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">								

						<div class="navv">
							
									<nav class="main-navbar">
										<ul class="main-menu">								
										
										<li><a href="{{URL::to('/my-account')}}">Dashboard</a></li>
										<li><a href="#">Orders</a></li>
										@foreach($all_order_info as $order)
										 <?php
								 				if (Session::get('customer_id',$order->customer_id)) {?>
								 					
										@if($order->customer_id == Session::get('customer_id') && $order->product_name == 'Entertainment Extra' )
										<li><a href="{{url('/entertainment_extra')}}">Downloads</a></li>
										@elseif($order->customer_id == Session::get('customer_id') &&  $order->product_name == 'Entertainment')
										<li><a href="{{url('/entertainment')}}">Downloads</a></li>
										@elseif($order->customer_id == Session::get('customer_id') &&  $order->product_name == 'Total Bundle')
										<li><a href="{{url('/total')}}">Downloads</a></li>
									
										@endif
										

											 	<?php } 
											 ?>
										
										@endforeach
										<li><a href="#">Address</a></li>
										<li><a href="{{URL::to('/customer_logout')}}">Logout</a></li>
									</ul>	
								
									</nav>
								</div>
							</div>

							<div class="col-md-9">
								<div class="woocommerce-MyAccount-content">
								<?php $customer_name=Session::get('customer_name');
								?>
										<p>Hello <strong>{{$customer_name}}</strong> (not <strong>{{$customer_name}}</strong>? <a href="{{URL::to('/customer_logout')}}">Log out</a>)</p>

										<p>From your account dashboard you can view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your password and account details</a>.</p>

								</div>								
							</div>


		

	
			
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection

