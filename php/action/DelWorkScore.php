<?php
	require('../dao/AdminWorkDao.php');
	
	$id=$_REQUEST['id'];
	
	$awDao=new AdminWorkDao;
	$result=false;
	if($awDao->delWorkScore($id)>0)
		$result=true;
	echo $result;
?>