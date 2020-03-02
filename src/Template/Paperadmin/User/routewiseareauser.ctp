<?php if(count($areadata)>0) {?>					
						<option value="-1">Select Area</option>
						
									
										
										<?php foreach($areadata  as $area){ ?>
											<option value="<?php echo $area['id']; ?>"><?php echo $area['area_name']; ?></option>
											
                                      <?php }} else { ?>
									  <option value="-1">No Area created from selected route</option>
									  <?php } ?>