<?php
	require('../dao/ActivityDao.php');
	
	session_start();
	$ar_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$aDao=new ActivityDao;
	$obj_arr=$aDao->getActivityRole($ar_student,$sc_annual);
	echo json_encode($obj_arr);
?>