<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>科技创新奖学金</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/science.css" />
	<link rel="stylesheet" href="css/wrapper.css" />
	<script src="js/apply.js"></script>
	<script src="js/ajax_table.js"></script>
	<script src="js/science.js"></script>
</head>
<body>
	<?php 
		include('nav.php');
		include('check.php');
	?>
	<div class="cover" id="cover-comp">	
		<div class="add-box">
				<div class="add-title"><p>添加项目</p></div>
				<form class="add-content" id="form_comp">
					<div class="wrapper">
						<label>竞赛名称</label>
						<select id="comp_name">
							<option>“求索杯”英语竞赛</option>
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
						<label>团队人数</label>
						<input type="text" id="comp_team">
					</div>
					<div class="wrapper">
						<label>组内排序</label>
						<select id="comp_team_order">
						</select>
					</div>
					<div class="wrapper">
						<label>担任角色</label>
						<select id="comp_role">
							<option>队长</option>
							<option>队员</option>
						</select>
					</div>
					<div class="wrapper">
						<label>主办单位</label>
						<input type="text" id="comp_host">
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
						<input type="button" class="button-success" value="点击保存" onclick="applyComp()">
						<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-comp')">
					</div><hr>
				</form>
		</div>
	</div>
	<div class="cover" id="cover-paper">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_paper">
				<div class="wrapper">
					<label>论文题目</label>
					<input type="text" id="paper_name"/>
				</div>
				<div class="wrapper">
					<label>期刊名称</label>
					<input type="text" id="paper_journal"/>
				</div>
				<div class="wrapper">
					<label>级别</label>
					<select id="paper_level">
						<option>核心期刊</option>
						<option>非核心期刊以及国际学术会议</option>
						<option>国家学术会议</option>
					</select>
				</div>
				<div class="wrapper">
					<label>EI，SCI收录</label>
					<select id="paper_ie_sci">
						<option>否</option>
						<option>是</option>
					</select>
				</div>
				<div class="wrapper">
					<label>卷号期号</label>
					<input type="text" id="paper_vol"/>
				</div>
				<div class="wrapper">
					<label>出版时间</label>
					<input type="date" id="paper_time"/>
				</div>
				<div class="wrapper">
					<label>作者人数</label>
					<input type="text" id="paper_team_num"/>
				</div>
				<div class="wrapper">
					<label>协商得分</label>
					<input type="text" placeholder="2014级及以后需填写" id="paper_discuss_score"/>
				</div>
				<div class="wrapper">
					<label>第几作者</label>
					<select id="paper_team_order">
						<option>第一作者</option>
						<option>第二作者</option>
						<option>第三作者</option>
						<option>第四作者</option>
						<!--<option>其他作者</option>-->
					</select>
				</div>
				<hr>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyPaper()"/>
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-paper')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div class="cover" id="cover-invention">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_invention">
				<div class="wrapper">
					<label>名称</label>
					<input type="text" id="invention_name"/>
				</div>
				<div class="wrapper">
					<label>专利号</label>
					<input type="text" id="invention_account"/>
				</div>
				<div class="wrapper">
					<label>团队人数</label>
					<input type="text" id="invention_team_num"/>
				</div>
				<div class="wrapper">
					<label>获批时间</label>
					<input type="date" id="invention_time"/>
				</div>
				<div class="wrapper">
					<label>组内排序</label>
					<select id="invention_team_order">
					</select>
				</div>
				<div class="wrapper">
					<label>专利类别</label>
					<select id="invention_type">
						<option>发明型专利</option>
						<option>实用型专利</option>
						<option>外观型专利</option>
					</select>
				</div>
				<div class="wrapper">
					<label>协商得分</label>
					<input type="text" placeholder="2014级及以后需填写" id="invention_discuss_score"/>
				</div>
				<div class="textarea-wrapper">
					<label>备注</label>
					<textarea rows="6" cols="80" id="invention_remark"></textarea>
				</div>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyInvention()"/>
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-invention')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div class="cover" id="cover-project">
		<div class="add-box">
			<div class="add-title"><p>添加项目</p></div>
			<form class="add-content" id="form_project">
				<div class="wrapper">
					<label>项目名称</label>
					<input type="text" id="project_name"/>
				</div>
				<div class="wrapper">
					<label>获批时间</label>
					<input type="date" id="project_time"/>
				</div>
				<div class="wrapper">
					<label>级别</label>
					<select id="project_rate">
						<option>国家级</option>
						<option>省级</option>
						<option>市级</option>
						<option>校级</option>
						<option>学部级</option>
					</select>
				</div>
				<div class="wrapper">
					<label>评定级别</label>
					<select id="project_prize">
						<option>优</option>
						<option>良</option>
						<option>中</option>
						<option>及格</option>
					</select>
				</div>
				<div class="wrapper">
					<label>组内排序</label>
					<select id="project_team_order">
					</select>
				</div>
				<div class="wrapper">
					<label>团队人数</label>
					<input type="text" id="project_team_num">
				</div>
				<div class="textarea-wrapper">
					<label>备注</label>
					<textarea rows="6" cols="80" id="project_remark"></textarea>
				</div>
				<div class="button-wrapper">
					<input type="button" class="button-success" value="点击保存" onclick="applyScieTechProject()" />
					<input type="button" class="button-success" value="取消操作" onclick="hideCover('cover-project')"/>
				</div><hr>
			</form>
		</div>
	</div>
	<div class="main-box">
	<div id="science" class="main-apply">
		<big><strong>科技创新奖学金</strong></big><hr>
		<div class="main-apply-table">
			<span>科创竞赛</span><img src="image/add.jpg" onclick="add('cover-comp');"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>竞赛名称</th>  
						<th>级别</th>
						<th>奖项等级</th>
						<th>人数</th>
						<th>组内排序</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="competition">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delScieTechComp(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		</div>
		<div class="main-apply-table">
			<span>学术论文</span><img src="image/add.jpg" onclick="add('cover-paper')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>文章名称</th>
						<th>发表级别</th>					
						<th>发表时间</th>
						<th>IE,SCI收录</th>
						<th>作者顺序</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="paper">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delPaper(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		</div>
		<div class="main-apply-table">
			<span>专利发明</span><img src="image/add.jpg" onclick="add('cover-invention')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>专利名称</th>  
						<th>专利类别</th>
						<th>获批时间</th>
						<th>专利号</th>
						<th>排名</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="invention">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delInvention(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		<div>
		<div class="main-apply-table">
			<span>创新项目</span><img src="image/add.jpg" onclick="add('cover-project')"/><hr>
			<center>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>项目名称</th>  
						<th>级别</th>
						<th>评定等级</th>
						<th>时间</th>
						<th>组内排序</th>
						<th>分数</th>
						<th>审核状态</th>
					</tr>  
				</thead>
				<tbody id="project">
				</tbody>
			</table>
			</center>
			<div class="main_operate">
				<img src="image/arrow.png" /><span class="table-operate" onclick="checkAll(this)"><input type="checkbox" title="全选">全选</span>
				<i>选中项:</i>
				<!--<span class="table-operate"><img src="image/edit.png" title="编辑"/>编辑</span>-->
				<span class="table-operate" onclick="delScieTechProject(this)"><img src="image/delete.png" title="删除"/>删除</span>
			</div>
			<hr>
		</div>
	</div>
	</div>
</body>
</html>