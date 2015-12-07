<?php 
	require('../dao/ActivityDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$ar_student=$_SESSION['u_sid'];
	$ar_name=$_REQUEST['ar_name'];
	$ar_role=$_REQUEST['ar_role'];
	$ar_time=$_REQUEST['ar_time'];
	$ar_rate=$_REQUEST['ar_rate'];
	$ar_host=$_REQUEST['ar_host'];
	$ar_remark=$_REQUEST['ar_remark'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$aDao=new ActivityDao;
	$id=$aDao->applyActivityRole($ar_name,$ar_student,$ar_time,$ar_role,$ar_rate,$ar_host,$ar_remark);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setActivityRole($ar_student,$sc_annual,$ar_role,$id)>0)
		$result=true;
	echo $result;
?>