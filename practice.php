<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>社会实践奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/wrapper.css"/>
	<script src="js/ajax_table.js"></script>
	<script src="js/apply.js"></script>
	<script src="js/practice.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('check.php');
	?>
	<div class="main-box">
	<div class="cover" id="cover-practice">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_practice">
				<div class="wrapper">
					<label>名称</label>
					<input type="text" id="practice_title"/>
				</div><hr>
				<div class="wrapper">
					<label>类型</label>
					<select id="practice_name">
					</select>
				</div>
				<div class="wrapper">
					<label>团队奖励</label>
					<select id="practice_team">
					</select>
				</div>
				<div class="wrapper">
					<label>个人奖项</label>
					<select id="practice_person">
					</select>
				</div>
				<div class="wrapper">
					<label>担任角色</label>
					<select id="practice_role">
					</select>
				</div>
				<div class="textarea-wrapper">
					<label>实践备注</label>
					<textarea rows="6" cols="80" id="practice_remark"></textarea>
				</div>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyPractice()"/>
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-practice')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div id="practice" class="main-apply">
		<big><strong>社会实践奖学金</strong></big><hr>
		<div class="main-apply-table">
			<span>社会实践</span><img src="image/add.jpg" onclick="add('cover-practice')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>名称</th>  
						<th>类型</th>
						<th>团队奖励</th>
						<th>个人奖项</th>
						<th>担任角色</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="practice_apply_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delPractice(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div><hr>
		</div>
	</div>
	</div>
</body>
</html>