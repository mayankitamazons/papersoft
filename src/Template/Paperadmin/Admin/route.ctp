  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Route Data</h4>
								 <button type="button"  data-toggle="modal" data-target="#responsive-modal" style="float:right;" class="btn waves-effect waves-light btn-rounded btn-primary">Create</button>
                               <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Create New Route</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Route Name:</label>
                                                        <input type="text" class="form-control" id="route_name" name="route_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Route Code:</label>
                                                        <input type="text" class="form-control" id="route_code" name="route_code">
                                                    </div>
													<div class="form-group">
                                                        <label for="message-text" class="control-label">Delivery Charges:</label>
                                                        <input type="text" class="form-control" id="delivery_charges" name="delivery_charges">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Route Name</th>
                                                <th>Route Code</th>
                                                <th>Delivery Charges</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<tr>
                                                <td>Ratangarh Incity</td>
                                                <td>ROIC</td>
                                               
                                                <td>Rs.00</td>
                                                <td class="text-nowrap">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ratangarh Outer</td>
                                                <td>ROSC</td>
                                               
                                                <td>Rs. 10</td>
                                                <td class="text-nowrap">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->