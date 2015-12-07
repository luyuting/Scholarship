<?php
	require('../dao/SpiritualDao.php');
	
	session_start();
	$spr_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$obj_arr=$sDao->getSpiritualReward($spr_student,$sc_annual);
	echo json_encode($obj_arr);
?>