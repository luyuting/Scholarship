<?php 
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$user_id=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$stDao=new SchoTypeDao;
	$obj_arr=$stDao->getStudyType($user_id,$sc_annual);	
	echo json_encode($obj_arr);
?>