<?php 
	require('../dao/AdminWorkDao.php');
	
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$awDao=new AdminWorkDao;
	$obj_arr=$awDao->getWorkScore($sc_admin);
	echo json_encode($obj_arr);
?>