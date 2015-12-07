<?php 
	require('../dao/WorkDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$wr_student=$_SESSION['u_sid'];
	$wr_name=$_REQUEST['wr_name'];
	$wr_rate=$_REQUEST['wr_rate'];
	$wr_time=$_REQUEST['wr_time'];
	$sc_annual=$_REQUEST['sc_annual'];

	
	$wDao=new WorkDao;
	$id=$wDao->applyWorkReward($wr_name,$wr_student,$wr_rate,$wr_time);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setWorkReward($wr_student,$sc_annual,$wr_name,$wr_rate,$id)>0)
		$result=true;
	echo $result;
?>