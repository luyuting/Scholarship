<?php
	require('../dao/SpiritualDao.php');
	
	session_start();
	$app_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$obj_arr=$sDao->getAppraisal($app_student,$sc_annual);
	echo json_encode($obj_arr);
?>