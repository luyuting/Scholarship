<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>精神文明奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/spiritual.css" />
	<link rel="stylesheet" href="css/wrapper.css"/>
	<script src="js/ajax_table.js"></script>
	<script src="js/apply.js"></script>
	<script src="js/spiritual.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('check.php');
	?>
	<div class="cover" id="cover-spiritual">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_spiritual">
				<div class="wrapper">
					<label>申请类型</label>
					<select id='spiritual_name'>
					</select>
				</div>
				<div class="wrapper">
					<label>项目</label>
					<select id='spiritual_item'>
					</select>
				</div>
				<div class="wrapper">
					<label>级别</label>
					<select id='spiritual_rate'>
					</select>
				</div>
				<div class="wrapper">
					<label>获评时间</label>
					<input type="date" id="spiritual_time"/>
				</div><hr>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyReward()"/>
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-spiritual')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div class="main-box">
		<div id="apply_spiritual" class="main">
			<big><strong>精神文明奖学金申请</strong></big>
			<div class="spiritual_content">
				<label>民主评议排名</label> 
				<select id="spiritual_appraisal_ratio"> 
					<option>7%</option>
				</select>
				<input class="button-success" type="button" id="btn_appraisal" value="点击申请" onclick="applyAppraisal()"><hr class="hr">
				<label>文明寝室得分</label>
				<input type="text" id="spiritual_dormitory_score" class="score"/>
				<input class="button-success" type="button" id="btn_dormitory" value="点击申请">
			</div>
		</div>
		<div class="main-apply">
		<div class="main-apply-table">
			<span>民主评议&nbsp;&&nbsp;文明寝室</span><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>申请类型</th>
						<th>排名比率</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>
				</thead>
				<tbody id="spiritual_appraisal_info">
				</tbody>
			</table><hr>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>申请类型</th>
						<th>寝室得分</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>
				</thead>
				<tbody id="spiritual_dormitory_info">
				</tbody>
			</table><hr>
			</center>
		</div>
		<div class="main-apply-table">
			<span>精神文明</span><img src="image/add.jpg" onclick="add('cover-spiritual')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>申请类型</th>
						<th>内容</th>
						<th>级别</th>
						<th>获评时间</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>
				</thead>
				<tbody id="spiritual_reward_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delReward(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		</div>
		</div>
	</div>
</body>
</html>