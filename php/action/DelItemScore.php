<?php
	require('../dao/AdminDao.php');
	
	$id=$_REQUEST['id'];
	
	$adminDao=new AdminDao;
	$result=false;
	if($adminDao->delItemScore($id)>0)
		$result=true;
	echo $result;
?>