<?php 
	require('../dao/ScieTechDao.php');
	
	session_start();
	$pa_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$stDao=new ScieTechDao;
	$obj_arr=$stDao->getPaper($pa_student,$sc_annual);
	echo json_encode($obj_arr);
?>