<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>精神文明奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/audit.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/spiritual_audit.js"></script>
	<script src="js/audit.js"></script>
</head>
<body>
<?php include('nav_audit.php');?>
	<div class="main-box">
		<div id="spiritual_audit" class="main">
			<big><strong>精神文明奖学金</strong></big>
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
							<th>申请类型</th>
							<th>评议等级</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="spiritual_appraisal_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setAppraisalInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setAppraisalInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setAppraisalInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
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
							<th>申请类型</th>
							<th>寝室得分</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="spiritual_dormitory_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setDormitoryInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setDormitoryInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setDormitoryInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span><hr>
				<span class="table-operate" onclick="setAppraisal(this,'0-7%')"><img src="image/edit.png" title="设置民主评议（0-7%）"/>设置民主评议（0-7%）</span>
				<span class="table-operate" onclick="setAppraisal(this,'8%-20%')"><img src="image/edit.png" title="设置民主评议（8%-20%）"/>设置民主评议（8%-20%）</span>
				<span class="table-operate" onclick="setAppraisal(this,'21%-40%')"><img src="image/edit.png" title="设置民主评议（21%-40%）"/>设置民主评议（21%-40%）</span>
				<span class="table-operate" onclick="setDormitoryReward(this)"><img src="image/edit.png" title="设置千优寝室"/>设置千优寝室</span>
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
							<th>申请类型</th>
							<th>内容</th>
							<th>级别</th>
							<th>时间</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="spiritual_reward_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setRewardInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setRewardInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setRewardInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
			</div><hr>
			</div>
		</div>
	</div>
</body>
</body>
</html>