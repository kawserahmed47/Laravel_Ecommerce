@extends('admin_dashboard')
@section('admin_content')

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('/')}}">View Order</a></li>
			</ul>


			<div class="row-fluid sortable">		
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Customer Information</h2>
						
					</div>
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
                                                                     
								  <th>Customer Name</th>
								  <th>Mobile</th>
							
							  </tr>
						  </thead> 
                                                  
						  <tbody>
                                                    <tr>
                                                        @foreach( $order_by_id as $v_order )
                                                                       @endforeach
								<td>{{$v_order->customer_name}}</td>
								<td>{{$v_order->customer_mobile}}</td>
								
							</tr>
						
						  </tbody>
                                             
					  </table>            
					</div>
				</div><!--/span-->
                                    
                                    
                                    
                                    <div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Information</h2>
						
					</div>
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
								  
								  <th> Name</th>
                                                                          <th>Mobile</th>
                                                                          <th>Address</th>
                                                                          <th>City</th>
							
							  </tr>
						  </thead> 
                                                  
						  <tbody>
                                                    <tr>
                                                        @foreach( $order_by_id as $v_order )
                                                                       @endforeach
								<td>{{$v_order->shipping_name}}</td>
								<td>{{$v_order->shipping_phone}}</td>
                                                                        <td>{{$v_order->shipping_address}}</td>
								<td>{{$v_order->shipping_city}}</td>
								
							</tr>
						
						  </tbody>
                                             
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
                           	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order Information</h2>
						
					</div>
					<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Product Name</th>
                                                                            <th>Product Price</th>
                                                                              <th>Quantity</th>
                                                                               <th>Total</th>
							
							  </tr>
						  </thead> 
                                                  
						  <tbody>
                                                          @foreach( $order_by_id as $v_order )
                                                          
                                                    <tr>
								<td>{{$v_order->order_id}}</td>
								<td>{{$v_order->product_name}}</td>
                                                                        <td>{{$v_order->product_price}}Tk</td>
								<td>{{$v_order->product_sales_quantity}}</td>
                                                                        <td>{{$v_order->product_sales_quantity*$v_order->product_price}}</td>
								
							</tr>
                                                                @endforeach
                                                            
                                                                 <tr>
								<td>Total</td>
								<td></td>
                                                                        <td></td>
								<td></td>
                                                                        <td>={{$v_order->order_total}}Tk</td>
								
							</tr>
						
						  </tbody>
                                             
					  </table>            
					</div>
				</div><!--/span-->
                                    
                                    </div><!--/Row-->


@stop