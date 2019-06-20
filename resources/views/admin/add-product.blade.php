@extends('admin_layout')
@section('admin_content')

			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/dashboard')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						</div>
						<br/>
						<p class="alert-success">
							<?php 
							$message=Session::get('message');
							if ($message) {
								echo $message;
								Session::put('message',null);
							}
							?>
						</p>

						
					
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-product')}}"method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_name">
							  </div>
							</div>
							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Catagory</label>
								<div class="controls">
								  <select id="selectError3" name="Catagory_id">
								  	<option>Select Catagory</option>
								  	<?php
								  		$all_catagory=DB::table('catagories')
								  		->where('Publication_status', 1)
								  		->get();
								  		foreach ($all_catagory as $catagory) { ?>

									<option value="{{$catagory->Catagory_id}}">{{$catagory->Catagory_name}}</option>
								<?php } ?>
								  </select>
								</div>
							  </div>

						        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Descripion</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>
						        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Descripion</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_price">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" type="file">
							  </div>
							</div>  

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection