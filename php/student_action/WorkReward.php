<?php
	require('../dao/WorkDao.php');
	
	session_start();
	$wr_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$wDao=new WorkDao;
	$obj_arr=$wDao->getWorkReward($wr_student,$sc_annual);
	echo json_encode($obj_arr);
?>