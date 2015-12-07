<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>文体活动奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/activity_admin.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/activity_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="activity_comp_admin" class="main">
			<big><strong>文体活动竞赛基本设置</strong></big><hr>
			<div id="activity_comp" class="activity_content checkbox_content">
				<div>
					<label>文体活动竞赛项目名称</label>
					<input type="text" id="activity_comp_name"/>
				</div>
				<div>
					<label>竞赛级别</label>
					<div class="checkbox-container">
						<input type="checkbox" name="comp-rate" value="国家级及以上"/>国家级及以上<br>
						<input type="checkbox" name="comp-rate" value="省级"/>省级<br>
						<input type="checkbox" name="comp-rate" value="市级"/>市级<br>
						<input type="checkbox" name="comp-rate" value="校级"/>校级<br>
						<input type="checkbox" name="comp-rate" value="学部级"/>学部级<br>
					</div>
				</div>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setActivityComp()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>竞赛名称</th>
						<th>竞赛级别</th>
					</tr>
				</thead>
				<tbody id="activity_comp_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delComp(this,getActivityComp)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="competition_score" class="main">
			<big><strong>文体竞赛分数设置</strong></big><hr>
			<div id="comp_score" class="activity_content float_content">
				<div>
					<label>竞赛级别</label>
					<select>
						<option>国家级及以上</option>
						<option>省级</option>
						<option>市级</option>
						<option>校级</option>
						<option>学部级</option>
					</select>
				</div>
				<div>
					<label>获奖等级</label>
					<select>
						<option>第一名</option>
						<option>第二名</option>
						<option>第三名</option>
						<option>第四名</option>
						<option>第五名</option>
						<option>第六名</option>
						<option>一等奖</option>
						<option>二等奖</option>
						<option>三等奖</option>
						<option>优胜奖及其他</option>
						<option>推荐未获奖</option>
					</select>
				</div>
				<div>
					<label>奖项分数</label> 
					<input type="text" class="score"/>
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setActivityCompScore()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>竞赛级别</th>
						<th>获奖等级/名次</th>
						<th>奖项分数</th>
					</tr>
				</thead>
				<tbody id="comp_score_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate"  onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getActivityCompScore)"><img src="image/delete.png" title="删除"/>删除</span>
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
				<tbody id="activity_admin_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="setActivityScore()"><img src="image/insert.png" title="一键插入"/>一键插入</span>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getActivityScore)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
	</div>
</body>
</html>