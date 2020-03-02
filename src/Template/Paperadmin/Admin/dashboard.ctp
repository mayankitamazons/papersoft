<!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col p-r-0 align-self-center">
                                    <h2 class="font-light m-b-0"><?php echo $active_user; ?></h2>
                                    <h6 class="text-muted">Total user</h6></div>
                                <!-- Column -->
                             
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col p-r-0 align-self-center">
                                    <h2 class="font-light m-b-0"><?php echo $totalroute; ?></h2>
                                    <h6 class="text-muted">Total Route</h6></div>
                                <!-- Column -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col p-r-0 align-self-center">
                                    <h2 class="font-light m-b-0"><?php echo $totalbill; ?></h2>
                                    <h6 class="text-muted">Total Bill Created</h6></div>
                                <!-- Column -->
                                                           </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-body">
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col p-r-0 align-self-center">
                                    <h2 class="font-light m-b-0"><?php echo $totalcashentry; ?></h2>
                                    <h6 class="text-muted">Total Cash Entry</h6></div>
                                <!-- Column -->
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
               
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
						<?php if(count($recentmemo)>0){ ?>
                            <div class="card-body">
                                
                                <h4 class="card-title">Recent CashMamo</h4>
                                <div class="table-responsive m-t-20">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                              
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($recentmemo as $r){ ?>
                                            <tr>
                                              
                                                <td>
                                                    <h6><?php echo $r['user_name']; ?></h6><small class="text-muted"><?php echo $r['user_code']; ?></small></td>
                                                <td>Rs. <?php echo $r['cash_amount']; ?></td>
                                               
                                                <td>25-04-2018</td>
                                            </tr>
										<?php } ?>
											  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
						<?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Column -->
						<?php if(count($recentuser)>0){ ?>
                         <div class="card">
                            <div class="card-body bg-info">
                                <h4 class="text-white card-title">Recent User</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Newly created user</h6> </div>
                            <div class="card-body">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn">
									<a href="<?php echo $this->Url->build(['controller'=>'user','action'=>'createuser']);?>">
									<button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></a></h2>
                                    <div class="message-widget contact-widget">
                                        <!-- Message -->
										<?php  foreach($recentuser as $u){ ?>
                                        <a href="#">
                                           
										   <div class="mail-contnet">
                                                <h5><?php echo $u['name']; ?></h5> <span class="mail-desc"><?php echo $u['user_code']; ?></span></div>
                                        </a>
									<?php } ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
                        <!-- Column -->
                    </div>
                </div>
               
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->