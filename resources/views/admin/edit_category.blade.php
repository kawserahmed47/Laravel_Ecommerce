@extends('admin_dashboard')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('/edit_category')}}">Update Category</a></li>
			</ul>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
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
                                            <form class="form-horizontal" action="{{url('/updatecategory',$category_info->category_id)}}" method="post" >
                                                @csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" >Category Name</label>
							  <div class="controls">
                                                              <input type="text" name="category_name"  value="{{$category_info->category_name}}" required="">
							  </div>
							</div>

							        
							<div class="control-group hidden-phone">
							  <label class="control-label" >Category Description</label>
							  <div class="controls">
                                                              <textarea class="cleditor" name="category_description"  rows="3" required="" >
                                                                  {{$category_info->category_description}}
                                                              </textarea>
							  </div>
							</div>
                                                    
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@stop

