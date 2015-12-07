<?php 
	require('../dao/WorkDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$wc_student=$_SESSION['u_sid'];
	$wc_level=$_REQUEST['wc_level'];
	$wc_last_time=$_REQUEST['wc_last_time'];
	$wc_name=$_REQUEST['wc_name'];
	$wc_begin_time=$_REQUEST['wc_begin_time'];
	$wc_end_time=$_REQUEST['wc_end_time'];
	$wc_remark=$_REQUEST['wc_remark'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$wDao=new WorkDao;
	$id=$wDao->applyWorkCadre($wc_level,$wc_last_time,$wc_student,$wc_name,$wc_begin_time,
			$wc_end_time,$wc_remark);
	if($id==0){
		echo false;
		exit;
	}
	$wc_level_ratio=0;
	$wc_last_time_ratio=0;
	switch($wc_level){
		case "秋季学期第一职务":;
		case "春季学期第一职务":$wc_level_ratio=1;break;
		case "秋季学期第二职务":;
		case "春季学期第二职务":$wc_level_ratio=0.5;break;
		default:break;
	}
	switch($wc_last_time){
		case "一学年":$wc_last_time_ratio=1;break;
		case "一学期":$wc_last_time_ratio=0.5;break;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setWorkCadre($wc_student,$sc_annual,$wc_level_ratio,$wc_last_time_ratio,$wc_name,$id)>0)
		$result=true;
	echo $result;
?>