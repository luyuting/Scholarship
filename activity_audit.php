<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>文体活动奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/audit.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/activity_audit.js"></script>
	<script src="js/audit.js"></script>
</head>
<body>
	<?php include('nav_audit.php');?>
	<div class="main-box">
		<div id="study_audit" class="main">
			<big><strong>文体活动奖学金</strong></big>
			<label>请按学号或姓名选择</label>
				<input type="text" placeholder="请输入学号或姓名查找" id="searchUser"/>
				<input type="button" class="button-success" value="点击查询" onclick="searchByUser()"/>
			<div>
			<div>
			<div class="remark">
				<label>备注</label><input type="text" placeholder="未通过原因" maxlength="20"/>
			</div>
			<center>
				<table>
					<thead>
						<tr>
							<th></th>
							<th>学号</th>
							<th>姓名</th>
							<th>竞赛名称</th>
							<th>级别</th>
							<th>奖项等级</th>
							<th>担任角色</th>
							<th>打破记录</th>
							<th>得分计算</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="activity_comp_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setCompInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setCompInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setCompInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
			</div><hr>
			</div>
			<div>
			<div class="remark">
				<label>备注</label><input type="text" placeholder="未通过原因" maxlength="20"/>
			</div>
			<center>
				<table>
					<thead>
						<tr>
							<th></th>
							<th>学号</th>
							<th>姓名</th>
							<th>活动名称</th>
							<th>担任角色</th>
							<th>级别</th>
							<th>活动时间</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="activity_role_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setRoleInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setRoleInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setRoleInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
			</div><hr>
			</div>
		</div>
	</div>
</body>
</html>