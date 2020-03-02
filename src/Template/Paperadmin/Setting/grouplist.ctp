<!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Additional Group Data</h4>
								<?= $this->Flash->render() ?>
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
								 <button type="button"  data-toggle="modal" data-target="#responsive-modal" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary">Create</button>
								 <br/>
								 <br/>
                               <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Create New Additional Group </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">  Group Name: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control area_name"  name="area_name">
														<small class="area_name_error" style="color:#fc4b6c;display:none;">Group Name is Required </small> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Group Code: <span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control area_code"  name="area_code">
														<small class="area_code_error" style="color:#fc4b6c;display:none;">Group Code is Required </small> 
                                                    </div>
													<div class="form-group">
                                      
										
                                      <div class="form-group">
                                                        <label for="message-text" class="control-label">Delivery Charges: <span style="color:red;">* </span></label>
                                                        <input type="text" value=0  onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')" maxlength="5" class="form-control delivery_charges" name="delivery_charge">
                                                    </div>
                                    </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger waves-light area_form" value="Create"/>
                                            </div>
											 </form>
                                        </div>
                                    </div>
                                </div>
								<div id="editareaModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Edit Group</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php  echo $this->Form->create('edit_route', [
													'url' => ['controller' => 'Setting', 'action' => 'editgroup']
												]); ?>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Group Name:<span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control edit_area_name"  name="area_name">
														<small class="edit_area_name_error" style="color:#fc4b6c;display:none;">Group Name is Required </small> 
                                                        <input type="hidden" class="form-control"  id="edit_area_id"  name="edit_area_id">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Group Code:<span style="color:red;">* </span></label>
                                                        <input type="text" class="form-control edit_area_code"  name="area_code">
                                                    </div>
													<div class="form-group">
                                                        <label for="message-text" class="control-label">Delivery Charges:</label>
                                                        <input type="text" onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')" maxlength="5" class="form-control edit_delivery_charge"  name="delivery_charge">
                                                    </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger waves-light edit_area_form" value="Edit"/>
                                            </div>
											 </form>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="table-responsive m-t-40">
								<?php if(count($areadata)>0){ ?>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Group Name</th>
                                                <th>Group code</th>
                                                <th>Charges</th>
                                              
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php foreach($areadata as $area){  $area_id=$area['id'];?>
                                            <tr>
                                                <td><?php echo $area['area_name'];?></td>
                                                <td><?php echo $area['area_code'];?></td>
                                                <td><?php echo $area['delivery_charge'];?></td>
                                              
                                                
                                                <td class="text-nowrap">
                                                     <a class="area_edit" area_id="<?php echo $area_id; ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'deletearea',$area_id]);?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                   
                                                </td>
                                             
                                            </tr>
                                           
                                            <?php } ?>
                                           
                                        </tbody>
                                    </table>
								<?php } else{ echo "No Group Found";} ?>
                                </div>
                            </div>
                        </div>
                       
                    </div>
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->