<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>主页</title>
	<style>
		hr{
			width:100%;
			clear:both;
		}
		p a{
			color:#0072ac;
			text-decoration:none;
		}
		p a:hover{
			text-decoration:underline;
		}
		.hr{
			border-top:3px groove #efefef;
			border-bottom:1px solid #666;
			padding:0;
			margin:10px 0;
		}
		.notice-title{
			float:left;
			font-size:30px;
			line-height:60px;
			margin:0 0 10px 20px;
		}
		.notice-sub-title img{
			width:40px;
			vertical-align:middle;
			margin:0 10px;
		}
		.notice-sub-title{
			float:left;
			font-size:20px;
		}
		.notice-content{
			width:100%;
			background-color:#e6e6e6;
			border-radius:10px;
			padding:10px 0;
			margin-bottom:10px;
			font-size:14px;
		}
		.main-box .main{
			margin-top:90px;
			width:980px;
		}
		.main span{
			padding:0 10px;
		}
		table{
			margin:10px auto;
			text-align:center;
			border-collapse: collapse;
			border-spacing: 0;
			clear:both;
			font-size:14px;
		}
		tr{
			background-color: #FFFFE3 !important;
		}
		th{
			background:#5ea5e6;
			color:#fff;
			text-shadow:1px 1px 0 #666;
		}
		td,th{
			padding:5px 50px;
			border:2px solid #f8f2f2;
		}
		.bottom{
			padding:6px 0;
			color:#fff;
			text-shadow:1px 1px 0 #888;
			margin:10px 10px 10px 180px;
			border-radius:10px;
			border:1px solid #aaa;
			background:rgba(0,0,0,0.3);
			font-size:12px;
		}
	</style>
</head>
<body>
	<?php 
		include('nav.php');
		require_once('php/dao/LoginDao.php');
		$user=$_SESSION['u_sid'];
		$loginDao=new LoginDao;
		$user_arr=$loginDao->getUserName($user);
	?>
	<div class="main-box">
		<center>
		<div class="main">
			<div class="notice-title">欢迎你！<?=$user_arr[0]->user_name;?></div><hr class="hr">
			<div class="notice-sub-title"><img src="image/notice.png"/>最新消息</div><hr>
			<div class="notice-content">
			<table>
			<thead>
				<tr>
					<th>奖学金评审阶段</th>
					<th>开始时间</th>
					<th>结束时间</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>系统测试（预申请）</td>
					<td>2015-08-05 8:00</td>
					<td>2015-08-16 17:00</td>
				</tr>
				<tr>
					<td>奖学金申请（正式）</td>
					<td>2015-08-29 8:00</td>
					<td>2015-09-07 22:00</td>
				</tr>
				<tr>
					<td>材料提交</td>
					<td>2015-09-07 8:00</td>
					<td>2014-09-07 20:00</td>
				</tr>
				<tr>
					<td>结果公示</td>
					<td>2015-09-07 8:00</td>
					<td>待定</td>
				</tr>
			</tbody>
		</table>
		<div align='left'>
			<p>【奖学金紧急通知】：2015-9-9 20:00-22:45，2014级开放修改精神文明奖学金中文体竞赛单项。</p>
			<p>【社会工作奖学金】：收到同学反映许多人社会工作奖学金申请时填写有问题，在此说明一下：<span style="color:red;">社会工作每个学期至多算两个职务，第二职务分数减半，满一学期不满一学年的分数减半，
			不满一学期不加分，由于一学年即春、秋两学期，比如在秋季学期第一职务选择了班长任期一学年，那么在春季学期对应序次职务就不必填写，即春秋两季同一序次的职务任期加起来至多为一学年，
			当然，在填写时也可以将一学年的拆为两个学期，根据自身实际情况寻求总分最高的组合，组合示例：将班长分秋季学期第一职务和春季学期第二职务，对应的时长应均填写一学期。</span>由于系统自身逻辑上的问题，给大家在理解上造成了不便，
			望多包涵，如果没有及时更正，多余项在审核时不会通过。同时也感谢同学们的热心提醒。</p>
			<p>【奖学金注意事项】：科创、文体竞赛名称重新整理后相关竞赛申请项目已经全部删除，正式申请时请同学们重新申请，测试阶段中有些比赛没有显示的等级已重新添加。<span style="color:red;">
			再次声明：文体竞赛中得分计算的下拉框中，最高分的含义指该奖项的加分计算全分，非最高分得分减半，文体竞赛中同一比赛项目获得不同级别奖项分数可以累计，奖项加分最高的一项可以计算全分，其他的全部减半（选择“非最高分”）；如果该比赛项目只获得一个级别的奖项，应默认为最高分，选非最高分会使分数降低。</span></p>
			<p>【精神文明奖学金】：文明寝室一项应输入学校下发的卫生检查表中的最终平均分（满分10分），系统计算得分是该分数乘以2，请所有申请精神文明奖学金的同学注意重新填写。</p>
			<p>【社会实践奖学金】：根据学部2015年公示的优秀学生奖学金评选方案补充说明，同年的寒假或暑假，参与多个实践团队获奖的，只能按一个团队计算。系统已经于8月14日做出修改，并在测试阶段结束后删除了不符合要求申请项目，请同学们注意重新添加。</p>
			<p>【奖学金注意事项】：如果项目无法录入，请刷新页面检查登录状态，长时间离开页面登录状态将失效，须重新登录；竞赛务必录入团队人数，否则得分计算不正确审核将不予通过。</p>
			<p>【文体活动奖学金】：得分计算说明，文体竞赛中同一比赛不同级别分数可以累计，该比赛下文体得分最高的奖项级别计全分，其他非最高分奖项得分减半。</p>
			<p>【科技创新奖学金】：2014级论文、专利多人共同参与必须填写协商分数。</p>
			<p>【科技创新奖学金】：<br>
				<span style="color:red;">1、MCM奖项Finalist & Outstanding Winner 等同于国家级以上竞赛一等奖，加20分；<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meritorious Winner 等同于国家级以上竞赛二等奖，加17分；<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Honorable Mention 等同于国家级以上竞赛三等奖，加14分；<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Successful Participant 等同于国家级以上竞赛不包含上述等级的其他奖项，加6分；<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unsuccessful 等同于国家级以上竞赛报名即参赛且没获奖，不加分。<br>
				</span><span>
				2、核心期刊（遴选）不算核心期刊。<br>
				</span><span>
				3、发表论文作者中必须有指导老师，并提交由论文指导老师签字确认的相关证明材料，经公示无异议后可加分。<br>
				</span><span>
				4、各类比赛级别及获奖等级由学部奖学金评审委员会根据专业特点、学生参与程度等情况进行认定。<br>
				</span>
			</p>
		</div>
		</div>
		<?php 
			date_default_timezone_set('PRC');
			$now=Date("Y年m月d日");
			echo "<div align='right'>本次登录时间：{$now}</div>";
		?>
		</div>
		</center>
	</div>
	<center>
	<div class="bottom">
		Copyright © 2014 - 2015 Torch.All Rights Reserved.<br>
		Torch职业生涯规划团队 版权所有
	</div>
	</center>
</body>
</html>