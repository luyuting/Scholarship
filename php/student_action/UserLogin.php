<?php
	require('../dao/LoginDao.php');
	date_default_timezone_set('PRC');
	$user_id=$_POST['user_id'];
	$user_password=$_POST['user_password'];
	$startTest=strtotime("2015-8-5 8:00:00");
	$endTest=strtotime("2015-8-16 17:00:00");
	
	$startTime=strtotime("2015-8-29 8:00:00");
	$endTime=strtotime("2015-9-7 22:00:00");
	
	$now=strtotime(Date("Y-m-d H:i:s"));
	
	$loginDao=new LoginDao;
	$obj=$loginDao->getUserPassword($user_id);
	if(count($obj)==1){
		@session_start();
		if(isset($_SESSION['admin'])){
			$_SESSION['u_sid']=$user_id;
			echo true;
			exit;	
		}
		if($obj[0]->user_password==$user_password){
			/*$arr=array('201303111','201303067','201203126','201404031');
			if(in_array($user_id,$arr)){
				session_start();
				$_SESSION['u_sid']=$user_id;
				echo true;
				exit;
			}*/
			if($now<$startTest||($now>$endTest&&$now<$startTime)/*||$now>$endTime*/){
				$name_arr=$loginDao->getUserName($user_id);
				echo "{$name_arr[0]->user_name} 同学：
					欢迎登录Torch奖学金评审系统，本次登录不在测试或评审阶段内，系统暂未开放(⊙o⊙)
					【系统测试】08月05日8:00-08月16日17:00
					【正式申请】08月29日8:00-09月07日22:00";
				exit;
			}
			@session_start();
			$_SESSION['u_sid']=$user_id;
			echo true;
			exit;
		}
	}
	echo "登录失败，用户名或密码错误";
?>