@extends('index')
@section('content')

	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">			
		

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Music</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<br>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Download Remaining</th>
								  <th>Album  Name</th>
								  
							  </tr>
						  </thead>  

							@foreach($all_music as $music)
						  <tbody>
							<tr>
								
								<td>{{$music->id}}</td>
								<td class="text-center"> ∞ </td>

								<td class="center"><a href="{{$music->album_link}}">{{$music->album_name}} </a>   </td>


								
								
								
							
							</tr>
		
						  </tbody>
							@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

						</div>
		</div>
	</section>

@endsection