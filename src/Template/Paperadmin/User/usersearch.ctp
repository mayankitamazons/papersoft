<?php 
if(!empty($result)) {
?>
<ul class="country-list">
<?php
foreach($result as $user) {
?>
<li class='selected_user'  onClick="selectUser('<?php echo $user["name"]." - ".$user['user_code']; ?>','<?php echo $search_id;?>','<?php echo $user["id"]; ?>');"><?php echo $user["name"]."-".$user['user_code']; ?></li>
<?php } ?>
</ul>
<?php }  ?>
