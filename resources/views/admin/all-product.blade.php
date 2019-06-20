@extends('admin_layout')
@section('admin_content')

			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Product Short Description</th>
								  <th>Product Long Description</th>
								  <th>Price</th>
								  <th>Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

							@foreach($all_product as $product)
						  <tbody>
							<tr>
								
								<td>{{$product->product_id}}</td>
								<td class="center">{{$product->product_name}}    </td>
								<td class="center">{{$product->product_short_description}}    </td>
								<td class="center">{{$product->product_long_description}}    </td>
								<td class="center">{{$product->product_price}}    </td>
								<td class="center">	<img src="{{URL::to($product->product_image)}}" alt="" style="height: 80px; width: 80px;">
    </td>

								
								<td class="center">
									@if($product->publication_status==1)
									<span class="label label-success">Active</span>
									@else <span class="label label-warning">Inactive</span>
								@endif
								</td>
								
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
		
						  </tbody>
							@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection