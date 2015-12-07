<?php
	require('../dao/DelApplyDao.php');
	
	$ap_id=$_REQUEST['ap_id'];
	
	$daDao=new DelApplyDao;
	$result=false;
	if($daDao->delActivityComp($ap_id)>0)
		$result=true;
	echo $result;
?>