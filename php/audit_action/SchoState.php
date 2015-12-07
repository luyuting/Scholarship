<?php 
	require('../dao/AuditDao.php');
	
	$ap_id=$_REQUEST['ap_id'];
	$ap_state=$_REQUEST['ap_state'];
	
	$auditDao=new AuditDao;
	$result=false;
	if($auditDao->setSchoState($ap_id,$ap_state)>0)
		$result=true;
	echo $result;
?>