 <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Route</label>
                                                    <select id="print_plan_route" onChange="RouteArea(this.value);" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
														<option value="-1">Select Route</option>
													   <?php  foreach($routedata as $route){?>    
														<option <?php if($route['id']==$route_id){ echo "selected";} ?>  value="<?php echo $route['id']; ?>"><?php echo $route['route_name']; ?></option>
														<?php } ?>
                                                    
                                                    </select>
                                                </div>
                                            </div>
											
											</div>
											 <div class="row" style="width:40%">
                                            <div class="col-md-12">
											<?php $areacount=count($areadata); ?>
                                                <div class="form-group" style="<?php if($areacount<=0){ echo "display:none"; }?>" >
                                                    <label class="control-label">Area</label>
                                                     <select onChange="PrintArea(this.value);" class="select2" style="width: 100%">
                                    <option value="-1">Select Area</option>
                                   <?php foreach($areadata as $area){ ?>
								   <option <?php if($area['id']==$area_id){ echo "selected";} ?> value="<?php echo $area['id']; ?>"><?php echo $area['area_name']; ?></option>
								   <?php } ?>
                                  
                                </select>
                                                </div>
                                            </div>
											
											</div>
											
                                                <h4 class="modal-title">Define User Print Route</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                    
                        <div class="col-12 table-responsive m-t-40">
									<?php if(count($data)>0){ ?>
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>User Name</th>
                                                <th>User code</th>
                                                <th>Mobile</th>
                                                <th>Route/Additional Group </th>
                                              
                                                
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                           <?php $totalcount=count($data);
										     $i=1; foreach($data as $user){ ?>
                                            <tr>
                                                <td> <input seq_no="<?php echo $i; ?>" style="position:static;opacity:1;" id="print_user_seq_no"   name="select_print_user" type="radio"  value="<?php echo $user['user']['id']; ?>" <?php if($totalcount==$i){ echo "checked";} ?>  class="custom-control-input user_seq"></td>
                                                <td><?php echo $i; ?></td>
												<td><?php echo $user['user']['name']; ?></td>
                                                <td><?php echo $user['user']['user_code']; ?></td>
                                                <td><?php echo $user['user']['mobile']; ?></td>
                                                <td><?php echo $user['user']['route']['route_name']." / ".$user['user']['area']['area_name']; ?></td>
                                               
                                                
                                             
                                            </tr>
										<?php  $i++;} ?>
                                           
                                            
                                           
                                        </tbody>
                                    </table>
									<?php } else { echo "No User Assiged Yet";} ?>
                                </div>
                       
                    
                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light save_print_form">Save changes</button>
												 
                                            </div>