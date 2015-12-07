window.onload=function(){
	getSpirAppraisalScore();
	//getSpiritualScore();
	init();
}
/*var checkNum=0;
function init(){
	var checkbox_arr=document.getElementsByName("spiritual_appraisal_info_operate");
	alert(checkbox_arr.length);
	for(var i=0;i<checkbox_arr.length;i++){
		checkbox_arr[i].onchange=function(){
			if(this.checked){
				checkNum++;
				if(checkNum==checkbox_arr.length){
					check_state=true;
					checkall.checked=check_state;
				}
					
			}
			else{
				checkNum--;
				check_state=false;
				checkall.checked=check_state;
			}
		}
	}
}*/



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
	obj_arr[0]=new json("寝室环境建设","文明寝室","校级",null,"2");
	obj_arr[1]=new json("寝室环境建设","卫生平均成绩为满分",null,"6","1");
	obj_arr[2]=new json("寝室环境建设","千优寝室","校级","2","1");
	obj_arr[3]=new json("寝室环境建设","优秀寝室","市级","4","1");
	obj_arr[4]=new json("个人荣誉称号","优秀学生党员","校级","15","1");
	obj_arr[5]=new json("个人荣誉称号","优秀学生党员","学部（学院）级","10","1");
	obj_arr[6]=new json("个人荣誉称号","自立自强标兵","校级","10","1");
	obj_arr[7]=new json("个人荣誉称号","优秀团员标兵","校级","10","1");
	obj_arr[8]=new json("个人荣誉称号","优秀团员","校级","5","1");
	obj_arr[9]=new json("个人荣誉称号","优秀团员","学部（学院）级","2","1");
	obj_arr[10]=new json("公益活动","无偿献血",null,"5","1");
	obj_arr[11]=new json("好人好事","被校外媒体刊载好人好事",null,"5","1");
	obj_arr[12]=new json("好人好事","具有较强社会影响效果的事迹",null,"10","1");
	obj_arr[13]=new json("精神文明奖项","精神文明类表彰","国家级","20","1");
	obj_arr[14]=new json("精神文明奖项","精神文明类表彰","省级","15","1");
	obj_arr[15]=new json("精神文明奖项","精神文明类表彰","市级及以上","10","1");
	
	var arr=[null,"name","describe_a","describe_b","score","ratio"];
	var id="spiritual_admin_info";
	delTableRow(id);
	for(var i=0;i<obj_arr.length;i++){
		addTableRow(obj_arr[i],id,arr);
	}
}

function scoreParams(name,describe_a,describe_b,score,ratio){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.type="精神文明";
	this.score=score;
	this.ratio=ratio;
}

function setSpirAppraisalScore(){
	var id="spiritual_appraisal";
	var select=spiritual_appraisal.getElementsByTagName('select')[0];
	var input=spiritual_appraisal.getElementsByTagName('input')[0];
	var params=new scoreParams("民主评议",select.value,null,input.value,"1");
	setItemScore(id,params,getSpirAppraisalScore);
}

function setSpiritualScore(){
	var checkbox_arr=document.getElementsByName("spiritual_admin_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var obj=checkbox_arr[i].parentNode.parentNode.getElementsByTagName('td');
			var params=new json(obj[1].innerHTML,obj[2].innerHTML,obj[3].innerHTML,obj[4].innerHTML,obj[5].innerHTML);
			setItemScore(null,params,getSpiritualScore);
		}
	}
}
function getSpirAppraisalScore(){
	var table="spiritual_appraisal_info";
	var params={"name":"民主评议"};
	var arr=["its_id","its_describe_a","its_score"];
	setScoreTable(table,params,arr);
}
function getSpiritualScore(){
	var table="spiritual_admin_info";
	var params={"name":"寝室环境建设"};
	var arr=["its_id","its_name","its_describe_a","its_describe_b","its_score","its_score_ratio"];
	setScoreTable(table,params,arr);
}
/*function delSpirAppraisalScore(){
	var id="spiritual_appraisal";
	var checkbox_arr=document.getElementsByName("spiritual_appraisal_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var params={"id":checkbox_arr[i].value};
			delItemScore(id,params,getSpirAppraisalScore);
		}
	}
}
function delSpiritualScore(){
	
}*/
function editSpirAppraisalScore(){
	var checkbox_arr=document.getElementsByName("spiritual_appraisal_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			
		}
	}
}