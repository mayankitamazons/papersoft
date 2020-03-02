<?php
include('config.php');
$parent_user_id=4;
$fileName="RouteA.csv";
 $file = fopen($fileName, "r");
 $account_status="active";
 $totalcount=0;
  while (($c = fgetcsv($file, 10000, ",")) !== FALSE) {
    $user_name=$c[2];
    $user_code=$c[1];
    $r_code=$c[3];
	switch($r_code)
	{
		case: "RTGH A":
		$r_id=17;
		case: "RTGH B":
		$r_id=18;
		case: "RTGH C":
		$r_id=19;
		case: "RTGH D 1":
		$r_id=20;
		case: "RTGH D 2":
		$r_id=21;
		case: "RTGH D 3":
		$r_id=22;
		case: "RTGH D 4":
		$r_id=23;
	}
	 $p_str=$c[4];
	 if($p_str=="CLOSE")
	 {
		 $account_status="close";
	 }
	// insert new user 
	$q="INSERT INTO users(user_code,name,parent_user_id,route_id,status) 
			VALUES ($user_code,$user_name,$parent_user_id,$r_id,$account_status)";
	$insert_query=mysqli_query($conn,$q);
	$user_id=mysqli_insert_id($conn);
		if($user_id)
		{
		  // setup route plan 
		  $last_record_q="select seq_no from routeplan where route_id='$r_id' and parent_user_id=$parent_user_id order by id desc";
		  $lastq=mysqli_query($conn,$last_record_q);
		  $routedata=mysqli_fetch_assoc($lastq);
		  if($routedata)
		  $last_route_seq_no=$routedata['seq_no'];
		   else
			$last_route_seq_no=1;
		// setup print plan 
		   $last_record_q="select seq_no from print_plan where route_id='$r_id' and parent_user_id='$parent_user_id' order by id desc";
		  $lastprintq=mysqli_query($conn,$last_record_q);
		  $printdata=mysqli_fetch_assoc($lastprintq);
		  if($printdata)
		  $last_print_seq_no=$printdata['seq_no'];
		   else
			$last_print_seq_no=1;
		  if($p_str!="CLOSE")
			{  
				$p_arr=explode("+",$str);
				$p_un=array_unique($p_arr);
				$freqs = array_count_values($p_arr);
				$i=0;
				if(count($p_arr)>0)
				{
					
					foreach($p_un  as $s_paper)
					{
					  $p[$i]['product_id']=papermatch($s_paper);
					  $p[$i]['copies']=$freqs[$s_paper];
					  $p[$i]['parent_user_id']=4;
					  $p[$i]['user_id']=$user_id;
					   $i++;
					}
					
				}
				else
				{
					$p_id=papermatch($p_arr);
					$p[$i]['product_id']=$p_id;
					$p[$i]['copies']=1;
					$p[$i]['parent_user_id']=4;
					$p[$i]['user_id']=$user_id;
				}
				
			}
			$totalcount++;
		}
	}
	echo "Total Record : ".$totalcount;
  function papermatch($p_code)
  {
	switch($p_code)
	{
		case: "BHASAKAR":
		$p_id=12;
		case: "PATRIKA":
		$p_id=13;
		case: "TTOI":
		$p_id=14;
		case: "H.TIMES":
		$p_id=15;
		case: "ASSPASS":
		$p_id=16;
		case: "RASHTRADOOT":
		$p_id=17;
		case: "NAVJYOTI":
		$p_id=18;
		case: "PUNJABKESARI":
		$p_id=19;
	}  
	return $p_id;
  }
?>