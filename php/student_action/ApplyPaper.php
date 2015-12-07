<?php 
	require('../dao/ScieTechDao.php');
	require('../dao/SchoTypeDao.php');
	
	session_start();
	$pa_student=$_SESSION['u_sid'];
	$pa_name=$_REQUEST['pa_name'];
	$pa_journal=$_REQUEST['pa_journal'];
	$pa_level=$_REQUEST['pa_level'];
	$pa_vol=$_REQUEST['pa_vol'];
	$pa_ei_sci=$_REQUEST['pa_ei_sci'];
	$pa_team_num=$_REQUEST['pa_team_num'];
	$pa_team_order=$_REQUEST['pa_team_order'];
	$pa_time=$_REQUEST['pa_time'];
	$pa_discuss_score=(float)$_REQUEST['pa_discuss_score'];
	$sc_annual=$_REQUEST['sc_annual'];
	
	$scieTechDao=new ScieTechDao;
	$id=$scieTechDao->applyPaper($pa_student,$pa_name,$pa_journal,$pa_level,$pa_vol,$pa_ei_sci,$pa_team_num,
		$pa_team_order,$pa_time,$pa_discuss_score);
	if($id==0){
		echo false;
		exit;
	}
	$schoTypeDao=new SchoTypeDao;
	$result=false;
	if($schoTypeDao->setScieTechPaper($pa_student,$sc_annual,$pa_level,$pa_team_order,$pa_discuss_score,$pa_ei_sci,$id)>0)
		$result=true;
	echo $result;
?>