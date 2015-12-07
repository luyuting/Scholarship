<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>文体活动奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/wrapper.css"/>
	<script src="js/ajax_table.js"></script>
	<script src="js/apply.js"></script>
	<script src="js/activity.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('activity_check.php');
	?>
	<div class="main-box">
	<div class="cover" id="cover-comp">	
		<div class="add-box">
				<div class="add-title"><p>添加项目</p></div>
				<form class="add-content" id="form_comp">
					<div class="wrapper">
						<label>竞赛名称</label>
						<select id="comp_name">
							<option>啦啦操</option>
						</select>
					</div>
					<div class="wrapper">
						<label>级别</label>
						<select id="comp_rate">
							<option>国家级及以上</option>
						</select>
					</div>
					<div class="wrapper">
						<label>获奖等级</label>
						<select id="comp_prize">
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
					<div class="wrapper">
						<label>是否替补</label>
						<select id="comp_role">
							<option>否</option>
							<option>是</option>
						</select>
					</div>
					<div class="wrapper">
						<label>得分计算</label>
						<select id="comp_rule">
							<option>最高分</option>
							<option>非最高分</option>
						</select>
					</div>
					<div class="wrapper">
						<label>打破记录</label>
						<select id="comp_break">
							<option>否</option>
							<option>是</option>
						</select>
					</div>
					<div class="wrapper">
						<label>团队人数</label>
						<input type="text" id="comp_team">
					</div>
					<div class="wrapper">
						<label>获奖日期</label>
						<input type="date" id="comp_time">
					</div>
					<div class="textarea-wrapper">
						<label>获奖备注</label>
						<textarea rows="6" cols="80" id="comp_remark"></textarea>
					</div>
					<div class="button-wrapper">
						<input type="button" class="button-success" value="点击保存" onclick="applyActivityComp()"/>
						<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-comp')">
					</div><hr>
				</form>
		</div>
	</div>
		<div class="cover" id="cover-role">	
		<div class="add-box">
				<div class="add-title"><p>添加项目</p></div>
				<form class="add-content" id="form_role">
					<div class="wrapper">
						<label>活动名称</label>
						<input type="text" id="activity_name"/>
					</div>
					<div class="wrapper">
						<label>活动日期</label>
						<input type="date" id="activity_time">
					</div>
					<div class="wrapper">
						<label>担任角色</label>
						<select id="activity_role">
							<option>主持人</option>
							<option>演员</option>
						</select>
					</div>
					<div class="wrapper">
						<label>活动级别</label>
						<select id="activity_rate">
							<option>校级</option>
							<option>学部（学院）级</option>
						</select>
					</div>
					<div class="wrapper">
						<label>主办单位</label>
						<input type="text" id="activity_host">
					</div>
					<div class="textarea-wrapper">
						<label>活动备注</label>
						<textarea rows="6" cols="80" id="activity_remark"></textarea>
					</div>
					<div class="button-wrapper">
						<input type="button" class="button-success" value="点击保存" onclick="applyActivityRole()"/>
						<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-role')">
					</div><hr>
				</form>
		</div>
	</div>
	<div id="activity" class="main-apply">
		<big><strong>文体活动奖学金</strong></big><hr>
		<div class="main-apply-table">
			<span>文体竞赛</span><img src="image/add.jpg" onclick="add('cover-comp')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>竞赛名称</th>  
						<th>级别</th>
						<th>奖项等级</th>
						<th>人数</th>
						<th>担任角色</th>
						<th>打破记录</th>
						<th>得分计算</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="competition_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delActivityComp(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div><hr>
		</div>
		<div class="main-apply-table" id="role">
			<span>主持人或演员</span><img src="image/add.jpg" onclick="add('cover-role')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>活动名称</th>
						<th>级别</th>
						<th>活动日期</th>
						<th>担任角色</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="activity_role_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delActivityRole(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div><hr>
		</div>
	</div>
	</div>
</body>
</html>