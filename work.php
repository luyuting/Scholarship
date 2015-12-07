<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>社会工作奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/work.css" />
	<link rel="stylesheet" href="css/wrapper.css"/>
	<script src="js/work.js"></script>
	<script src="js/ajax_table.js"></script>
	<script src="js/apply.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('check.php');
	?>
	<div class="main-box">
	<div class="cover" id="cover-work">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_work">
				<div class="wrapper">
					<label>申请类型</label>
					<select id="work_level">
						<option>秋季学期第一职务</option>
						<option>秋季学期第二职务</option>
						<option>春季学期第一职务</option>
						<option>春季学期第二职务</option>
					</select>
				</div>
				<div class="wrapper">
					<label>职务任期</label>
					<select id="work_last_time">
						<option>一学年</option>
						<option>一学期</option>
					</select>
				</div>
				<div class="wrapper">
					<label>起始日期</label>
					<input type="date" id="work_begin_time"/>
				</div>
				<div class="wrapper">
					<label>结束日期</label>
					<input type="date" id="work_end_time"/>
				</div>
				<div class="wrapper">
					<label>选择代号</label>
					<select id="work_code">
					</select>
				</div>
				<div class="wrapper">
					<label>职位</label>
					<select id="work_position">
					</select>
				</div>
				<div class="textarea-wrapper">
					<label>备注</label>
					<textarea rows="6" cols="80" id="work_remark"></textarea>
				</div>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyWorkCadre()" />
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-work')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div class="cover" id="cover-work-reward">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_reward">
				<div class="wrapper">
					<label>荣誉称号</label>
					<select id="reward_name">
						<option>优秀团干部</option>
						<option>优秀学生干部</option>
					</select>
				</div>
				<div class="wrapper">
					<label>获奖等级</label>
					<select id="reward_rate">
						<option>国家级</option>
						<option>省级</option>
						<option>市级</option>
						<option>校级</option>
						<option>学部（学院）级</option>
					</select>
				</div>
				<div class="wrapper">
					<label>获奖日期</label>
					<input type="date" id="reward_time"/>
				</div>
				<hr>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyWorkReward()"/>
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-work-reward')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div id="work" class="main-apply">
		<big><strong>社会工作奖学金</strong></big><hr>
		<div class="main-apply-table">
			<span>学生工作</span><img src="image/add.jpg" onclick="add('cover-work')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>类型</th>
						<th>职务任期</th>
						<th>职位</th>  
						<th>任期（起）</th>
						<th>任期（止）</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="work_cadre_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delWorkCadre(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		</div>
	</div>
	<div class="main-table">
		<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>代号</th>
						<th>职位</th>  
						<th>分数</th>
					</tr>  
				</thead>
				<tbody id="work_info">
				</tbody>
			</table><hr>
		</center>
	</div>
	<div class="main-apply">
		<div class="main-apply-table">
			<span>个人荣誉</span><img src="image/add.jpg" onclick="add('cover-work-reward')"/><hr>
			<center>
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>荣誉称号</th>  
							<th>级别</th>
							<th>获奖日期</th>
							<th>分数</th>
							<th>审核状态</th>
						</tr>  
					</thead>
					<tbody id="work_reward_info">
					<tr>
					<tr>
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delWorkReward(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
	</div>
	</div>
</body>
</html>