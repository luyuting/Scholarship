<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>精神文明奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/spiritual_admin.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/spiritual_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="spiritual_appraisal_admin" class="main">
			<big><strong>民主评议基本设置</strong></big><hr>
			<div id="spiritual_appraisal" class="spiritual_content float_content">
				<div>
					<label>评议级别</label>
					<select>
						<option value="0-7%">0-7%</option>
						<option value="8%-20%">8%-20%</option>
						<option value="21%-40%">21%-40%</option>
					</select>
				</div>
				<div>
					<label>分数</label>		
					<input type="text" class="score">
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setSpirAppraisalScore()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>评议级别</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="spiritual_appraisal_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" id="checkall" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getSpirAppraisalScore)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>项目</th>
						<th>内容</th>
						<th>级别</th>
						<th>分数</th>
						<th>系数</th>
					</tr>
				</thead>
				<tbody id="spiritual_admin_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="setSpiritualScore()"><img src="image/insert.png" title="一键插入"/>一键插入</span>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getSpiritualScore)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
	</div>
</body>
</html>