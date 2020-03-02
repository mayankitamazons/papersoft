 <?php if(count($areadata)>0){ $i=21;foreach($areadata as $a){?>
 <input type="checkbox" id="md_checkbox_<?php echo $i;?>" value="<?php echo $a['id']; ?>" class="filled-in chk-col-red" name="selected_area[]"/>
                                    <label for="md_checkbox_<?php echo $i;?>"><?php echo $a['area_name']; ?></label>
                                    
	<?php  $i++;} } else { ?>
	<p>No Additional Group Created  ,  <a href="<?php echo $this->Url->build(['controller'=>'setting','action'=>'arealist']);?>">Create it First</a></p>
	<?php } ?>