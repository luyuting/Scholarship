<?php 
	require('../dao/SpiritualDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$do_student=$_SESSION['u_sid'];
	$do_score=(float)$_REQUEST['do_score'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$id=$sDao->applyDormitory($do_student,$do_score);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setSpiritualDormitory($do_student,$sc_annual,$do_score,$id)>0)
		$result=true;
	echo $result;
?>