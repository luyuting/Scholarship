<?php
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