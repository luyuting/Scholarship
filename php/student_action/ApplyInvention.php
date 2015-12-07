<?php 
	require('../dao/ScieTechDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$in_student=$_SESSION['u_sid'];
	$in_name=$_REQUEST['in_name'];
	$in_account=$_REQUEST['in_account'];
	$in_team_num=(int)$_REQUEST['in_team_num'];
	$in_team_order=$_REQUEST['in_team_order'];
	$in_team_ratio=(float)$_REQUEST['in_team_ratio'];
	$in_type=$_REQUEST['in_type'];
	$in_time=$_REQUEST['in_time'];
	$in_discuss_score=(float)$_REQUEST['in_discuss_score'];
	$in_remark=$_REQUEST['in_remark'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	if($in_team_num<=3){
		$in_team_ratio=1;
		$in_team_order="";
	}
	$scieTechDao=new ScieTechDao;
	$id=$scieTechDao->applyAttention($in_student,$in_name,$in_account,$in_team_num,$in_team_order,$in_type,$in_time,
		$in_discuss_score,$in_remark);
	if($id==0){
		echo false;
		exit;
	}
	$schoTypeDao=new SchoTypeDao;
	$result=false;
	if($schoTypeDao->setScieTechInvention($in_student,$sc_annual,$in_discuss_score,$in_team_ratio,$in_type,$id)>0)
		$result=true;
	echo $result;
?>