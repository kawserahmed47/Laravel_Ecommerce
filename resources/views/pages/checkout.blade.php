@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
                      <p class="alert-success">
                                                <?php
                                                $message=Session::get('message');
                                               
                                                if($message){
                                                    
                                                    echo $message;
                                                     Session::put('message',NULL);
                                                }
                                               
                                               
                                                   
                                              
                                                
                                                ?>
                                                
                                            </p>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-9 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
                                                                  <form action="{{URL::to('/save-shipping')}}" method="post">
                                                                     @csrf
                                                                     <input type="text" placeholder="Full Name" name="shipping_name">
				                                             <input type="email" placeholder="Valid Email" name="shipping_email">
                                                                                 <input type="text" placeholder="Mobile Number" name="shipping_phone">
                                                                                 <input type="text" placeholder="Full Address" name="shipping_address">
                                                                                 
                                                                                 <input type="text" placeholder="City" name="shipping_city">
                                                                                 
                                                                                 <input type="submit" value="Submit" class="btn btn-default">
                                                                                 
								</form>
							</div>
							
						</div>
					</div>
										
				</div>
			</div>
			
		</div>
	</section> <!--/#cart_items-->

@stop