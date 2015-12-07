<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>奖学金比例设置</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/scho_admin.css" />
	<script src="js/scho_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="scho_admin" class="main">
			<big><strong>奖学金基本设置</strong></big><hr>
			<div class="scho-content">
			<span class="label"><label>请选择奖学金类型</label></span>
			<select id="sc_name">
				<option value="一等学习优秀奖学金">一等学习优秀奖学金</option>
				<option value="二等学习优秀奖学金">二等学习优秀奖学金</option>
				<option value="精神文明奖学金">精神文明奖学金</option>
				<option value="社会工作奖学金">社会工作奖学金</option>
				<option value="文体活动奖学金">文体活动奖学金</option>
				<option value="科技创新奖学金">科技创新奖学金</option>
				<option value="社会实践奖学金">社会实践奖学金</option>
			</select><hr>
			<span class="label"><label>请设置获得奖学金的人数比率</label></span>
			<input type="text" class="ratio" id="sc_ratio">%
			</div>
			<input type="button" class="button-success" value="点击完成" onclick="setScholarship();"><hr>
		</div>
		<div id="scho_table" class="main">
			<center>
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>奖学金名称</th>
							<th>评选年级</th>
							<th>评选年份</th>
							<th>获奖比例</th>
						</tr>
					</thead>
					<tbody id="info">
					</tbody>
				</table>
			</center><hr>
			<input type="button" class="button-failed" value="点击删除"/><hr>
		</div>
	</div>
</body>
</html>