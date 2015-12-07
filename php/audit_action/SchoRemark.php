<?php 
	require('../dao/AuditDao.php');
	
	$ap_id=$_REQUEST['ap_id'];
	$ap_remark=$_REQUEST['ap_remark'];
	
	$auditDao=new AuditDao;
	$result=false;
	if($auditDao->setSchoRemark($ap_id,$ap_remark)>0)
		$result=true;
	echo $result;
?>