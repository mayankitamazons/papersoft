  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bill Book</h4>
                               <form method="post">
								<div class="row">
								 <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Select Date</label>
                                                    <input type="date" value="<?php if($select_date){ echo $select_date;} ?>" required name="select_date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
								<?php if(count($hokerdata)>0){ ?>
								<div class="col-md-3">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Select Hoker</label>
                                                    <select name="hoker_ids" class="form-control custom-select">
													  <option  <?php if($select_hoker_id==$hoker['id']){echo "selected";} ?> value='all'>All</option>
                                                       <?php foreach($hokerdata as $hoker){ ?>
                                                        <option  <?php if($select_hoker_id==$hoker['id']){echo "selected";} ?> value="<?php echo $hoker['id'];?>"><?php echo $hoker['name']; ?></option>
													   <?php } ?>
                                                    </select>
                                                    </div>
													</div>
								<?php } ?>
						    	
											</div>
											<div class="row" style="float:right" >
											
										<input type="submit" style="float:right" class="btn btn-success" value="Search"/>
                                </div>
								</form>
								<div>
								<div class="row">
								<?php if(count($searchdata)>0){ ?>
								<p>Select Cash Memo for <?php echo $select_date; ?></p>
								<div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>User name/ Code</th>
												
												<th>Hoker Name</th>
                                               <th>Amount</th>
                                               <th>Time</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										  <?php foreach($searchdata as $search){ ?>
                                            <tr>
                                                <td><?php echo $search['user_name']." / ".$search['user_code']; ?></td>
												
												  <td><?php echo $search['users']['name']; ?></td>
												  <td><?php echo $search['cash_amount']; ?></td>
												  <td><?php  $time=$search['entry_utc'];
											
echo $dateInLocal = date("Y-m-d H:i:s", $time);?></td>
												
                                                  <td class="text-nowrap">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                             
                                            </tr>
										  <?php } ?>
                                                                  
                                            </tbody>
											
                                    </table>
									
									</div>
								<?php } else { echo "No Record on Selected Range";} ?>
								</div>
		                        </div>
                                </div>
							
                        </div>
                       
                    </div>
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->