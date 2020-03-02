   <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add product</h4>
								<form class="form-material m-t-40 row" method="post">
                                    <div class="form-group col-md-6 m-t-20 ">
                                        <input type="text" name="product_name"  autocomplete="off" id="product_name" class="form-control form-control-line " placeholder="Product Name"> 
											<small class="prdouct_name_error" style="color:#fc4b6c;display:none;">Product Name is Required </small> 
									</div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" id="product_code"   autocomplete="off"  name="product_code" class="form-control" placeholder="Product Code">
									    <small class="prdouct_code_error" style="color:#fc4b6c;display:none;">Product Code is Required </small> 
										</div>
									<div class="form-group col-md-6 m-t-20">
                                       <input class="form-control" type="date" placeholder="Joining Date" name="joining_date" id="example-date-input">
									</div>
									<div class="form-group col-md-6 m-t-20">
                                       
									</div>
									<div style="clear:both"></div>
									 <div class="form-group col-md-2 m-t-20">
                                        <label for="example-date-input" class="col-form-label">Price</label>
										 <small class="price_error" style="color:#fc4b6c;display:none;">Select Price Type</small> 
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type" checked  id="price_type" type="radio" value="daily" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Daily</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  value="monthly"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Monthly</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  value="fix"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Fix</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  value="weekly"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Weekly</span>
                                            </label>
										  
									</div>
									<div class="form-group col-md-2 m-t-20">
									  <label class="custom-control custom-radio">
                                                <input id="radio1" name="price_type"  value="15"  type="radio" class="custom-control-input price_type">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">15 days</span>
                                            </label>
										  
									</div>
									 <div id="fix_price" style="display:none;" class="form-group col-md-12 m-t-20">
									 
                                        <input type="number"  name="fix_price"  maxlength="5"  class="form-control fix_price" placeholder="Fix Price of Product">
									</div>
									
									<div id="daily_price"  class="row col-md-12">
									
									   <div class="col-md-6">
									       <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Sun</label> 
										     <input type="text" name="sun"  autocomplete="off"   class="form-control col-sm-6 sun">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Mon</label> 
										     <input type="text"  autocomplete="off" name="mon"   class="form-control col-sm-6 mon">
										 </div>
										  <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Tue</label> 
										     <input type="text"    autocomplete="off"  name="tue"  class="form-control col-sm-6 tue">
										 </div>
										 <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Wed</label> 
										     <input type="text"   autocomplete="off" name="wed"   class="form-control col-sm-6 wed">
										 </div>
									   </div>
									   <div class="col-md-6">
									      <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Thu</label> 
										     <input type="text"    autocomplete="off" name="thu"   class="form-control col-sm-6 thu">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Fri</label> 
										     <input type="text"  autocomplete="off"   name="fri"  class="form-control col-sm-6 fri">
										 </div>
										 	<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Sat</label> 
										     <input type="text"  autocomplete="off"   name="sat"  class="form-control col-sm-6 sat">
										 </div>
									   </div>
									</div>
									<div id="monthly_price" style="display:none;" class="row col-md-12">
									
									    <div class="col-md-6">
									      <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Jan</label> 
										     <input type="text"   name="jan" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  class="form-control col-sm-6 jan">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Feb</label> 
										     <input type="text"  name="feb"  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  class="form-control col-sm-6 feb">
										 </div>
										 	<div class="col-sm-4">
										   <label for="inputEmail3" class="text-right control-label col-form-label">March</label> 
										     <input type="text"  name="march"  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="sat" class="form-control col-sm-6 march">
										 </div>
										  <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">April</label> 
										     <input type="text"   name="april"  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  class="form-control col-sm-6 april">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">May</label> 
										     <input type="text"   name="may" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  class="form-control col-sm-6 may">
										 </div>
										 	<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">June</label> 
										     <input type="text" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="june" class="form-control col-sm-6 june">
										 </div>
									   </div>
									   <div class="col-md-6">
									      <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">July</label> 
										     <input type="text" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="july" class="form-control col-sm-6 july">
										 </div>
										<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Aug</label> 
										     <input type="text" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="aug" class="form-control col-sm-6 aug">
										 </div>
										 	<div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Sept</label> 
										     <input type="text"  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  name="sept" class="form-control col-sm-6 sept">
										 </div>
										 <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Oct</label> 
										     <input type="text"   onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="oct" class="form-control col-sm-6 oct">
										 </div>
										 <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Nov</label> 
										     <input type="text" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"   name="nov" class="form-control col-sm-6 nov">
										 </div>
										 <div class="col-sm-3">
										   <label for="inputEmail3" class="text-right control-label col-form-label">Dec</label> 
										     <input type="text"  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')"  name="december" class="form-control col-sm-6 dec">
										 </div>
									   </div>
									   
									</div>
									 
									 <div class="form-group col-md-12" style="float:right;">
                                          
                                                
                                           <input style="float:right;" type="submit" class="btn btn-danger waves-light product_form" value="Create"/>
                                        </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->