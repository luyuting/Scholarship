<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>学习优秀奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/study.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/study.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('check.php');
	?>
	<div class="main-box">
		<div id="apply_study" class="main">
			<big><strong>学习优秀奖学金申请</strong></big>
			<center>
			<div class="study_content">
				<img src="image/study.gif"/>
				<label>请选择成绩排名</label>
				<select id="study_ratio">
				</select>
			</div>
			</center>
			<input id="apply_btn" class="button-success" type="button" value="点击申请"><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>申请类型</th>
						<th>成绩排名比率</th>
						<th>审核状态</th>
					</tr>
				</thead>
				<tbody id="apply_study_info">
				</tbody>
			</table>
			</center>
		</div>
	</div>
</body>
</html>