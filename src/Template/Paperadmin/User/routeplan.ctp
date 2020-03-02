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
                                                <th>Route/Additional Group</th>
                                              
                                                
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php $totalcount=count($data);
										     $i=1; foreach($data as $user){
													$user_id=$user['user']['id'];?>
                                            <tr>
                                                <td> <input seq_no="<?php echo $i; ?>" style="position:static;opacity:1;" id="user_seq_no"   name="select_route_user" type="radio"  value="<?php echo $user['user']['id']; ?>" <?php if($selected_route_user_id==$user_id){echo "checked";} else { if($totalcount==$i){ echo "checked";}}?>  class="custom-control-input user_seq"></td>
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
                           