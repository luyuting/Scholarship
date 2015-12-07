var appraisal_ratio;
var sc_annual;
window.onload=function(){
	var now=new Date();
	sc_annual=now.getFullYear();
	getAppraisalRatio();
	getAppraisal();
	getDormitory();
	getReward();
	init();
}
function getAppraisalRatio(){
	var id="spiritual_appraisal_ratio";
	var params={"sc_annual":sc_annual};
	$.ajax({
		type : "post",
		url : "php/student_action/GetAppraisalRatio.php",
		data : params,
		dataType : "text",
		success : function(json){
			appraisal_ratio=$.parseJSON(json);
			$("#"+id).empty();
			var obj=document.getElementById(id);
			for(var i=0;i<appraisal_ratio.length;i++)
				obj.options.add(new Option(appraisal_ratio[i].its_describe_a));
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function applyAppraisal(){
	var select=document.getElementById("spiritual_appraisal_ratio");
	var params={
		"app_ratio":select.value,
		"app_score":appraisal_ratio[select.selectedIndex].its_score,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyAppraisal.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getAppraisal();
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function deleteAppraisal(){
	var id="spiritual_appraisal_info";
	var params = {
		"ap_id" : document.getElementsByName(id+"_operate")[0].value
	};
	$.ajax({
		type : "post",
		url : "php/student_action/DelAppraisal.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				$("#"+id).empty();
				buttonChange(true);
				var select=document.getElementById("spiritual_appraisal_ratio");
				select.removeAttribute("disabled");
				select.removeAttribute("title");
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getAppraisal(){
	var id="spiritual_appraisal_info";
	buttonChange(false);
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/Appraisal.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","app_name","app_ratio","ap_score","ap_state"];
			if(obj_arr.length==0){
				buttonChange(true);
				return;
			}
			if(obj_arr.length>1)
				alert("重复插入多行，请删除后重新申请！");
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
			var select=document.getElementById("spiritual_appraisal_ratio");
			select.value=obj_arr[0].app_ratio;
			select.setAttribute("disabled",true);
			select.setAttribute("title","修改之前请取消当前申请");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function applyDormitory(){
	var input=document.getElementById("spiritual_dormitory_score");
	var params={
		"do_score":input.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyDormitory.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getDormitory();
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getDormitory(){
	var id="spiritual_dormitory_info";
	buttonChange2(false);
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/Dormitory.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","do_name","do_score","ap_score","ap_state"];
			if(obj_arr.length==0){
				buttonChange2(true);
				return;
			}
			if(obj_arr.length>1)
				alert("重复插入多行，请删除后重新申请！");
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
			var input=document.getElementById("spiritual_dormitory_score");
			input.value=obj_arr[0].do_score;
			input.setAttribute("disabled",true);
			input.setAttribute("title","修改之前请取消当前申请");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function deleteDormitory(){
	var id="spiritual_dormitory_info";
	var params = {
		"ap_id" : document.getElementsByName(id+"_operate")[0].value
	};
	$.ajax({
		type : "post",
		url : "php/student_action/DelDormitory.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				$("#"+id).empty();
				buttonChange2(true);
				var input=document.getElementById("spiritual_dormitory_score");
				input.value="";
				input.removeAttribute("disabled");
				input.removeAttribute("title");
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function buttonChange(enabled){
	var obj=document.getElementById("btn_appraisal");
	if(enabled){
		obj.setAttribute("class","button-success");
		obj.setAttribute("value","点击申请");
		obj.onclick=applyAppraisal;
	}
	else{
		obj.setAttribute("class","button-failed");
		obj.setAttribute("value","取消申请");
		obj.onclick=deleteAppraisal;
	}
}
function buttonChange2(enabled){
	var obj=document.getElementById("btn_dormitory");
	if(enabled){
		obj.setAttribute("class","button-success");
		obj.setAttribute("value","点击申请");
		obj.onclick=applyDormitory;
	}
	else{
		obj.setAttribute("class","button-failed");
		obj.setAttribute("value","取消申请");
		obj.onclick=deleteDormitory;
	}
}
function json(name,describe_a,describe_b){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
}
function init(){
	var obj_arr=new Array();
	obj_arr[0]=new json("寝室环境建设","卫生平均成绩为满分","");
	obj_arr[1]=new json("寝室环境建设","千优寝室","校级");
	obj_arr[2]=new json("寝室环境建设","优秀寝室","市级");
	obj_arr[3]=new json("个人荣誉称号","优秀学生党员","校级");
	obj_arr[4]=new json("个人荣誉称号","优秀学生党员","学部(学院)级");
	obj_arr[5]=new json("个人荣誉称号","自立自强标兵","校级");
	obj_arr[6]=new json("个人荣誉称号","优秀团员标兵","校级");
	obj_arr[7]=new json("个人荣誉称号","优秀团员","校级");
	obj_arr[8]=new json("个人荣誉称号","优秀团员","学部（学院）级");
	obj_arr[9]=new json("公益活动","无偿献血","");
	obj_arr[10]=new json("好人好事","被校外媒体刊载好人好事","");
	obj_arr[11]=new json("好人好事","具有较强社会影响效果的事迹","");
	obj_arr[12]=new json("精神文明奖项","精神文明类表彰","国家级");
	obj_arr[13]=new json("精神文明奖项","精神文明类表彰","省级");
	obj_arr[14]=new json("精神文明奖项","精神文明类表彰","市级及以上");
	var num=new Array();
	var j=0;
	num[j]=0;
	$("#spiritual_name").empty();
	spiritual_name.options.add(new Option(obj_arr[0].name));
	for(var i=1;i<obj_arr.length;i++){
		if(obj_arr[i].name!=obj_arr[i-1].name){
			spiritual_name.options.add(new Option(obj_arr[i].name));
			num[++j]=i;
		}
	}
	num[++j]=i;
	var select1=function(){
		$("#spiritual_item").empty();
		var index=spiritual_name.selectedIndex;
		var num2=new Array();
		var l=0;
		num2[l]=num[index];
		spiritual_item.options.add(new Option(obj_arr[num[index]].describe_a));
		for(var k=num[index]+1;k<num[index+1];k++){
			if(obj_arr[k].describe_a!=obj_arr[k-1].describe_a){
				spiritual_item.options.add(new Option(obj_arr[k].describe_a));
				num2[++l]=k;
			}
		}
		num2[++l]=k;
		var select2=function(){
			$("#spiritual_rate").empty();
			var index2=spiritual_item.selectedIndex;
			for(var m=num2[index2];m<num2[index2+1];m++){
				spiritual_rate.options.add(new Option(obj_arr[m].describe_b));
			}
		}
		spiritual_item.onchange=select2;
		select2();
	}
	spiritual_name.onchange=select1;
	select1();
}
function applyReward(){
	var params={
		"spr_name":spiritual_name.value,
		"spr_item":spiritual_item.value,
		"spr_rate":spiritual_rate.value,
		"spr_time":spiritual_time.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplySpiritualReward.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getReward();
				spiritual_time.value="";
				hideCover("cover-spiritual");
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getReward(){
	var id="spiritual_reward_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/SpiritualReward.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","spr_name","spr_item","spr_rate","spr_time","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delReward(obj){
	del(obj,"DelSpiritualReward",getReward);
}