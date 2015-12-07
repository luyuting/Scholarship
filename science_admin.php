<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>科技创新奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/science_admin.css" />
	<script src="js/ajax_table.js"></script>
	<script src="js/science_admin.js"></script>
</head>
<body>
	<?php include('nav_admin.php');?>
	<div class="main-box">
		<div id="science_comp_admin" class="main">
			<big><strong>科技创新竞赛基本设置</strong></big><hr>
			<div id="science_comp" class="science_content checkbox_content">
				<div>
					<label>科技创新竞赛项目名称</label>
					<input type="text" id="science_comp_name"/>
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
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechComp()"/><hr>
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
				<tbody id="science_comp_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delComp(this,getScieTechComp)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="competition_score" class="main">
			<big><strong>科技创新竞赛分数设置</strong></big><hr>
			<div id="comp_score" class="science_content float_content">
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
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechCompScore()"/><hr>
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
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechCompScore)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="competition_ratio" class="main">
			<big><strong>科技创新团队成员分数比率设置</strong>&nbsp;(人数>3时)</big><hr>
			<div id="comp_ratio" class="science_content float_content">
				<div>
					<label>成员类别</label>
					<select>
						<option value="0-25%">0-25%</option>
						<option value="26%-75%">26%-75%</option>
						<option value="76%-100%">76%-100%</option>
					</select>
				</div>
				<div>
					<label>分数系数</label>
					<input type="text" class="ratio">%
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechCompRatio()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>成员类别</th>
						<th>分数系数</th>
					</tr>
				</thead>
				<tbody id="comp_ratio_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechCompRatio)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="science_paper_admin" class="main">
			<big><strong>学术论文基本设置</strong></big><hr>
			<div id="science_paper" class="science_content checkbox_content">
				<div>
					<label>论文发表情况</label>
					<select>
						<option>核心期刊</option>
						<option>非核心期刊以及国际学术会议</option>
						<option>国家学术会议</option>
					</select>
				</div>
				<div>
					<label>作者顺序</label>
					<div class="checkbox-container">
						<input type="checkbox" name="paper-order" value="第一作者"/>第一作者<br>
						<input type="checkbox" name="paper-order" value="第二作者"/>第二作者<br>
						<input type="checkbox" name="paper-order" value="第三作者"/>第三作者<br>
						<input type="checkbox" name="paper-order" value="第四作者"/>第四作者<br>
						<input type="checkbox" name="paper-order" value="其他作者"/>其他作者<br>
					</div>
				</div>
				<div>
					<label>分数设定</label>
					<input type="text" class="score"/>
				</div>
				<div>
					<label>系数设定</label>
					<select>
						<option value=1>100%</option>
						<option value=0.5>50%</option>
					</select>
				</div>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechPaper()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>论文发表情况</th>
						<th>作者顺序</th>
						<th>分数</th>
						<th>系数</th>
					</tr>
				</thead>
				<tbody id="science_paper_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechPaper)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="science_paper_enbody" class="main">
			<big><strong>学术论文收录情况设置</strong></big><hr>
			<div id="paper_enbody" class="science_content float_content">
				<div>
					<label>论文收录情况</label>
					<select>
						<option>被EI、SCI收录</option>
					</select>
				</div>
				<div>
					<label>分数设定</label>
					<input type="text" class="score"/>
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechPaperEnbody()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>论文收录情况</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="paper_enbody_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechPaperEnbody)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="science_invention_admin" class="main">
			<big><strong>发明专利基本设置</strong></big><hr>
			<div id="science_invention" class="science_content float_content">
				<div>
					<label>专利类型</label>
					<select>
						<option>发明型专利</option>
						<option>实用型专利</option>
						<option>外观型专利</option>
					</select>
				</div>
				<div>
					<label>分数设定</label>
					<input type="text" class="score"/>
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechInvention()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>专利类型</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="science_invention_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechInvention)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
		<div id="science_project_admin" class="main">
			<big><strong>创新创业项目基本设置</strong></big><hr>
			<div id="science_project" class="science_content float_content">
				<div>
					<label>评定等级</label>
					<select>
						<option>优</option>
						<option>良</option>
						<option>中</option>
						<option>及格</option>
					</select>
				</div>
				<div>
					<label>分数设定</label>
					<input type="text" class="score"/>
				</div><hr>
			</div>
			<input type="button" class="button-success" value="点击添加" onclick="setScieTechProj()"/><hr>
		</div>
		<div class="main-table">
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>项目类型</th>
						<th>评定等级</th>
						<th>分数</th>
					</tr>
				</thead>
				<tbody id="science_project_info">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>
				<span class="table-operate" onclick="delItemScore(this,getScieTechProj)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
		</div>
	</div>
</body>
</html>