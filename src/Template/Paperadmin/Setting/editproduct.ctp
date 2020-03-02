   <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit product</h4>
								<form class="form-material m-t-40 row" method="post">
                                    <div class="form-group col-md-6 m-t-20 ">
                                        <input type="text" value="<?php echo $productdata['product_name']; ?>" name="product_name" id="edit_product_name" class="form-control form-control-line " placeholder="Product Name"> 
											<small class="prdouct_name_error" style="color:#fc4b6c;display:none;">Product Name is Required </small> 
									</div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" id="product_code" value="<?php echo $productdata['product_code']; ?>"   name="product_code" class="form-control" placeholder="Product Code">
									    <small class="prdouct_code_error" style="color:#fc4b6c;display:none;">Product Code is Required </small> 
										</div>
									<div class="form-group col-md-6 m-t-20">
                                       <input class="form-control" type="date" value="<?php echo $productdata['joining_date']; ?>"  placeholder="Joining Date" name="joining_date" id="example-date-input">
									</div>
									<div class="form-group col-md-6 m-t-20">
                                       
									</div>
									<div style="clear:both"></div>
									 <div class="form-group col-md-2 m-t-20">
                                        <label for="example-date-input" class="col-form-label">Price</label>
										 <small class="price_error" style="color:#fc4b6c;display:none;">Select Price Type</small> 
									</div>
									<div class="form-group col-md-2 m-t-20">
									<?php  $price_type=$productdata['price_type']; ?>
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type" <?php if($price_type=="daily"){ echo "checked";} ?>  id="price_type" type="radio" value="daily" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Daily</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type" <?php if($price_type=="monthly"){ echo "checked";} ?>   value="monthly"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Monthly</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  <?php if($price_type=="fix"){ echo "checked";} ?>    value="fix"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Fix</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  <?php if($price_type=="weekly"){ echo "checked";} ?>    value="fix"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Weekly</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  <?php if($price_type=="15"){ echo "checked";} ?>    value="15"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">15 days</span>
                                            </label>
										  
									</div>
									
									 <div id="fix_price" style="<?php if($price_type=="daily"){ echo "display:none;";}?>" class="form-group col-md-12 m-t-20">
									 
                                        <input type="text"  name="fix_price"  maxlength="5" value="<?php echo $productdata['fix_price']; ?>" class="form-control fix_price" placeholder="Fix Price of Product">
									</div>
									
									<div id="daily_price" style="<?php if($price_type!="daily"){ echo "display:none;";}?>" class="row col-md-12">
									
									   <div class="col-md-6">
									       <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Sun</label> 
										     <input type="text" name="sun" value="<?php echo $d['sun']; ?>"    class="form-control col-sm-6 sun">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Mon</label> 
										     <input type="text"  name="mon" value="<?php echo $d['mon']; ?>"   class="form-control col-sm-6 mon">
										 </div>
										  <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Tue</label> 
										     <input type="text"   name="tue"  value="<?php echo $d['tue']; ?>"  class="form-control col-sm-6 tue">
										 </div>
										 <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Wed</label> 
										     <input type="text"  name="wed" value="<?php echo $d['wed']; ?>"  class="form-control col-sm-6 wed">
										 </div>
									   </div>
									   <div class="col-md-6">
									      <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Thu</label> 
										     <input type="text"  name="thu" value="<?php echo $d['thu']; ?>"  class="form-control col-sm-6 thu">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Fri</label> 
										     <input type="text"   name="fri"  value="<?php echo $d['fri']; ?>"  class="form-control col-sm-6 fri">
										 </div>
										 	<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Sat</label> 
										     <input type="text"   name="sat" value="<?php echo $d['sat']; ?>"   class="form-control col-sm-6 sat">
										 </div>
									   </div>
									</div>
									
									 
									 <div class="form-group col-md-12" style="float:right;">
                                          
                                                
                                           <input style="float:right;" type="submit" class="btn btn-danger waves-light product_form" value="Edit"/>
                                        </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->