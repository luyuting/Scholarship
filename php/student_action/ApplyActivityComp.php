<?php 
	require('../dao/ActivityDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$ac_student=$_SESSION['u_sid'];
	$ac_name=$_REQUEST['ac_name'];
	$ac_role=$_REQUEST['ac_role'];
	$ac_time=$_REQUEST['ac_time'];
	$ac_rate=$_REQUEST['ac_rate'];
	$ac_prize=$_REQUEST['ac_prize'];
	$ac_break=$_REQUEST['ac_break'];
	$ac_team_num=$_REQUEST['ac_team_num'];
	$ac_rule=$_REQUEST['ac_rule'];
	$ac_remark=$_REQUEST['ac_remark'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	if($ac_role=="否")
		$ac_role="队员";
	else
		$ac_role="替补队员";

	$aDao=new ActivityDao;
	$id=$aDao->applyActivityComp($ac_name,$ac_student,$ac_rate,$ac_prize,$ac_role,$ac_rule,$ac_break,
			$ac_team_num,$ac_time,$ac_remark);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setActivityComp($ac_student,$sc_annual,$ac_rate,$ac_prize,$ac_role,$ac_rule,$ac_team_num,$ac_break,$id)>0)
		$result=true;
	echo $result;
?>