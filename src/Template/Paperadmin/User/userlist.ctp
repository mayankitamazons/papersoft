<!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User List</h4>
                               
								<?= $this->Flash->render() ?>
								<a  href="<?php echo $this->Url->build(['controller'=>'user','action'=>'createuser']);?>" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary">Create</a>
								
								
                                <div class="table-responsive m-t-40">
								<?php if(count($userdata)>0){?>
								
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>User code</th>
                                                <th>Mobile</th>
                                                <th>Balance</th>
                                                <th>Route</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php foreach($userdata as $user){  $user_code=$user['user_code'];?>
                                            <tr>
                                                <td><?php echo $user['name']; ?></td>
                                                <td><?php echo $user['user_code']; ?></td>
                                                <td><?php echo $user['mobile']; ?></td>
                                                <td><?php echo $user['balance']; ?></td>
                                                <td><?php echo $user['route']['route_name']; ?></td>
                                                
                                                  <td class="text-nowrap">
                                                    
                                                  
                                                   <a href="<?php echo $this->Url->build(['controller'=>'user','action'=>'edituser',$user_code]);?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                   <a href="<?php echo $this->Url->build(['controller'=>'user','action'=>'viewuser',$user_code]);?>" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-user text-inverse m-r-10"></i> </a>
                                                   
                                                   <a href="<?php echo $this->Url->build(['controller'=>'user','action'=>'deleteuser',$user_code]);?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
											   </td>
                                             
                                            </tr>
										<?php } ?>
                                           
                                            
                                           
                                        </tbody>
                                    </table>
								<?php } else { echo "No User Found";}  ?>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->