<?php 
	require('../dao/AdminDao.php');
	
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$obj_arr=$adminDao->getScieTechComp($sc_admin);
	echo json_encode($obj_arr);
?>