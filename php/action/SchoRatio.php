<?php
	require('../dao/AdminDao.php');
	
	$sc_name=$_REQUEST['sc_name'];
	$sc_ratio=$_REQUEST['sc_ratio'];
	
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$result=false;
	if($adminDao->setScholarship($sc_name,$sc_ratio,$sc_admin)==1)
		$result=true;
	echo $result;
?>