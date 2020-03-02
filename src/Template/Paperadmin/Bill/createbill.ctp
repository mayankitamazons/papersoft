  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    
                    <div class="col-12">
                        <div class="card">
						<form method="post">
                            <div class="card-body">
                                <h4 class="card-title">Create Active User Bill</h4>
                                
								<?= $this->Flash->render() ?>
								
								<div class="row">
								 <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Select Date</label>
                                                    <input type="date" name="bill_created_date" id="bill_created_date" class="form-control" placeholder="dd/mm/yyyy">
                                                     <small id="bill_created_date_error" style="color:#fc4b6c;display:none;">Bill date is Required </small>  
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
                                                   
													 <input type="text" field_id='1' autocomplete="off"  id="search-box-1"   placeholder="Search user Name/ User code/ Bill no..."  class="search-box form-control" name="user_detail">
									   
									   <div  style="display:none;" id="translControl"></div>
										<div id="suggesstion-box-1"></div>
                                            </div>
									</div>
										<div class="row" style="float:right" >
										
										<input type="submit" style="float:right" value="Create" class="btn btn-success create_bill"/> 
                                </div>
									<div> <small id="bill_creating" style="display:none;">Bills are creating wait for few min to page reload </small>  </div>	
                                </div>
								</form>
							
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