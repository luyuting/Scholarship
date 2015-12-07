<?php 
	require('../dao/ProcessDao.php');
	session_start();
	$sc_admin=$_SESSION['admin'];
	$type=$_REQUEST['type'];
	
	$pDao=new ProcessDao;
	$obj_arr=$pDao->getProcess($sc_admin,$type);
	echo json_encode($obj_arr);
?>