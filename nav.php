<?php 
	@session_start();
	if(!isset($_SESSION['u_sid'])){
		echo "<script>alert('您未登录，请先登录！');location.href='login.html';</script>";
		exit;
	}
?>
	<link rel="stylesheet" href="css/base.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/nav.js"></script>
	<script>
	$(function(){
		if($.browser.safari){
			$("input[type=date]").each(function(){this.type="text";this.placeholder="年-月-日";});
		}
	})
	</script>
	<div id="nav-title">
		<img src="image/torch-logo.png"><span>奖&nbsp;学&nbsp;金&nbsp;系&nbsp;统</span>
		<a href="logout.php">【注销】</a><a href="alter_password.php">修改密码</a><a href="notice.php">我的主页</a>
	</div>
	<div id="nav">
	<center>
		<ul class="nav-menu">
			<li><a href="publicity.php">奖学金公示<!--<span class="new">#new#</span>--></a></li>
			<li><a href="#" id="nav_sc_type" onclick="listPlay()" >单项奖学金</a>
			<ul id="nav_list" class="list">
				<li><a href="study.php">学习优秀奖学金</a></li>
				<li><a href="spiritual.php">精神文明奖学金</a></li>
				<li><a href="activity.php">文体活动奖学金</a></li>
				<li><a href="work.php">社会工作奖学金</a></li>
				<li><a href="science.php">科技创新奖学金</a></li>
				<li><a href="practice.php">社会实践奖学金</a></li>
			</ul></li>
			<li><a href="gather.php">奖学金汇总</a></li>
			<li><a href="history.php">申请历史</a></li>
		</ul>
	</center>
	</div>