<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing:border-box;
}

.part1 {
  
  padding:1px;
  float:left;
  width:45%; /* The width is 20%, by default */
  border:1px solid;
}
.part2 {
  
  padding:1px;
  float:left;
  width:5%; /* The width is 20%, by default */
   
}
.part3 {
  
  padding:1px;
  float:left;
  width:50%; /* The width is 20%, by default */
  border:1px solid;
}
.left {
  
  padding:1px;
  float:left;
  width:20%; /* The width is 20%, by default */
}
.left2 {
  
  padding:1px;
  float:left;
  width:20%; /* The width is 20%, by default */
}
.left3 {
  
  padding:1px;
  float:left;
  width:10%; /* The width is 20%, by default */
}

.left4 {
  
  padding:1px;
  float:right;
  width:30%; /* The width is 20%, by default */
}
.print {
  
  padding:1px;
  float:left;
  width:100%; /* The width is 20%, by default */
}
.main2 {
  
  padding:1px;
  float:left;
  width:40%; /* The width is 20%, by default */
}
.main {
  
  padding:1px;
  float:left;
  width:60%; /* The width is 60%, by default */
}

.right {
  
  padding:1px;
  float:left;
  width:20%; /* The width is 20%, by default */
}

/* Use a media query to add a break point at 800px: */
@media screen and (max-width:800px) {
  .left, .main, .right {
    width:100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}
@media print {
     .nonprint {
         display: none;
     }
	 .part1{
	   border-style:none;
	 }
	 .part3{
	   border-style:none;
	 }
}
</style>
<body>
<?php foreach($re as $r){ ?>
<div class="print">
<div class="part1">
<h2 class="nonprint"><?php  echo $parent_user_name;?></h2>
<!-- 1 line -->
<div class="left2">
    <br>

  <label for="message-text" class="control-label"><?php echo $r['user_code'];  ?></label>
</div>
<div class="main">
</div>
<div class="right">
       <br>
  <label for="recipient-name" class="control-label"><?php echo $r['bill_id'] ?></label>
</div>
<!-- 2 line -->
<div class="left2">
  <label for="message-text" class="control-label"><?php echo $r['user_name'];?></label>
</div>

<div class="main">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
  <label for="recipient-name" class="control-label"><?php echo $newDate = date("d/m/Y", strtotime($r['created'])); ?></label>
</div>
<!-- 3 line -->
<?php foreach($r['bill_product'] as $p){ ?>
<div class="main">
<br>
  <label for="message-text" class="control-label"><?php echo $p['product_code']; ?></label>
</div>

<div class="left3">
<br>
 <label for="recipient-name" class="control-label"><?php echo $p['product_copies']; ?></label>
</div>

<div class="left3">
<br>
  <label for="recipient-name" class="control-label"><?php echo $p['product_price']; ?></label>
</div>

<div class="right">
<br>
 <label for="recipient-name" class="control-label"><?php echo $p['product_price']; ?></label>
</div>
<?php } ?>
<!-- 4 line -->
<div class="main">
 <label for="recipient-name" class="control-label"></label>
</div>

<div class="left2">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
 <label for="recipient-name" class="control-label"><?php if($r['before_balance']<0){echo abs($r['before_balance']);} else { echo $r['before_balance']." जमा";} ?></label>
</div>
<!-- 5 line -->
<div class="main">
 <label for="recipient-name" class="control-label"></label>
</div>

<div class="left2">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
  <label for="recipient-name" class="control-label"><?php if($r['after_balance']<0){echo abs($r['after_balance']);} else { echo $r['after_balance']." जमा";} ?></label>
</div>
</div>
<div class="part2">

<!-- space -->
</div>
<div class="part3">
<h2 class="nonprint"><?php  echo $parent_user_name;?></h2>
<!-- 1 line -->
<div class="left2">
    <br>

  <label for="message-text" class="control-label"><?php echo $r['user_code'];  ?></label>
</div>
<div class="main">
</div>
<div class="right">
       <br>
  <label for="recipient-name" class="control-label"><?php echo $r['bill_id'] ?></label>
</div>
<!-- 2 line -->
<div class="left2">
  <label for="message-text" class="control-label"><?php echo $r['user_name'];?></label>
</div>

<div class="main">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
  <label for="recipient-name" class="control-label"><?php echo $newDate = date("d/m/Y", strtotime($r['created'])); ?></label>
</div>
<!-- 3 line -->
<?php foreach($r['bill_product'] as $p){ ?>
<div class="main">
<br>
  <label for="message-text" class="control-label"><?php echo $p['product_code']; ?></label>
</div>

<div class="left3">
<br>
 <label for="recipient-name" class="control-label"><?php echo $p['product_copies']; ?></label>
</div>

<div class="left3">
<br>
  <label for="recipient-name" class="control-label"><?php echo $p['product_price']; ?></label>
</div>

<div class="right">
<br>
 <label for="recipient-name" class="control-label"><?php echo $p['product_price']; ?></label>
</div>
<?php } ?>
<!-- 4 line -->
<div class="main">
 <label for="recipient-name" class="control-label"></label>
</div>

<div class="left2">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
 <label for="recipient-name" class="control-label"><?php if($r['before_balance']<0){echo abs($r['before_balance']);} else { echo $r['before_balance']." जमा";} ?></label>
</div>
<!-- 5 line -->
<div class="main">
 <label for="recipient-name" class="control-label"></label>
</div>

<div class="left2">
  <label for="recipient-name" class="control-label"></label>
</div>
<div class="right">
  <label for="recipient-name" class="control-label"><?php if($r['after_balance']<0){echo abs($r['after_balance']);} else { echo $r['after_balance']." जमा";} ?></label>
</div>
</div>
  




 </div> 
<?php } ?> 
</body>
</html>
