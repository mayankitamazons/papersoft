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
												<input type="text" id="delivery_charge" name="delivery_charge"/>
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
							  paper detail
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
												<button type="button"  data-toggle="modal" data-target="#responsive-print-model"  class="btn waves-effect waves-light btn-primary">Print Plan</button>
                                                  
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
                                                      <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="balance_type" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Enter WorkingDays</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" name="balance_type" type="radio" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Select Working Days</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                
                                    <div class="form-group col-md-6 ">
                                        <input type="text" name="name" class="form-control form-control-line" placeholder="Enter Working Days"> 
									</div>
                                    
									  
									<div class="form-group col-md-12 m-t-20 demo-checkbox">
									<h4>Select Working Days</h4>
									<?php foreach($Weekdaysdata as $w){   ?>
                                          <input value="<?php echo $w['id']; ?>" type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" checked />
                                    <label for="md_checkbox_21"><?php echo $w['dayname']; ?></label>
									<?php } ?>
                                   
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
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
	<!-- sample modal content -->
                                <div id="responsive-print-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" style="max-width:1200px !important;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Route</label>
                                                    <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
											
											</div>
											 <div class="row" style="width:40%">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Area</label>
                                                     <select class="select2" style="width: 100%">
                                    <option>Select Area</option>
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>
                                                </div>
                                            </div>
											
											</div>
                                                <h4 class="modal-title">Define User Print Route</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                    
                        <div class="col-12 table-responsive m-t-40">
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>User Name</th>
                                                <th>User code</th>
                                                <th>Mobile</th>
                                                <th>Route/Area</th>
                                              
                                                
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr>
                                                <td> <input style="position:static;opacity:1;" id="radio9" name="radio9" type="radio"  class="custom-control-input"></td>
                                                <td>USSS</td>
                                                <td>Edinburgh</td>
                                                <td>9001025477</td>
                                                <td>61</td>
                                                
                                             
                                            </tr>
                                           
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                       
                    
                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                            </div>
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
</script>