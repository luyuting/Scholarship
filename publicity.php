<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>公示</title>
	<link rel="stylesheet" href="css/publicity.css"/>
	<script src="js/jquery-1.8.2.min.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		$sc_annual=date("Y");
		require_once('php/dao/PublicityDao.php');
		require_once('php/dao/LoginDao.php');
		$pd=new PublicityDao;
		$user_id=$_SESSION['u_sid'];
		$loginDao=new LoginDao;
		$user_arr=$loginDao->getUserName($user_id);
		$study=$pd->publicityStudy($user_id,$sc_annual);
		$appraisal=$pd->publicityAppraisal($user_id,$sc_annual);
		$dormitory=$pd->publicityDormitory($user_id,$sc_annual);
		$spiritual_reward=$pd->publicitySpiritualReward($user_id,$sc_annual);
		$activity_comp=$pd->publicityActivityComp($user_id,$sc_annual);
		$activity_role=$pd->publicityActivityRole($user_id,$sc_annual);
		$work_cadre=$pd->publicityWorkCadre($user_id,$sc_annual);
		$work_reward=$pd->publicityWorkReward($user_id,$sc_annual);
		$scie_tech_comp=$pd->publicityScieTechComp($user_id,$sc_annual);
		$paper=$pd->publicityPaper($user_id,$sc_annual);
		$invention=$pd->publicityInvention($user_id,$sc_annual);
		$scie_tech_project=$pd->publicityProject($user_id,$sc_annual);
		$practice=$pd->publicityPractice($user_id,$sc_annual);
		function printTable($arr){
			for($i=0;$i<count($arr);$i++){
				echo "<tr>";
					for($j=0;$j<count($arr[$i]);$j++)
						echo "<td>{$arr[$i][$j]}</td>";
				echo "</tr>";
			}
		}
	?>
	<div class="main-box">
		<center>
		<div class="main">
			<center>
				<span class="time_area">8月28日 13:58</span>
			</center>
			<div align="left" class="tip">
				<img src="image/logo.png"/>
				<div class="tip_tri_l">
				</div>
				<div class="tip_body">
					Welcome here!<br/><?=$user_arr[0]->user_name;?>，这个页面会有咱们级队所有同学申请项目的审核结果公示，对了，主页君，审核结果什么时候能出来
				</div>
			</div>
			<div align="right" class="tip">
				<div class="tip_body r">
					哈哈哈哈~~通知还没下来，先不要着急哈
				</div>
				<div class="tip_tri_r">
				</div>
				<img src="image/torch.png"/>
			</div>
			<div align="right" class="tip">
				<div class="tip_body r">
					如果表格数据太多，不方便找的话，可以使用快捷键Ctrl+F输入关键字查找你想要的内容
				</div>
				<div class="tip_tri_r">
				</div>
				<img src="image/torch.png"/>
			</div>
			<center>
				<span class="time_area">8月28日 14:22</span>
			</center>
			<div align="left" class="tip">
				<img src="image/logo.png"/>
				<div class="tip_tri_l">
				</div>
				<div class="tip_body">
					咦。正式申请阶段也可以看到其他人的申请情况啊~~
				</div>
			</div>
			<div align="right" class="tip">
				<div class="tip_body r">
					是呀，<?=$user_arr[0]->user_name;?>童鞋加油！
				</div>
				<div class="tip_tri_r">
				</div>
				<img src="image/torch.png"/>
			</div>
			<div align="left" class="tip">
				<img src="image/logo.png"/>
				<div class="tip_tri_l">
				</div>
				<div class="tip_body">
					加油！期待获得满意的结果！
				</div>
			</div>
			<center>
				<span class="time_area">9月8日 18:49</span>
			</center>
			<div align="right" class="tip">
				<div class="tip_body r">
					咱们的评审还在进行中， 查看当前排名~<br><a href="order.php" target="_blank">点击这里</a>
				</div>
				<div class="tip_tri_r">
				</div>
				<img src="image/torch.png"/>
			</div>
		</div>
		<div class="main">
		<div align="left"><div class="triangle"></div><span class="publicity_title">奖学金申请及审核情况</span></div>
		<h3>学习优秀奖学金</h3>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>申请类型</th>
					<th>成绩比率</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($study);
				?>
			</tbody>
		</table>
		<h3>精神文明奖学金</h3>
		<h4>民主评议</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>申请类型</th>
					<th>评议等级</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($appraisal);
				?>
			</tbody>
		</table>
		<h4>文明寝室</h4>
		<table>
			<thead>	
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>申请类型</th>
					<th>寝室得分</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($dormitory);
				?>
			</tbody>
		</table>
		<h4>精神文明</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>项目</th>
					<th>级别</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($spiritual_reward);
				?>
			</tbody>
		</table>
		<h3>文体活动奖学金</h3>
		<h4>文体竞赛</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>竞赛名称</th>
					<th>级别</th>
					<th>奖项等级</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($activity_comp);
				?>
			</tbody>
		</table>
		<h4>主持人或演员</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>活动名称</th>
					<th>担任角色</th>
					<th>级别</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($activity_role);
				?>
			</tbody>
		</table>
		<h3>社会工作奖学金</h3>
		<h4>学生工作</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>申请类型</th>
					<th>任期时长</th>
					<th>职务名称</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($work_cadre);
				?>
			</tbody>
		</table>
		<h4>个人荣誉</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>荣誉称号</th>
					<th>级别</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($work_reward);
				?>
			</tbody>
		</table>
		<h3>科技创新奖学金</h3>
		<h4>科创竞赛</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>竞赛名称</th>
					<th>级别</th>
					<th>获奖等级</th>
					<th>排序</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($scie_tech_comp);
				?>
			</tbody>
		</table>
		<h4>学术论文</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>论文名称</th>
					<th>发表级别</th>
					<th>排序</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($paper);
				?>
			</tbody>
		</table>
		<h4>专利发明</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>专利名称</th>
					<th>排序</th>
					<th>分数</th>
					<th>审核状态</th>		
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($invention);
				?>
			</tbody>
		</table>
		<h4>创新项目</h4>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>项目名称</th>
					<th>级别</th>
					<th>评定等级</th>
					<th>排序</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($scie_tech_project);
				?>
			</tbody>
		</table>
		<h3>社会实践奖学金</h3>
		<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>实践名称</th>
					<th>实践类型</th>
					<th>团队奖励</th>
					<th>个人奖项</th>
					<th>担任角色</th>
					<th>分数</th>
					<th>审核状态</th>
					<th>审核备注</th>
				</tr>
			</thead>
			<tbody>
				<?php
					printTable($practice);
				?>
			</tbody>
		</table>
		</div>
		</center>
	</div>
</body>
</html>