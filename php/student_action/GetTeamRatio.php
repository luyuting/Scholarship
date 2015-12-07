<?php 
	require('../dao/CompDao.php');
	
	session_start();
	$user_id=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$cDao=new CompDao;
	$obj_arr=$cDao->getTeamRatio($user_id,$sc_annual);
	echo json_encode($obj_arr);
?>