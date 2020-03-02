<?php
 $str="PATRIKA+BHASAKAR+PUNJABKESARI+PATRIKA+PATRIKA";
 $p_arr=explode("+",$str);
 $p_un=array_unique($p_arr);
 $freqs = array_count_values($p_arr);
 echo "Total PATRIKA ".$freqs['PATRIKA'];
 die;
 // foreach($p_un as $single_p)
 // {
	
 // }
?>