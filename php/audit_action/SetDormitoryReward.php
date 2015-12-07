<?php
	require('../dao/AuditExecuteDao.php');
	session_start();
	$sc_admin=$_SESSION['admin'];
	$ap_students=$_REQUEST['ap_students'];
	
	$aeDao=new AuditExecuteDao;
	for($i=0;$i<count($ap_students);$i++)
		$aeDao->setDormitoryReward($sc_admin,$ap_students[$i]);
	echo true;
?>