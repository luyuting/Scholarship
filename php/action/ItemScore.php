<?php 
	require('../dao/AdminDao.php');
	
	$name=$_REQUEST['name'];
	$describe_a=$_REQUEST['describe_a'];
	$describe_b=$_REQUEST['describe_b'];
	$type=$_REQUEST['type'];
	$score=(int)$_REQUEST['score'];
	$ratio=(float)$_REQUEST['ratio'];
	session_start();
	$sc_admin=$_SESSION['admin'];
	
	$adminDao=new AdminDao;
	$result=false;
	if($adminDao->setItemScore($name,$describe_a,$describe_b,$score,$ratio,$sc_admin,$type)>0)
		$result=true;
	echo $result;
?>