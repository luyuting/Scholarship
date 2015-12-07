<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>科技创新奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/audit.css"/>
	<script src="js/ajax_table.js"></script>
	<script src="js/science_audit.js"></script>
	<script src="js/audit.js"></script>
</head>
<body>
	<?php include('nav_audit.php');?>
	<div class="main-box">
		<div id="science_audit" class="main">
			<big><strong>科技创新奖学金</strong></big>
			<label>请按学号或姓名选择</label>
				<input type="text" placeholder="请输入学号或姓名查找" id="searchUser"/>
				<input type="button" class="button-success" value="点击查询" onclick="searchByUser()"/>
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
							<th>获奖等级</th>
							<th>排序</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="science_comp_info">
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
							<th>论文名称</th>
							<th>发表级别</th>
							<th>EI、SCI收录</th>
							<th>排序</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="science_paper_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setPaperInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setPaperInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setPaperInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
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
							<th>专利名称</th>
							<th>专利类别</th>
							<th>专利号</th>
							<th>排序</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="science_invention_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setInventionInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setInventionInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setInventionInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
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
							<th>项目名称</th>
							<th>级别</th>
							<th>评定等级</th>
							<th>排序</th>
							<th>分数</th>
							<th>审核状态</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody id="science_project_info">
					</tbody>
				</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate" onclick="schoPass(this,setProjectInfo)"><img src="image/success.png" title="通过"/>通过</span>
				<span class="table-operate" onclick="schoFail(this,setProjectInfo)"><img src="image/fail.png" title="不通过"/>不通过</span>
				<span class="table-operate" onclick="schoRemark(this,setProjectInfo)"><img src="image/remark.png" title="添加备注"/>添加备注</span>
			</div><hr>
			</div>
			</div>
		</div>
	</div>
</body>
</html>