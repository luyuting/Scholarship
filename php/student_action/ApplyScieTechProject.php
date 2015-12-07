<?php 
	require('../dao/ScieTechDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$stp_student=$_SESSION['u_sid'];
	$stp_name=$_REQUEST['stp_name'];
	$stp_rate=$_REQUEST['stp_rate'];
	$stp_prize=$_REQUEST['stp_prize'];
	$stp_team_num=(int)$_REQUEST['stp_team_num'];
	$stp_team_order=$_REQUEST['stp_team_order'];
	$stp_team_ratio=(float)$_REQUEST['stp_team_ratio'];
	$stp_time=$_REQUEST['stp_time'];
	$stp_remark=$_REQUEST['stp_remark'];
	
	$sc_annual=$_REQUEST['sc_annual'];
	
	if($stp_team_num<=3){
		$stp_team_order="";
		$stp_team_ratio=1;
	}
	$scieTechDao=new ScieTechDao;
	$id=$scieTechDao->applyScieTechProject($stp_student,$stp_name,$stp_rate,$stp_prize,$stp_team_num,$stp_team_order,
				$stp_time,$stp_remark);
	if($id==0){
		echo false;
		exit;
	}
	$schoTypeDao=new SchoTypeDao;
	$result=false;
	if($schoTypeDao->setScieTechProject($stp_student,$sc_annual,$stp_prize,$stp_team_ratio,$id)>0)
		$result=true;
	echo $result;
?>