 <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                   
                  
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Data</h4>
								 <?= $this->Flash->render() ?>
                               <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'addproduct']);?>" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary" >Create </a>
							  <br/>
							  <br/>
                                <div class="table-responsive">
								<?php if(count($productdata)>0){ ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Number of copy</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($productdata as $product){ 
										$product_id=$product['id'];
										  $copies=$product['product_copies']
										?>
                                            <tr>
                                                <td><?php echo $product['product_name'];?></td>
                                                <td><?php echo $product['product_code'];?></td>
                                                <td><?php if($copies>0){ echo $copies; } else { echo "_";} ?></td>
                                                <td class="text-nowrap">
                                                    <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'editproduct',$product_id]);?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'deleteproduct',$product_id]);?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                   
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
									<?php } else { ?>
									<p>No Product Found</p>
								<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->