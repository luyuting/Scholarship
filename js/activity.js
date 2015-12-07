var sc_annual;
var comp_arr;
window.onload=function(){
	var now=new Date();
	sc_annual=now.getFullYear();
	getActivityRole();
	getActivityComp();
	getCompList();
}
function getCompList(){
	var params={
		"sc_annual" : sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/GetActivityComp.php",
		data : params,
		dataType : "text",
		success : function(json){
			comp_arr=$.parseJSON(json);
			$("#comp_name").empty();
			for(var i=0;i<comp_arr.length;i++)
				comp_name.options.add(new Option(comp_arr[i].cp_name,i));
			setCompRate();
			comp_name.onchange=setCompRate;
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function setCompRate(){
	var rate_arr=comp_arr[comp_name.value].cp_rate.split("，");
	$("#comp_rate").empty();
	for(var j=0;j<rate_arr.length;j++)
		comp_rate.options.add(new Option(rate_arr[j]));
}
function applyActivityComp(){
	if(!/^\+?[1-9][0-9]*$/.test(comp_team.value)){
		comp_team.focus();
		return false;
	}
	var params={
		"ac_name":comp_arr[comp_name.value].cp_name,
		"ac_rate":comp_rate.value,
		"ac_prize":comp_prize.value,
		"ac_role":comp_role.value,
		"ac_team_num":comp_team.value,
		"ac_break":comp_break.value,
		"ac_rule":comp_rule.value,
		"ac_time":comp_time.value,
		"ac_remark":comp_remark.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyActivityComp.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				form_comp.reset();
				setCompRate();
				getActivityComp();
				hideCover("cover-comp");
			}
			else
				alert("申请失败，请检查奖项是否满足加分要求");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getActivityComp(){
	var id="competition_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ActivityComp.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","ac_name","ac_rate","ac_prize","ac_team_num","ac_role","ac_break","ac_rule","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delActivityComp(obj){
	del(obj,"DelActivityComp",getActivityComp);
}
function applyActivityRole(){
	var params={
		"ar_name":activity_name.value,
		"ar_role":activity_role.value,
		"ar_rate":activity_rate.value,
		"ar_time":activity_time.value,
		"ar_host":activity_host.value,
		"ar_remark":activity_remark.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyActivityRole.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getActivityRole();
				form_role.reset();
				hideCover("cover-role");
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getActivityRole(){
	var id="activity_role_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ActivityRole.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","ar_name","ar_rate","ar_time","ar_role","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delActivityRole(obj){
	del(obj,"DelActivityRole",getActivityRole);
}