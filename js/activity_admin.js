window.onload=function(){
	getActivityComp();
	getActivityCompScore();
	init();
	getActivityScore();
}
function json(name,describe_a,describe_b,score,ratio){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.type="精神文明";
	this.score=score;
	this.ratio=ratio;
}

function init(){
	var obj_arr=new Array();
	obj_arr[0]=new json("文体活动","打破记录",null,"10","1");
	obj_arr[1]=new json("文体活动","演员/主持人",null,"1","1");
	obj_arr[2]=new json("文体活动团队","队员","市级及以上",null,"1");
	obj_arr[3]=new json("文体活动团队","替补队员","市级及以上",null,"1/2");
	obj_arr[4]=new json("文体活动团队","队员","校级",null,"2/3");
	obj_arr[5]=new json("文体活动团队","替补队员","校级",null,"1/3");
	obj_arr[6]=new json("文体活动团队","队员","学部（学院）级",null,"1/2");
	obj_arr[7]=new json("文体活动团队","替补队员","学部（学院）级",null,"1/4");
	var arr=[null,"name","describe_a","describe_b","score","ratio"];
	var id="activity_admin_info";
	delTableRow(id);
	for(var i=0;i<obj_arr.length;i++){
		addTableRow(obj_arr[i],id,arr);
	}
}

function scoreParams(name,describe_a,describe_b,score,ratio){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.type="文体活动";
	this.score=score;
	this.ratio=ratio;
}

function setActivityComp(){
	var id="activity_comp";
	var action="ActivityComp";
	params={
		"cp_name" : activity_comp_name.value,
		"cp_rate" : rateStr("comp-rate")
	};
	ajax(action,params,function(result){
		if(result==true){
			getActivityComp();
			clear(id);
		}
		else
			alert("插入失败，请检查是否重复录入该项");
	});
}
function getActivityComp(){
	var id="activity_comp_info";
	var action="GetActivityComp";
	var params="";
	var arr=["cp_id","cp_name","cp_rate"];
	setTable(id,action,params,arr);
}

function setActivityCompScore(){
	var id="comp_score";
	var select_arr=comp_score.getElementsByTagName('select');
	var input=comp_score.getElementsByTagName('input')[0];
	var params=new scoreParams("文体活动竞赛",select_arr[0].value,select_arr[1].value,
		input.value,"1.0");
	setItemScore(id,params,getActivityCompScore);
}

function getActivityCompScore(){
	var table="comp_score_info";
	var params={"name":"文体活动竞赛"};
	var arr=["its_id","its_describe_a","its_describe_b","its_score"];
	setScoreTable(table,params,arr);
}
function setActivityScore(){
	var checkbox_arr=document.getElementsByName("activity_admin_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var obj=checkbox_arr[i].parentNode.parentNode.getElementsByTagName('td');
			var params=new scoreParams(obj[1].innerHTML,obj[2].innerHTML,obj[3].innerHTML,
				obj[4].innerHTML,setFloat(obj[5].innerHTML));
			setItemScore(null,params,function(){});
		}
	}
}
function setFloat(str){
	var arr=str.split("/");
	var num;
	if(arr.length==1)
		num=parseFloat(arr[0]);
	else 
		num=parseFloat(arr[0])/parseFloat(arr[1]);
	return num;
}