<?php 
	require('../dao/StudyDao.php');
	
	session_start();
	$ap_student=$_SESSION['u_sid'];
	$ap_scho_type=$_REQUEST['ap_scho_type'];
	
	$studyDao=new StudyDao;
	$id=$studyDao->applyStudyScho($ap_scho_type,$ap_student);	
	echo $id;
?>