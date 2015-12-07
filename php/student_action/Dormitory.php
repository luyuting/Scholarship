<?php
	require('../dao/SpiritualDao.php');
	
	session_start();
	$do_student=$_SESSION['u_sid'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$sDao=new SpiritualDao;
	$obj_arr=$sDao->getDormitory($do_student,$sc_annual);
	echo json_encode($obj_arr);
?>