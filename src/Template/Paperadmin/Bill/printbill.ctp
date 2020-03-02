 <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    
                    <div class="col-12">
                        <div class="card">
						    <form method="post" action="showbill">
                            <div class="card-body">
                                <h4 class="card-title">Print Bill Book</h4>
                              
								<div class="row">
								 <div class="col-md-3">
								
                                                <div class="form-group">
												<?php  $current_month=date('n'); ?>
												 <label class="control-label"> Select Month</label>
                                                   <select name="selected_month" class="form-control custom-select">
                                                        <option value="-1">Select Month</option>
                                                        <option value="1" <?php if($current_month==1){ echo "selected";} ?>>Jan</option>
                                                        <option value="2"<?php if($current_month==2){ echo "selected";} ?>>Feb</option>
                                                        <option value="3" <?php if($current_month==3){ echo "selected";} ?>>March</option>
                                                        <option value="4" <?php if($current_month==4){ echo "selected";} ?>>April</option>
                                                        <option value="5" <?php if($current_month==5){ echo "selected";} ?>>May</option>
                                                        <option value="6" <?php if($current_month==6){ echo "selected";} ?>>June</option>
                                                        <option value="7" <?php if($current_month==7){ echo "selected";} ?>>July</option>
                                                        <option value="8" <?php if($current_month==8){ echo "selected";} ?>>Aug</option>
                                                        <option value="9" <?php if($current_month==9){ echo "selected";} ?>>Sept</option>
                                                        <option value="10" <?php if($current_month==10){ echo "selected";} ?>>Oct</option>
                                                        <option value="11" <?php if($current_month==11){ echo "selected";} ?>>Nov</option>
                                                        <option value="12" <?php if($current_month==12){ echo "selected";} ?>>Dec</option>
                                                    </select>
                                                </div>
                                            </div>
								
												<div class="col-md-6">
                                                   <div class="form-group has-success">
                                                    <label class="control-label">Select Route</label>
                                                    <select name="route_type" class="form-control custom-select">
                                                        <option value="all">All</option>
                                                      <?php foreach($routedata as $route){   ?>
                                            <option value="<?php echo $route['id']; ?>"> <?php echo $route['route_name']; ?></option> 
										<?php } ?>
                                                    </select>
                                                    </div>
													
												</div> 
												<div class="col-md-3">
													<div class="form-group has-success">
                                                    <label class="control-label">Select Bill</label>
                                                    <select  name="bill_type" onChange="Billselect(this.value);" class="form-control custom-select">
                                                        <option value="single">Single</option>
                                                        <option value="all" selected>All</option>
                                                    </select>
                                                    </div>
												</div>
											</div>
											<div id="user_search_div" class="col-md-6" style="display:none;">
                                            <div class="form-group has-success">
                                                    <label class="control-label">Enter User name/Code</label>
                                                    <input type="text" id="lastName" class="form-control form-control-danger" placeholder="Search user Name/ User code/ Bill no...">
                                            </div>
									</div>
											<div class="row" style="float:right" >
										<input type="submit" style="float:right" value="Create" class="btn btn-success print_bill"/> 
                                
								</div>
								<div>
								
		                        </div>
							</form>
                                </div>
							
                        </div>
                       
                    </div>
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
		<script>
function Billselect(val) {
	if(val=="single")
	{
	  $('#user_search_div').show();
	}
	else
	{
	  $('#user_search_div').hide();	
	}
}
</script>