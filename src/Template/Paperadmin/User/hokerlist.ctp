  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                      
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Hoker List</h4>
								<?= $this->Flash->render() ?>
								 <button type="button"  data-toggle="modal" data-target="#responsive-modal" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary">Create New</button>
								 <br/>
								 <br/>
                              <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Create New Hoker</h4>
                                            </div>  
											
                                            <div class="modal-body">
                                               <form class="form-material m-t-40 row" method="post">
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="name" class="form-control form-control-line" id="hoker_name" placeholder="Hoker Name"> 
									    <small class="hoker_name_error" style="color:#fc4b6c;display:none;">Hoker Name is Required  </small> 
									</div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="email" id="hoker_email" name="email" class="form-control" placeholder="Email">
									</div>
									  <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="mobile" id="hoker_email" class="form-control form-control-line" placeholder="Mobile"> 
									</div>
                                    <!--div class="form-group col-md-6 m-t-20">
                                        <input type="text" id="hoker_password"  name="password" class="form-control" placeholder="Password">
									</div!-->
									<div class="form-group col-md-6 m-t-20">
                                       <input class="form-control" type="date"  name="join_date" placeholder="Joining Date" id="example-date-input">
									</div>
									<div class="form-group col-md-6 m-t-20">
									     <small class="hoker_route_error" style="color:#fc4b6c;display:none;">Select hoker Route </small> 
                                         <select id="route_id" name="route_id" onChange="RouteArea(this.value);" class="form-control">
										 <option value=-1>Select Route</option>
										 <?php foreach($routedata as $route){   ?>
                                            <option value="<?php echo $route['id']; ?>"> <?php echo $route['route_name']; ?></option> 
										<?php } ?>
										 </select>
									</div>
									
									
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                               <input type="submit" class="btn btn-danger waves-light hoker_form" value="Save"/>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
								<!-- sample modal content -->
                                <div id="Hokermodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title"> Edit Hoker Data</h4>
                                            </div>
                                            <div class="modal-body">
                                               
										 <?php  echo $this->Form->create('edit_route', [
													'url' => ['controller' => 'user', 'action' => 'edithoker'],
													'class'=>['form-material m-t-40 row']
												]); ?>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="name" class="form-control form-control-line edit_hoker_name" placeholder="Hoker Name">
										<small class="edit_hoker_name_error" name="name" style="color:#fc4b6c;display:none;">Hoker Name is Required </small> 
										
									</div>
                                    <div class="form-group col-md-6 m-t-20">
									<input type="hidden" id="edit_user_id" name="user_id"/> 
                                        <input type="email" id="example-email2" name="email" class="form-control edit_hoker_email" placeholder="Email">
										
									</div>
									  <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="mobile" class="form-control form-control-line edit_hoker_mobile" placeholder="Mobile"> 
									</div>
                                    <!--div class="form-group col-md-6 m-t-20">
                                        <input type="email" id="example-email2" name="password" class="form-control edt_hoker_password" placeholder="Password">
									</div!-->
									<div class="form-group col-md-6 m-t-20">
                                       <input class="form-control edit_hoker_join_date" type="date" name="join_date" placeholder="Joining Date" id="example-date-input">
									</div>
									<div class="form-group col-md-6 m-t-20">
										<small class="edit_hoker_route" style="color:#fc4b6c;display:none;">Route Name is Required </small> 
                                        <select id="edit_route_id" name="route_id" onChange="RouteArea(this.value);" class="form-control">
										 <option value=-1>Select Route</option>
										 <?php foreach($routedata as $route){   ?>
                                            <option value="<?php echo $route['id']; ?>"> <?php echo $route['route_name']; ?></option> 
										<?php } ?>
										 </select>  
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
                                <!-- /.modal -->
                                <div class="table-responsive m-t-40">
								<?php  if(count($userdata)>0){?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Route</th>
                                                <th>Joining date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($userdata as $h){ $id=$h['id']; ?>
                                            <tr>
                                                <td><?php echo $h['name']; ?></td>
                                                <td><?php echo $h['mobile']; ?></td>
                                                <td><?php echo $h['email']; ?></td>
                                                <td><?php echo $h['route']['route_name']; ?></td>
                                                <td><?php echo $h['join_date']; ?></td>
                                                <td class="text-nowrap">
                                                      <a class="hoker_edit" user_id="<?php echo $id; ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo $this->Url->build(['controller'=>'user','action'=>'deletehoker',$id]);?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
										<?php } ?>
                                            
                                          
                                        </tbody>
                                    </table>
								<?php } else { echo "No Hoker Found";} ?>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
	<script>
function RouteArea(val) {
	var base_url = window.location.origin+"/paper/paperadmin";
	// alert(val);
	if(val!=-1)
	{
		$.ajax({
		type: "POST",
		url: base_url+"/user/routewisearea",
		data:'route_id='+val,
		// return false;
		success: function(data){
			$("#area_list").html(data);
			
		}
		});
	}
}
</script>