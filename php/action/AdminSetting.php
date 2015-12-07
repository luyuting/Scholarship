<?php 
	require('../dao/AdminDao.php');
	session_start();
	$ad_id=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$obj_arr=$adminDao->getAdminSetting($ad_id);
	echo json_encode($obj_arr);
?>