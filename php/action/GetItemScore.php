<?php 
	require('../dao/AdminDao.php');
	
	$name=$_REQUEST['name'];
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$obj_arr=$adminDao->getItemScore($name,$sc_admin);
	echo json_encode($obj_arr);
?>