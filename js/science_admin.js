window.onload=function(){
	getScieTechComp();
	getScieTechCompScore();
	getScieTechCompRatio();
	getScieTechPaper();
	getScieTechPaperEnbody();
	getScieTechInvention();
	getScieTechProj()
}

/**
** 科技创新竞赛名称和级别的录入，用作申请时的选择列表
*/

function setScieTechComp(){
	var id="science_comp";
	var action="ScieTechComp";
	params={
		"cp_name" : science_comp_name.value,
		"cp_rate" : rateStr("comp-rate")
	};
	ajax(action,params,function(result){
		if(result==true){
			getScieTechComp();
			clear(id);
		}
		else
			alert("插入失败，请检查是否重复录入该项");
	});
}

function getScieTechComp(){	
	var table="science_comp_info";
	var action="GetScieTechComp";
	var params="";
	var arr=["cp_id","cp_name","cp_rate"];
	setTable(table,action,params,arr);
}

/**
**	json
*/

function scoreParams(name,describe_a,describe_b,score,ratio){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.type="科技创新";
	this.score=score;
	this.ratio=ratio;
}

function setScieTechCompScore(){
	var id="comp_score";
	var select_arr=comp_score.getElementsByTagName('select');
	var input=comp_score.getElementsByTagName('input')[0];
	var params=new scoreParams("科技创新竞赛",select_arr[0].value,select_arr[1].value,
		input.value,"1.0");
	setItemScore(id,params,getScieTechCompScore);
}

function setScieTechCompRatio(){
	var id="comp_ratio";
	var select=comp_ratio.getElementsByTagName('select')[0];
	var input=comp_ratio.getElementsByTagName('input')[0];
	var params=new scoreParams("科技创新团队",select.value,null,"0",parseFloat(input.value)/100);
	setItemScore(id,params,getScieTechCompRatio);
}

function setScieTechPaper(){
	var id="science_paper";
	var select=science_paper.getElementsByTagName('select')[0];
	var select2=science_paper.getElementsByTagName('select')[1];
	var input_arr=science_paper.getElementsByTagName('input');
	var params=new scoreParams("科技创新论文",select.value,rateStr("paper-order"),input_arr[input_arr.length-1].value,select2.value);
	setItemScore(id,params,getScieTechPaper);
}

function setScieTechPaperEnbody(){
	var id="paper_enbody";
	var select=paper_enbody.getElementsByTagName('select')[0];
	var input=paper_enbody.getElementsByTagName('input')[0];
	var params=new scoreParams("科技创新论文收录",select.value,null,input.value,"1.0");
	setItemScore(id,params,getScieTechPaperEnbody);
}

function setScieTechInvention(){
	var id="science_invention";
	var select=science_invention.getElementsByTagName('select')[0];
	var input=science_invention.getElementsByTagName('input')[0];
	var params=new scoreParams("科技创新专利",select.value,null,input.value,"1.0");
	setItemScore(id,params,getScieTechInvention);
}

function setScieTechProj(){
	var id="science_project";
	var select=science_project.getElementsByTagName('select')[0];
	var input=science_project.getElementsByTagName('input')[0];
	var params=new scoreParams("科技创新项目","大学生创新创业项目",select.value,input.value,"1.0");
	setItemScore(id,params,getScieTechProj);
}

function getScieTechCompScore(){
	var table="comp_score_info";
	var params={"name":"科技创新竞赛"};
	var arr=["its_id","its_describe_a","its_describe_b","its_score"];
	setScoreTable(table,params,arr);
}

function getScieTechCompRatio(){
	var table="comp_ratio_info";
	var params={"name":"科技创新团队"};
	var arr=["its_id","its_describe_a","its_score_ratio"];
	setScoreTable(table,params,arr);
}

function getScieTechPaper(){
	var table="science_paper_info";
	var params={"name":"科技创新论文"};
	var arr=["its_id","its_describe_a","its_describe_b","its_score","its_score_ratio"];
	setScoreTable(table,params,arr);
}

function getScieTechPaperEnbody(){
	var table="paper_enbody_info";
	var params={"name":"科技创新论文收录"};
	var arr=["its_id","its_describe_a","its_score"];
	setScoreTable(table,params,arr);
}

function getScieTechInvention(){
	var table="science_invention_info";
	var params={"name":"科技创新专利"};
	var arr=["its_id","its_describe_a","its_score"];
	setScoreTable(table,params,arr);
}

function getScieTechProj(){
	var table="science_project_info";
	var params={"name":"科技创新项目"};
	var arr=["its_id","its_describe_a","its_describe_b","its_score"];
	setScoreTable(table,params,arr);
}