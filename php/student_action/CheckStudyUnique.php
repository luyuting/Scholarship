<?php 
	require('../dao/StudyDao.php');
	
	session_start();
	$ap_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$studyDao=new StudyDao;
	$obj_arr=$studyDao->checkStudyUnique($ap_student,$sc_annual);
	echo json_encode($obj_arr);
?>