<?php 
	require('../dao/AdminWorkDao.php');
	
	$position=$_REQUEST['position'];
	$score=(int)$_REQUEST['score'];
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$awDao=new AdminWorkDao;
	$result=false;
	if($awDao->setWorkScore($position,$score,$sc_admin)>0)
		$result=true;
	echo $result;
?>