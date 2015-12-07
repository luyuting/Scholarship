<?php 
	require('../dao/AuditDao.php');
	
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$auditDao=new AuditDao;
	$obj_arr=$auditDao->getScieTechPaperList($sc_admin);
	echo json_encode($obj_arr);
?>