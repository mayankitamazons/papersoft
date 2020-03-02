  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Route Data</h4>
								<?= $this->Flash->render() ?>
								 <button type="button"  data-toggle="modal" data-target="#responsive-modal" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary">Create</button>
								 <br/>
								 <br/>
                               <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Create New Route</h4>
                                            </div>
											 <form method="post">
                                            <div class="modal-body">
                                               
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Route Name: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control route_name" autocomplete="off"  name="route_name">
														<small class="route_name_error" style="color:#fc4b6c;display:none;">Route Name is Required </small> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Route Code: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control route_code" autocomplete="off"  name="route_code">
														<small class="route_code_error" style="color:#fc4b6c;display:none;">Route Code is Required </small> 
                                                    </div>
													
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                              
												<input type="submit" class="btn btn-danger waves-light route_form" value="Create"/>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>   
								  <div id="editrouteModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Edit  Route</h4>
                                            </div>
											 <?php  echo $this->Form->create('edit_route', [
													'url' => ['controller' => 'Setting', 'action' => 'editroute']
												]); ?>
                                            <div class="modal-body">
                                                     <input type="hidden" id="edit_route_id" name="edit_route_id"/>
	
                                                    <div class="form-group">
                                                        <label for="recipient-name"  autocomplete="off"class="control-label">Route Name: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control edit_route_name"  name="route_name">
														<small class="edit_route_name_error" style="color:#fc4b6c;display:none;">Route Name is Required </small> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" autocomplete="off" class="control-label">Route Code: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control edit_route_code"  name="route_code">
														<small class="edit_route_code_error" style="color:#fc4b6c;display:none;">Route Code is Required </small> 
                                                    </div>
													
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                              
												<input type="submit" class="btn btn-danger waves-light edit_route_form" value="Edit"/>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                <div class="table-responsive">
								<?php if(count($routedata)>0){ ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Route Name</th>
                                                <th>Route Code</th>
                                               
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($routedata as $route){  $route_code=$route['id'];?>
										<tr>
                                                <td><?php echo $route['route_name'];?></td>
                                                <td><?php echo $route['route_code'];?></td>
                                               
                                               
                                               
                                                <td class="text-nowrap">
                                                    <a class="route_edit" route_id="<?php echo $route_code; ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'deleteroute',$route_code]);?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                   
                                                </td>
                                         </tr>
										<?php } ?>
                                           
                                          
                                        </tbody>
                                    </table>
								<?php } else { ?>
									<p>No Route Found</p>
								<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->