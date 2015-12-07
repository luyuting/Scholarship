<?php 
	require('../dao/ScieTechDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$stc_student=$_SESSION['u_sid'];
	$stc_name=$_REQUEST['stc_name'];
	$stc_rate=$_REQUEST['stc_rate'];
	$stc_prize=$_REQUEST['stc_prize'];
	$stc_team_status=$_REQUEST['stc_team_status'];
	$stc_team_num=(int)$_REQUEST['stc_team_num'];
	$stc_team_order=$_REQUEST['stc_team_order'];
	$stc_team_ratio=(float)$_REQUEST['stc_team_ratio'];
	$stc_host=$_REQUEST['stc_host'];
	$stc_time=$_REQUEST['stc_time'];
	$stc_remark=$_REQUEST['stc_remark'];
	
	$sc_annual=$_REQUEST['sc_annual'];
	
	if($stc_team_num<=3){
		$stc_team_order="";
		$stc_team_ratio=1;
	}
	$scieTechDao=new ScieTechDao;
	$id=$scieTechDao->applyScieTechComp($stc_student,$stc_name,$stc_rate,$stc_prize,$stc_team_status,$stc_team_num,
		$stc_team_order,$stc_host,$stc_time,$stc_remark);
	if($id==0){
		echo false;
		exit;
	}
	$schoTypeDao=new SchoTypeDao;
	$result=false;
	if($schoTypeDao->setScieTechComp($stc_student,$sc_annual,$stc_rate,$stc_prize,$stc_team_ratio,$id)>0)
		$result=true;
	echo $result;
?>