     <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
						 <form method="post">
						 
                            <div class="card-body">
                                <h4 class="card-title">Create New User</h4>
							<!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Basic Info</h4>
                            </div>
                            <div class="card-body">
                               
                                    <div class="form-body">
                                       
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Name <span style="color:red;">* </span></label>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter  name">
                                                  <small class="user_name_error" style="color:#fc4b6c;display:none;">User Name is Required </small>  </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
										 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="email" name="email" class="form-control email" placeholder= "example@gmail.com">
                                                 
													</div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile</label>
                                                    <input type="text" id="mobile" name="mobile" class="form-control mobile" placeholder="Enter mobile Number">
                                                    </div>
                                            </div>
                                            
                                            <!--/span-->
                                           
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
												
                                                    <label class="control-label">Route <span style="color:red;">* </span></label>
													<small class="route_id_error" style="color:#fc4b6c;display:none;">Route Name is Required  </small> 
                                                    <select onChange="Areadata(this.value);" class="form-control custom-select" id="route_id" name="route_id" data-placeholder="Choose a Route" tabindex="1">
                                                        <option value="-1">Select Route</option>
                                                        <?php foreach($routedata as $route){   ?>
                                            <option value="<?php echo $route['id']; ?>"> <?php echo $route['route_name']; ?></option> 
										<?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Joining Date</label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control form-control" id="joining_date" name="joining_date" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                            </div>   
											<div class="col-md-12 route_area" style="display:none;" >
											Select Area<span style="color:red;">* </span>
											<small class="area_id_error" style="color:#fc4b6c;display:none;">Select Area to Add User </small> 
											   <select class="select2" id="select_area" name="select_area" style="width: 100%">
											   
                                    
                                    
                                </select>
											</div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Additional info </h3>
                                        <hr>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pan No</label>
                                                    <input type="text" id="pan_no" name="pan_no" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Aadhar No</label>
                                                    <input type="text" id="aadhar_no" name="aadhar_no" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Extra Phone No</label>
                                                    <input type="text" id="extra_phoneno" name="extra_phoneno"class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
										<div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                   <textarea class="form-control" id="address" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
				<div class="row">
                    <div class="col-lg-6">
					   <div class="card">
                            <div class="card-body">
							<h2>Paper Detail</h2>
							<?php if(count($productdata)>0){ ?>
							   <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Paper Name</th>
                                                <th>Copy</th>
                                                
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
										   <?php foreach($productdata as $product){ ?>
										    <tr>
                                                <td><?php echo $product['product_name'];?>
												<input type="hidden" id="product_<?php echo $product['id'];?>" name="product_copy[]"/>
												</td>
                                                <td> &nbsp;  <input product_id="<?php echo $product['id']; ?>" id="tch3_<?php echo $product['id'];?>" type="text"  class="product_couter" value="0" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"></td>
                                               
                                               
                                            </tr>
										   <?php } ?>
										</tbody>
								</table>
							<?php  } else { echo "No Paper Found";}?>
							</div>
						</div>
					</div>
					 <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                               
                                 <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Opening Balance</label>
                                                    <input type="text" class="form-control" id="opening_balance" name="opening_balance">
													<input type="hidden" id="selected_route_user_id"/>
													<input type="hidden" id="selected_print_user_id"/>
                                                </div>
                                            </div>
                                        </div>
								  <div class="row">
                                           <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="balance_type" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Advance</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" name="balance_type" type="radio" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">OutStanding</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
								 <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                 
                                                 <button type="button"    class="btn waves-effect waves-light btn-primary route_plan">Route Plan</button>
												</div>
                                            </div>
											 <div class="col-md-4">
                                                <div class="form-group">
												<button type="button"    class="btn waves-effect waves-light btn-primary print_plan">Print Plan</button>
                                                  
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group">
                                                 
                                                 <button type="button"  data-toggle="modal" data-target="#working-modal"  class="btn waves-effect waves-light btn-primary">Working Days</button>
												</div>
                                            </div>
											
                                   </div>
								 <div class="form-actions" style="float:right;">
                                        <input type="submit" class="btn btn-danger waves-light user_form" value="Save"/>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- Row -->
				</div>
						</div>
						</form>
						
                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
	<!-- sample modal content -->
	 <div id="working-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
										
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Enter Working Days</h4>
                                            </div>
											
                                            <div class="modal-body">
                                               <form class="form-material m-t-40 row">
										
                                           <div class="col-md-12">
                                                <div class="form-group">
												<p>Select Working Days</p>
                                                      <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="working_type" name="working_type" value="fix" type="radio" class="custom-control-input working_type">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Enter Working Days</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="working_type" name="working_type" value="select" type="radio" class="custom-control-input working_type">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Select Working Days</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                
                                    <div class="form-group col-md-6" id="fix_working_days" style="display:none;">
                                        <input type="text" name="name" class="form-control form-control-line" placeholder="Enter Working Days"> 
									</div>
                                    
									  
									<div class="form-group col-md-12 m-t-20 demo-checkbox"  id="select_working_days" style="display:none;">
									<h4>Select Working Days</h4>
									<?php  $i=21;foreach($Weekdaysdata as $a){   ?>
									
                                        
									<input type="checkbox" id="md_checkbox_<?php echo $i;?>" value="<?php echo $a['id']; ?>"  class="filled-in chk-col-red"  checked name="selected_working_days[]" />
                                    <label for="md_checkbox_<?php echo $i;?>"><?php echo $a['dayname']; ?></label>
									<?php $i++;} ?>
                                   
									</div>
									</form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
										
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" style="max-width:1200px !important;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Define User Route</h4>
                                            </div>
											
                                            <div class="modal-body route_plan_body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light save_route_form">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
	<!-- sample modal content -->
                                <div id="responsive-print-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" style="max-width:1200px !important;">
                                        <div class="modal-content print_plan_body">
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
	
<script>
function Areadata(val) {
	var base_url = window.location.origin+"/paper/paperadmin";
	// alert(val);
	if(val!=-1)
	{
		$.ajax({
		type: "POST",
		url: base_url+"/user/routewiseareauser",
		data:'route_id='+val,
		// return false;
		success: function(data){
			$('.route_area').show();
			$("#select_area").html(data);  
			
		}
		});
	}
}
function RouteArea(val) {
	var base_url = window.location.origin+"/paper/paperadmin";
	alert(val);
	if(val!=-1)
	{
		 // r_data = {};
		$.ajax({
		type: "POST",
		url: base_url+"/user/printplan",
		data:'route_id='+val,
		// return false;
		success: function(data){
			$('#print_plan_route').val(val);
			$(".print_plan_body").html(data);
			
		}
		});
	}
}
function PrintArea(val) {
	var base_url = window.location.origin+"/paper/paperadmin";
	
	if(val!=-1)
	{
		 r_data = {};
		var e = document.getElementById("print_plan_route");
		var print_plan_route_id = e.options[e.selectedIndex].value;
		 // r_data = {};
		 if(print_plan_route_id==-1)
		 {
		 }
		 else
		 {
			 r_data['route_id']=print_plan_route_id;
		 }
		 r_data['area_id']=val;
		$.ajax({
		type: "POST",
		url: base_url+"/user/printplan",
		data:r_data,
		// return false;
		success: function(data){
			$('#print_plan_route').val(val);
			$(".print_plan_body").html(data);
			
		}
		});
	}
}
</script>