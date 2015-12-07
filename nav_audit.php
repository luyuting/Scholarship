<?php 
	@session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>alert('您未登录，请先登录！');location.href='login_audit.html';</script>";
		exit;
	}
?>
	<link rel="stylesheet" href="css/base.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/nav.js"></script>
	<div id="nav-title">
		<img src="image/torch-logo.png"><span>奖&nbsp;学&nbsp;金&nbsp;系&nbsp;统</span>
		<a href="logout_audit.php">【注销】</a><a href="alter_admin_password.php"/>修改密码</a><a href="login.html" target="_blank">修改学生申请</a>
	</div>
	<div id="nav">
	<center>
		<ul class="nav-menu">
			<li><a href="process_audit.php">评审进度</a></li>
			<li><a href="#" id="nav_sc_type" onclick="listPlay()">单项奖学金</a>
			<ul id="nav_list" class="list">
				<li><a href="study_audit.php" id="study_nav">学习优秀奖学金</a></li>
				<li><a href="spiritual_audit.php" id="spiritual_nav">精神文明奖学金</a></li>
				<li><a href="activity_audit.php" id="activity_nav">文体活动奖学金</a></li>
				<li><a href="work_audit.php" id="work_nav">社会工作奖学金</a></li>
				<li><a href="science_audit.php" id="science_nav">科技创新奖学金</a></li>
				<li><a href="practice_audit.php" id="practice_nav">社会实践奖学金</a></li>
			</ul></li>
			<li><a href="main_audit.php">奖学金汇总</a></li>
		</ul>
	</center>
	</div>