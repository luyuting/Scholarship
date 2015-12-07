<?php
	require('../dao/AuditExecuteDao.php');
	session_start();
	$sc_admin=$_SESSION['admin'];
	$ap_students=$_REQUEST['ap_students'];
	$app_ratio=$_REQUEST['app_ratio'];
	
	$aeDao=new AuditExecuteDao;
	
	for($i=0;$i<count($ap_students);$i++)
		$aeDao->setAppraisal($sc_admin,$ap_students[$i],$app_ratio);
	echo true;
?>