@extends('admin_dashboard')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('/addproduct')}}">Add product</a></li>
			</ul>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <p class="alert-success">
                                                <?php
                                                $message=Session::get('message');
                                               
                                                if($message){
                                                    
                                                    echo $message;
                                                     Session::put('message',NULL);
                                                }
                                               
                                               
                                                   
                                              
                                                
                                                ?>
                                                
                                            </p>
                                            <form class="form-horizontal" action="{{url('/saveproduct')}}" method="post" enctype="multipart/form-data" >
                                                @csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" >Product Name</label>
							  <div class="controls">
                                                              <input type="text" name="product_name"  value="" required="">
							  </div>
							</div>
                                                      
                                                      
                                                      
                                                      
                                                       <div class="control-group">
								<label class="control-label" for="selectError3">Select Category</label>
								<div class="controls">
                                                                    <select id="selectError3" name="category_id">
                                                                       <option>Select</option>
                                                                       <?php 
                                                                            $allCategory=DB::table('tbl_category')
                                                                                        ->where('publication_status',1)
                                                                                        ->get();
                                                                                     foreach ($allCategory as $v_category){
                           
                                                                                ?>
                                                                       <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
									 <?php
                                                                                        }
                                                                                    ?>
								  </select>
								</div>
							  </div>
                                                      
                                                      
                                                      
                                                       <div class="control-group">
								<label class="control-label" for="selectError3">Select Band</label>
								<div class="controls">
                                                                    <select id="selectError3" name="manufacture_id">
                                                                      <option>Select</option>
                                                                                 <?php 
                           $allManufacture=DB::table('tbl_manufacture')
                                   ->where('publication_status',1)
                                   ->get();
                           foreach ($allManufacture as $v_manufacture){
                           
                        ?>
                                                                      <option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
                                                                        
                                                                         <?php
                             }
                              ?>
									
								  </select>
								</div>
							  </div>
                                                      
                                                      
                                                      
                                                      
                                                                                              
							        
							<div class="control-group hidden-phone">
							  <label class="control-label" >Product Short Description</label>
							  <div class="controls">
                                                              <textarea class="cleditor" name="product_short_desc" rows="3" required="" ></textarea>
							  </div>
							</div>
                                                      
                                                      
                                                      <div class="control-group hidden-phone">
							  <label class="control-label" >Product Long Description</label>
							  <div class="controls">
                                                              <textarea class="cleditor" name="product_long_desc" rows="3" required="" ></textarea>
							  </div>
							</div>
                                                      
                                                      
                                                      <div class="control-group">
							  <label class="control-label" >Product Price</label>
							  <div class="controls">
                                                              <input type="text" name="product_price"  value="" required="">
							  </div>
							</div>
                                                      
                                                      
                                                      <div class="control-group">
							  <label class="control-label" >Product Image</label>
							  <div class="controls">
                                                              <input type="file" name="product_image"  value="" required="">
							  </div>
							</div>
                                                      
                                                      <div class="control-group">
							  <label class="control-label" >Product Size</label>
							  <div class="controls">
                                                              <input type="text" name="product_size"  value="" required="">
							  </div>
							</div>
                                                      
                                                      <div class="control-group">
							  <label class="control-label" >Product Color</label>
							  <div class="controls">
                                                              <input type="text" name="product_color"  value="" required="">
							  </div>
							</div>
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      <div class="control-group hidden-phone">
							  <label class="control-label" >Publication Status</label>
                                                          <input type="checkbox" name="publication_status" value="1">
							  <div class="controls">
								
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@stop

