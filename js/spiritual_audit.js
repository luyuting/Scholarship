window.onload=function(){
	setAppraisalInfo();
	setDormitoryInfo();
	setRewardInfo();
}
function setAppraisalInfo(){
	var action="GetAppraisalList";
	var id="spiritual_appraisal_info";
	var arr=["ap_id","user_id","user_name","app_name","app_ratio","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setDormitoryInfo(){
	var action="GetDormitoryList";
	var id="spiritual_dormitory_info";
	var arr=["ap_id","user_id","user_name","do_name","do_score","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}
function setRewardInfo(){
	var action="GetSpiritualRewardList";
	var id="spiritual_reward_info";
	var arr=["ap_id","user_id","user_name","spr_name","spr_item","spr_rate","spr_time","ap_score","ap_state","ap_remark"];
	setBaseInfo(action,id,arr);
}

function setAppraisal(obj,app_ratio){
	var action="SetAppraisal";
	var params={
		"ap_students":"",
		"app_ratio":app_ratio
	}
	setData(obj,params,action,setAppraisalInfo);
}
function setDormitoryReward(obj){
	var action="SetDormitoryReward";
	var params={
		"ap_students":""
	}
	setData(obj,params,action,setRewardInfo);
}
function setData(obj,params,action,fun){
	var check=obj.parentNode.getElementsByTagName('input')[0];
	var name = obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate";
	var obj_arr=document.getElementsByName(name);
	var ap_students=new Array();
	for(var i=0;i<obj_arr.length;i++)
		if(obj_arr[i].checked==true)
			ap_students.push(obj_arr[i].parentNode.nextSibling.innerHTML);
	params.ap_students=ap_students;
	$.ajax({
		type : "post",
		url : "php/audit_action/"+action+".php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				for(var i=0;i<obj_arr.length;i++)
					obj_arr[i].checked=false;
				check.checked=false;
				fun();
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}