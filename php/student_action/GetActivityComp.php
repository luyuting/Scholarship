<?php 
	require('../dao/CompDao.php');
	
	$sc_annual=$_REQUEST['sc_annual'];
	
	$compDao=new CompDao;
	$obj_arr=$compDao->getActivityComp($sc_annual);
	echo json_encode($obj_arr);
?>