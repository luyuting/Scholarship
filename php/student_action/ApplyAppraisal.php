<?php 
	require('../dao/SpiritualDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$app_student=$_SESSION['u_sid'];
	$app_ratio=$_REQUEST['app_ratio'];
	$app_score=$_REQUEST['app_score'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$id=$sDao->applyAppraisal($app_student,$app_ratio);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setSpiritualAppraisal($app_student,$sc_annual,$app_score,$id)>0)
		$result=true;
	echo $result;
?>