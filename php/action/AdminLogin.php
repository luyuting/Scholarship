<?php
	require('../dao/LoginDao.php');
	$ad_id=$_POST['ad_id'];
	$ad_password=$_POST['ad_password'];

	$loginDao=new LoginDao;
	$obj=$loginDao->getAdminPassword($ad_id);
	if(count($obj)==1){
		if($obj[0]->ad_password==$ad_password){
			session_start();
			$_SESSION['admin']=$ad_id;
			echo true;
			exit;
		}
	}
	else
		echo false;
?>