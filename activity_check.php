<?php
    /* 临时脚本
     14级临时增加需求，在申请时间之外的基一时间段临时开放文体竞赛的申请入口，其他年级不能进入。
     */
	require_once('php/dao/LoginDao.php');
	$loginDao=new LoginDao;
	@session_start();
	$user_id=$_SESSION['u_sid'];
	$start=strtotime("2015-9-9 20:00:00");
	$end=strtotime("2015-9-9 22:45:00");
	$now=strtotime(Date("Y-m-d H:i:s"));
	$obj_arr=$loginDao->getUserGrade($user_id);
	$user_grade=$obj_arr[0]->user_grade;
	if(!isset($_SESSION['admin'])){
		if($user_grade=="2014"){
			if($now>$start&&$now<$end)
				echo "<script>$(function(){var obj=document.getElementById('role');obj.style.display='none';})</script>";
			else{
				echo "<script>location='error.php';</script>";
				exit;
			}
		}
		else{
			echo "<script>location='error.php';</script>";
			exit;
		}
			
	}
?>