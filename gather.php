<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>奖学金汇总</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/gather.css"/>
</head>
<body>
<?php 
	include('nav.php');
	@session_start();
	$ap_student=$_SESSION['u_sid'];
	require_once('php/dao/StuGatherDao.php');
	$sc_annual=date("Y");
	$sgDao=new StuGatherDao;
	$study_arr=$sgDao->gatherStudy($ap_student,$sc_annual);
	$appraisal_arr=$sgDao->gatherAppraisal($ap_student,$sc_annual);
	$dormitory_arr=$sgDao->gatherDormitory($ap_student,$sc_annual);
	$spiritual_reward_arr=$sgDao->gatherSpiritualReward($ap_student,$sc_annual);
	$activity_comp_arr=$sgDao->gatherActivityComp($ap_student,$sc_annual);
	$activity_role_arr=$sgDao->gatherActivityRole($ap_student,$sc_annual);
	$work_cadre_arr=$sgDao->gatherWorkCadre($ap_student,$sc_annual);
	$work_reward_arr=$sgDao->gatherWorkReward($ap_student,$sc_annual);
	$scie_tech_comp_arr=$sgDao->gatherScieTechComp($ap_student,$sc_annual);
	$paper_arr=$sgDao->gatherPaper($ap_student,$sc_annual);
	$invention_arr=$sgDao->gatherInvention($ap_student,$sc_annual);
	$project_arr=$sgDao->gatherProject($ap_student,$sc_annual);
	$practice_arr=$sgDao->gatherPractice($ap_student,$sc_annual);
?>
<div class="main-box">
	<div class="section">
		<div class="title"><h1>>学习优秀奖学金</h1></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>比率</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0;$i<count($study_arr);$i++)
					echo "<tr>
							<td>{$study_arr[$i]->sc_name}</td>
							<td>{$study_arr[$i]->sc_ratio}</td>
							<td>{$study_arr[$i]->ap_state}</td>
							<td>{$study_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			<tbody>
		</table>
		</center>
	</div>
	<div class="section">
		<div class="title"><h1>>精神文明奖学金</h1><span>总分：<?php echo $sgDao->scoreGather($ap_student,$sc_annual,"精神文明");?></span></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>分数</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php
				for($i=0;$i<count($appraisal_arr);$i++)
					echo "<tr>
							<td>{$appraisal_arr[$i]->app_name}</td>
							<td>{$appraisal_arr[$i]->ap_score}</td>
							<td>{$appraisal_arr[$i]->ap_state}</td>
							<td>{$appraisal_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($dormitory_arr);$i++)
					echo "<tr>
							<td>{$dormitory_arr[$i]->do_name}</td>
							<td>{$dormitory_arr[$i]->ap_score}</td>
							<td>{$dormitory_arr[$i]->ap_state}</td>
							<td>{$dormitory_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($spiritual_reward_arr);$i++)
					echo "<tr>
							<td>{$spiritual_reward_arr[$i]->spr_item}</td>
							<td>{$spiritual_reward_arr[$i]->ap_score}</td>
							<td>{$spiritual_reward_arr[$i]->ap_state}</td>
							<td>{$spiritual_reward_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			</tbody>
		</table>
		</center>
	</div>
	<div class="section">
		<div class="title"><h1>>文体活动奖学金</h1><span>总分：<?php echo $sgDao->scoreGather($ap_student,$sc_annual,"文体活动");?></span></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>分数</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				for($i=0;$i<count($activity_comp_arr);$i++)
					echo "<tr>
							<td>{$activity_comp_arr[$i]->ac_name}</td>
							<td>{$activity_comp_arr[$i]->ap_score}</td>
							<td>{$activity_comp_arr[$i]->ap_state}</td>
							<td>{$activity_comp_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($activity_role_arr);$i++)
					echo "<tr>
							<td>{$activity_role_arr[$i]->ar_name}</td>
							<td>{$activity_role_arr[$i]->ap_score}</td>
							<td>{$activity_role_arr[$i]->ap_state}</td>
							<td>{$activity_role_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			</tbody>
		</table>
		</center>
	</div>
	<div class="section">
		<div class="title"><h1>>社会工作奖学金</h1><span>总分：<?php echo $sgDao->scoreGather($ap_student,$sc_annual,"社会工作");?></span></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>分数</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				for($i=0;$i<count($work_cadre_arr);$i++)
					echo "<tr>
							<td>{$work_cadre_arr[$i]->wc_level}</td>
							<td>{$work_cadre_arr[$i]->ap_score}</td>
							<td>{$work_cadre_arr[$i]->ap_state}</td>
							<td>{$work_cadre_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($work_reward_arr);$i++)
					echo "<tr>
							<td>{$work_reward_arr[$i]->wr_name}</td>
							<td>{$work_reward_arr[$i]->ap_score}</td>
							<td>{$work_reward_arr[$i]->ap_state}</td>
							<td>{$work_reward_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			</tbody>
		</table>
		</center>
	</div>
	<div class="section">
		<div class="title"><h1>>科技创新奖学金</h1><span>总分：<?php echo $sgDao->scoreGather($ap_student,$sc_annual,"科技创新");?></span></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>分数</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				for($i=0;$i<count($scie_tech_comp_arr);$i++)
					echo "<tr>
							<td>{$scie_tech_comp_arr[$i]->stc_name}</td>
							<td>{$scie_tech_comp_arr[$i]->ap_score}</td>
							<td>{$scie_tech_comp_arr[$i]->ap_state}</td>
							<td>{$scie_tech_comp_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($paper_arr);$i++)
					echo "<tr>
							<td>{$paper_arr[$i]->pa_name}</td>
							<td>{$paper_arr[$i]->ap_score}</td>
							<td>{$paper_arr[$i]->ap_state}</td>
							<td>{$paper_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($invention_arr);$i++)
					echo "<tr>
							<td>{$invention_arr[$i]->in_name}</td>
							<td>{$invention_arr[$i]->ap_score}</td>
							<td>{$invention_arr[$i]->ap_state}</td>
							<td>{$invention_arr[$i]->ap_remark}</td>
						</tr>";
				for($i=0;$i<count($project_arr);$i++)
					echo "<tr>
							<td>{$project_arr[$i]->stp_name}</td>
							<td>{$project_arr[$i]->ap_score}</td>
							<td>{$project_arr[$i]->ap_state}</td>
							<td>{$project_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			</tbody>
		</table>
		</center>
	</div>
	<div class="section">
		<div class="title"><h1>>社会实践奖学金</h1><span>总分：<?php echo $sgDao->scoreGather($ap_student,$sc_annual,"社会实践");?></span></div>
		<center>
		<table>
			<thead>
			<tr>
				<th>申请项目</th>
				<th>分数</th>
				<th>审核状态</th>
				<th>未通过原因</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				for($i=0;$i<count($practice_arr);$i++)
					echo "<tr>
							<td>{$practice_arr[$i]->pr_name}</td>
							<td>{$practice_arr[$i]->ap_score}</td>
							<td>{$practice_arr[$i]->ap_state}</td>
							<td>{$practice_arr[$i]->ap_remark}</td>
						</tr>";
			?>
			</tbody>
		</table>
		</center>
	</div>
</div>
<script src="js/gather.js"></script>
</body>
</html>