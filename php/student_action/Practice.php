<?php
	require('../dao/PracticeDao.php');
	
	session_start();
	$pr_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$pDao=new PracticeDao;
	$obj_arr=$pDao->getPractice($pr_student,$sc_annual);
	echo json_encode($obj_arr);
?>