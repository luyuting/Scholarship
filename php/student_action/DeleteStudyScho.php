<?php 
	require('../dao/StudyDao.php');
	
	$ap_id=$_REQUEST['ap_id'];
	
	$studyDao=new StudyDao;
	echo $studyDao->deleteStudyScho($ap_id);
?>