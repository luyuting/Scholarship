<?php 
	require('../dao/AdminDao.php');
	
	$cp_name=$_REQUEST['cp_name'];
	$cp_rate=$_REQUEST['cp_rate'];
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$result=false;
	if($adminDao->setScieTechComp($cp_name,$cp_rate,$sc_admin)>0)
		$result=true;
	echo $result;
?>