<?php
	require('../dao/ActivityDao.php');
	
	session_start();
	$ac_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$aDao=new ActivityDao;
	$obj_arr=$aDao->getActivityComp($ac_student,$sc_annual);
	echo json_encode($obj_arr);
?>