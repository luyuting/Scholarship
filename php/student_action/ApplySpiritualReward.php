<?php 
	require('../dao/SpiritualDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$spr_student=$_SESSION['u_sid'];
	$spr_name=$_REQUEST['spr_name'];
	$spr_item=$_REQUEST['spr_item'];
	$spr_rate=$_REQUEST['spr_rate'];
	$spr_time=$_REQUEST['spr_time'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$id=$sDao->applySpiritualReward($spr_student,$spr_name,$spr_item,$spr_rate,$spr_time);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setSpiritualReward($spr_student,$sc_annual,$spr_name,$spr_item,$spr_rate,$id)>0)
		$result=true;
	echo $result;
?>