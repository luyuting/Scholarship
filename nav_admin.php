<!--<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>奖学金左侧导航栏</title>
	<link rel="stylesheet" href="css/base.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<script src="js/nav.js"></script>
	<script src="jquery.min.js"></script>
</head>
<body>-->
<?php 
	@session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>alert('您未登录，请先登录！');location.href='login_admin.html';</script>";
		exit;
	}
?>
	<link rel="stylesheet" href="css/base.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/nav.js"></script>
	<div id="nav-title">
		<img src="image/torch-logo.png"><span>奖&nbsp;学&nbsp;金&nbsp;系&nbsp;统</span>
		<a href="logout_admin.php">【注销】</a>
	</div>
	<div id="nav">
	<center>
		<ul class="nav-menu">
			<li><a href="main_admin.php">首页</a></li>
			<li><a href="scho_admin.php">比例设置</a></li>
			<li><a href="#" id="nav_sc_type" onclick="listPlay()">单项奖学金</a>
			<ul id="nav_list" class="list">
				<li><a href="#" id="study_nav">学习优秀奖学金</a></li>
				<li><a href="spiritual_admin.php" id="spiritual_nav">精神文明奖学金</a></li>
				<li><a href="activity_admin.php" id="activity_nav">文体活动奖学金</a></li>
				<li><a href="work_admin.php" id="work_nav">社会工作奖学金</a></li>
				<li><a href="science_admin.php" id="science_nav">科技创新奖学金</a></li>
				<li><a href="practice_admin.php" id="practice_nav">社会实践奖学金</a></li>
			</ul></li>
		</ul>
	</center>
	</div>
<!--</body>
</html>-->