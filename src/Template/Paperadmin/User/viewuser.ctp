      <script type="text/javascript" src="http://www.google.com/jsapi">

</script>
	<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User a/c</h4>
									<?= $this->Flash->render() ?>
								<form method="post">
                                <div class="col-md-6">
                                        <label for="recipient-name" class="control-label">User Name/Code:</label>
                                       <input type="text" field_id='1' autocomplete="off"  id="search-box-1"  required class="search-box form-control" name="user_detail">
									   	<div  style="display:none;" id="translControl"></div>
										<div id="suggesstion-box-1"></div>
								</div>
								 <input type="submit" style="float:right;" class="btn btn-danger waves-light hoker_form" value="Search"/>
								
								</form>
								<div>
								<?php if($user_code) {?>
								<br/>
								<button type="button" account_user_code="<?php echo $user_code; ?>" data-toggle="modal" data-target="#responsive-modal" style="float:left;" class="btn waves-effect waves-light btn-rounded btn-primary close_account">Close Account</button>
								
								</div>
								<?php if(count($userdata['userbill'])>0){ ?>
                                <div class="table-responsive m-t-40">
								 <h4>Billing History</h4>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Bill no</th>
												<th>Bill Month</th>
												<th>Before Balance</th>
                                                <th>Bill Amount</th>
												<th>After Balance</th>
                                                <th>Created</th>
												
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php foreach($userdata['userbill'] as $b){ ?>
                                            <tr>
                                                <td><?php echo $b['id']; ?></td>
                                                <td><?php echo date("M", strtotime($b['bill_created'])); ?></td>
												<td><?php echo $b['before_balance']; ?></td>
												<td><?php echo $b['bill_amount']; ?></td>
												<td><?php echo $b['after_balance']; ?></td>
                                                <td><?php echo date("d/m/Y h:i A", strtotime($b['bill_created'])); ?></td>
                                              
                                                                              
                                            </tr>
										<?php } ?>
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
								<?php } if(count($userdata['usertransation'])>0){ ?>
								 <div class="table-responsive m-t-40">
								   <h4>User transaction</h4>
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>transaction id</th>
												<th>Opening Amount</th>
                                                <th>Cr Amount</th>
												<th>Dr Amount</th>
												<th>Closing  Amount</th>
												<th>Date</th>
                                                <th>Comment</th>
                                              
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php foreach($userdata['usertransation'] as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['id']; ?></td>
                                                <td><?php echo $t['before_balance']; ?></td>
                                                <td><?php echo $t['cr']; ?></td>
                                                <td><?php echo $t['dr']; ?></td>
                                                <td><?php echo $t['after_balance']; ?></td>
                                                <td><?php echo date("d/m/Y h:i A", strtotime($t['created'])); ?></td>
												 <td><?php echo $t['comment']; ?></td>
												
                                                                              
                                            </tr>
										<?php } ?>
											
                                           
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
				  <div id="responsive-close-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title"> Close Account</h4>
                                            </div>
                                            <div class="modal-body">
                                               
										 <?php  echo $this->Form->create('close_account', [
													'url' => ['controller' => 'user', 'action' => 'closeaccount'],
													'class'=>['form-material m-t-40 row']
												]); ?>
                                       <input type="hidden" name="account_user_code" id="account_user_code"/>
									  <div class="form-group col-md-6 m-t-20">
                                        Rejoining Date
									</div>
                                    <!--div class="form-group col-md-6 m-t-20">
                                        <input type="email" id="example-email2" name="password" class="form-control edt_hoker_password" placeholder="Password">
									</div!-->
									<div class="form-group col-md-6 m-t-20">
                                       <input class="form-control edit_hoker_join_date" type="date" name="rejoin_date" placeholder="Joining Date" id="example-date-input">
									</div>
									
									 </div>  
									<div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger waves-light" value="Close Account"/>
                                            </div>
									</form>
                                           
                                           
                                        </div>
                                    </div>
                                </div>
				 <script type="text/javascript">



  // Load the Google Transliteration API

  google.load("elements", "1", {

        packages: "transliteration"

      });



  function onLoad() {

    var options = {

      sourceLanguage: 'en',

      destinationLanguage: ['hi'],

      shortcutKey: 'ctrl+m',

      transliterationEnabled: true

    };



    // Create an instance on TransliterationControl with the required

    // options.

    var control =

        new google.elements.transliteration.TransliterationControl(options);



    // Enable transliteration in the textfields with the given ids.

    var ids = [ "search-box-1"];

    control.makeTransliteratable(ids);



    // Show the transliteration control which can be used to toggle between

    // English and Hindi and also choose other destination language.

    control.showControl('translControl');

  }

  google.setOnLoadCallback(onLoad);



</script>