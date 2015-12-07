<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>社会工作奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/work_admin.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/work_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="work_admin" class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>职位</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="work_admin_info">
					<tr>
						<td><input type="checkbox"/></td>
						<td>校学生会副主席</td>
						<td>15</td>
					</tr>
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="setWorkScore()"><img src="image/insert.png" title="一键插入"/>一键插入</span>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="work_praise" class="main-table">
		<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>级别</th>
						<th>荣誉称号</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="work_reward_info">
					<tr>
						<td><input type="checkbox" name="work_reward_info_operate"/></td>
						<td>国家级</td>
						<td>优秀团干部，优秀学生干部</td>
						<td>20</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="work_reward_info_operate"/></td>
						<td>省级</td>
						<td>优秀团干部，优秀学生干部</td>
						<td>15</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="work_reward_info_operate"/></td>
						<td>市级</td>
						<td>优秀团干部，优秀学生干部</td>
						<td>10</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="work_reward_info_operate"/></td>
						<td>校级</td>
						<td>优秀团干部，优秀学生干部</td>
						<td>7</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="work_reward_info_operate"/></td>
						<td>学部（学院）级</td>
						<td>优秀团干部，优秀学生干部</td>
						<td>4</td>
					</tr>
				</tbody>
			</table>
		</center>
		<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="setWorkReward()"><img src="image/insert.png" title="一键插入"/>一键插入</span>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
</body>
</html>