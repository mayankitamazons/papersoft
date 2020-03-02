
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo $this->request->webroot; ?>Admin/assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="post">
                    <h3 class="box-title m-b-20">Apna-Epaper Agent Board</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="username" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
					    
                        <div class="col-xs-12">
						
						<?= $this->Flash->render() ?>
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                   
                    
                </form>
                <form class="form-horizontal" id="recoverform" action="">
                    <div class="form-group ">
                        <div class="col-xs-12">
                           
                            <p class="text-muted">To Recover Password Contact to software vendor <br/>
							9024282477</p>
                        </div>
                    </div>
                   
                </form>
            </div>
          </div>
        </div>
        
    </section>