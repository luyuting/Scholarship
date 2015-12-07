<?php 
	require('../dao/PracticeDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$pr_student=$_SESSION['u_sid'];
	$pr_title=$_REQUEST['pr_title'];
	$pr_name=$_REQUEST['pr_name'];
	$pr_team_prize=$_REQUEST['pr_team_prize'];
	$pr_person_prize=$_REQUEST['pr_person_prize'];
	$pr_team_role=$_REQUEST['pr_team_role'];
	$pr_remark=$_REQUEST['pr_remark'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$pr_score=0;
	if($pr_name=="社区挂职")
		$pr_score+=5;
	else if($pr_name=="其他类社会实践")
		$pr_score+=1;
	switch($pr_team_prize){
		case "国家级奖":$pr_score+=8;break;
		case "省级奖":$pr_score+=6;break;
		case "市级奖":$pr_score+=4;break;
		case "校级一等奖":$pr_score+=3;break;
		case "校级二等奖":$pr_score+=2;break;
		case "校级三等奖":$pr_score+=1;break;
		default:$pr_team_prize="";break;
	}
	switch($pr_person_prize){
		case "国家级优秀个人":$pr_score+=10;break;
		case "省级优秀个人":$pr_score+=7;break;
		case "市级优秀个人":$pr_score+=4;break;
		case "校级优秀个人一等奖":$pr_score+=3;break;
		case "校级优秀个人二等奖":$pr_score+=2;break;
		case "校级优秀个人三等奖":$pr_score+=1;break;
		case "个人调查报告一等奖":$pr_score+=3;break;
		case "个人调查报告二等奖":$pr_score+=2;break;
		case "个人调查报告三等奖":$pr_score+=1;break;
		case "先进个人":$pr_score+=2;break;
		case "锻炼标兵":$pr_score+=4;break;
		case "国家级":$pr_score+=20;break;
		case "省级":$pr_score+=15;break;
		case "市级":$pr_score+=10;break;
		case "校级":$pr_score+=7;break;
		case "学部（学院）级":$pr_score+=5;break;
		case "军训先进集体成员":$pr_score+=2;break;
		case "军训先进个人":$pr_score+=2;break;
		default:$pr_person_prize="";break;
	}
	switch($pr_team_role){
		case "队长":$pr_score+=1;
		case "队员":$pr_score+=2;break;
		default:$pr_team_role="";break;
	}
	$pDao=new PracticeDao;
	$id=$pDao->applyPractice($pr_title,$pr_name,$pr_student,$pr_team_prize,$pr_person_prize,
			$pr_team_role,$pr_remark);
	if($id==0){
		echo false;
		exit;
	}
	$stDao=new SchoTypeDao;
	$result=false;
	if($stDao->setPractice($pr_student,$sc_annual,$pr_score,$id)>0)
		$result=true;
	echo $result;
?>