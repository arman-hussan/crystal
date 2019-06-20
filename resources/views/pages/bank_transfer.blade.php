
@extends('index')
@section('content')
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 order-2 order-lg-1">
					
						
						
					<h3>Thank you. Your order has been received.</h3>
					<br/>
					<table class="new">
					    
	    				    <thead>
							  <tr>
								  <th>ORDER NUMBER:</th>
								  <th>PAYMENT METHOD:</th>
								  <th>DATE:</th>
							
							  </tr>
						  </thead>  
					    
					       <tbody>
					           <tr>
					               <td><?php   $d = Session::get('order_id');
		                    	      echo $d;
		                    	        
					            ?></td>
					        <td>Direct bank transfer</td>
					        <td><?php echo date("d/m/Y"); ?></td>
					           </tr>
					       </tbody>
					    
					 
					</table>
					<br/> <br/>
				
					
					<h3>Our bank details</h3> <br/> 
					<h4>Westow Limited:</h4>
					        <table class="new">
							    <thead>
    							  <tr>
    								  <th>BANK:</th>
    								  <th>ACCOUNT NUMBER:</th>
    								  <th>SORT CODE:</th>
    								 
    							  </tr>
						  </thead> 
						  
					  	       <tbody>
					           <tr>
					                <td>LLOYDS</td>
        					        <td>16949268</td>
        					        <td>306538</td>
					           </tr>
					       </tbody>
					   </table>
				
					
					
					
						
							
					
					</div><!--/login form-->
				</div>

				
			</div>
	
	</section><!--/form-->

	@endsection