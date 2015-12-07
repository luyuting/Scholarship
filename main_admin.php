<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理员-基本设置</title>
	<link rel="stylesheet" href="css/main_admin.css" />
	<script src="js/main_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="setting" class="main"> 
			<div class="setting-title">欢迎你！</div><hr class="hr">
			<div class="setting-sub-title"><img src="image/notice.png"/><span>修改设置</span></div><hr>
			<center>
			<div class="setting-content">
				<span class="setting-content-item">
					<label>学部</label>
					<select>
						<option>管理与经济学部</option>
					</select>
				</span>
				<span class="setting-content-item">
					<label>年级</label>
					<select id="ad_grade">
					</select>
				</span>
				<span class="setting-content-item">
					<label>年度</label>
					<select id="ad_annual">
					</select>
				</span>
				<input type="button" class="button-success" value="确定修改"/>
			</div>
			</center><hr>
			<span>当前设置</span>
			<center>
				<div class="setting-current">
					<span>学部:管理与经济学部</span>
					<span id="ad_grade_text">年级:管经2013级</span>
					<span id="ad_annual_text">年度:2014年度</span>
				</div>
			</center><hr>
		</div>
	</div>
</body>
</html>