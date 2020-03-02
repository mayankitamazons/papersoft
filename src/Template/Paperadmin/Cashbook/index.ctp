
<!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    <form method="post" style="width:100%;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Cash Book</h4>
                               
								<div class="row">
								 <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Cash</label>
                                                    <input type="date" name="entry_date" id="entry_date" class="form-control" placeholder="dd/mm/yyyy">
                                                  <small class="entry_date_error" style="color:#fc4b6c;display:none;">Entry Date is Required </small>  </div>
                                            
												</div>
                                            </div>
														
                                <div class="table-responsive m-t-40">
									<?= $this->Flash->render() ?>
							 <small class="total_error" style="color:#fc4b6c;display:none;">Enter At least one user data </small>  </div>
                                            
                                    <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Search Field</th>
                                               <th>Amount</th>
                                                <th>Hoker Name</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody class="table_data">
                                            <tr id="table_1">
                                                <td>
												<input type="text" field_id='1' id="search-box-1"  autocomplete="off" name="search_user[]" class="search-box form-control form-control-danger" placeholder="Search user Name/ User code">
                                                <div id="suggesstion-box-1"></div>
												</td>
                                                <td><input type="number" id="rate_1"  maxlength="5" name="amount[]" class="form-control form-control-danger rate" placeholder="Enter Amount">
                                                    </td>
												<td>
												<select class="form-control form-control-danger" name="hoker_ids[]">
												<option value='-1'>Select Hoker Name</option>
												  <?php if(count($hokerdata)>0){ foreach($hokerdata as $user){ ?>
												  <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
												  <?php }} ?>
												</select>
                                                    </td>
                                                  <td class="text-nowrap">
                                                    <a  add_id="1" id="add_field_1" class="add_field" data-toggle="tooltip" data-original-title="Add"> <i class="fa fa-plus text-inverse m-r-10"></i> </a>
                                                   
                                                </td>
												
                                             
                                            </tr>
											
											
                                                                  
                                            </tbody>
										<tfoot>
                                            <tr>
                                                <th>Total <input type="hidden" readonly placeholder="Total Amount" name="totalamount" id="totalamount" value=""></th>
                                                <th id="totalamountstr">
												</th>
												<th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
									
									</div>
								</div>
								
		                        <input type="submit" style="float:right" class="btn btn-success save_cash" value="Save"/> 
                                </div>
							
                        </div>
                       
                    </div>
						</form>
						
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
				
	<script>
	var exdays=1;
	 var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
	
	var cvalue='';
	<?php  $h=0; foreach($hokerdata as $hoker)
	{  ?>
	//var cvalue +="<option value=<?php echo $hoker['id'] ?>><?php echo $hoker['name']; ?></option>";
	 cvalue += "<option value=<?php echo $hoker['id'] ?>><?php echo $hoker['name']; ?></option>";
<?php 	}
	?>
	
	var cname="hokerlist";
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	</script>
