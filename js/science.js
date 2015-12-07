var comp_arr;
var team_ratio;
var sc_annual;
window.onload=function(){
	var now=new Date();
	sc_annual=now.getFullYear();
	setTableComp();
	getInvention();
	getPaper();
	getScieTechProject();
	getCompList();
}
function getCompList(){
	var params={
		"sc_annual" : sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/GetScieTechComp.php",
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
	getTeamRatio(params);
}
function getTeamRatio(params){
	$.ajax({
		type : "post",
		url : "php/student_action/GetTeamRatio.php",
		data : params,
		dataType : "text",
		success : function(json){
			team_ratio=$.parseJSON(json);
			$("#comp_team_order").empty();
			for(var i=0;i<team_ratio.length;i++){
				comp_team_order.options.add(new Option(team_ratio[i].its_describe_a,i));
				invention_team_order.options.add(new Option(team_ratio[i].its_describe_a,i));
				project_team_order.options.add(new Option(team_ratio[i].its_describe_a,i));
			}
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
function setTableComp(){
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ScieTechComp.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#competition").empty();
			var arr=["ap_id","stc_name","stc_rate","stc_prize","stc_team_num","stc_team_order","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],"competition",arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function applyComp(){
	if(!/^\+?[1-9][0-9]*$/.test(comp_team.value)){
		comp_team.focus();
		return false;
	}
	var params={
		"stc_name":comp_arr[comp_name.value].cp_name,
		"stc_rate":comp_rate.value,
		"stc_prize":comp_prize.value,
		"stc_team_status":comp_role.value,
		"stc_team_num":comp_team.value,
		"stc_team_order":team_ratio[comp_team_order.value].its_describe_a,
		"stc_team_ratio":team_ratio[comp_team_order.value].its_score_ratio,
		"stc_host":comp_host.value,
		"stc_time":comp_time.value,
		"stc_remark":comp_remark.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyScieTechComp.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				form_comp.reset();
				setCompRate();
				setTableComp();
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
function delScieTechComp(obj){
	del(obj,"DelScieTechComp",setTableComp);
}
function applyScieTechProject(){
	if(!/^\+?[1-9][0-9]*$/.test(project_team_num.value)){
		project_team_num.focus();
		return false;
	}
	var params={
		"stp_name":project_name.value,
		"stp_rate":project_rate.value,
		"stp_prize":project_prize.value,
		"stp_team_num":project_team_num.value,
		"stp_team_order":team_ratio[project_team_order.value].its_describe_a,
		"stp_time":project_time.value,
		"stp_remark":project_remark.value,
		"stp_team_ratio":team_ratio[project_team_order.value].its_score_ratio,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyScieTechProject.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				form_project.reset();
				getScieTechProject();
				hideCover("cover-project");
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getScieTechProject(){
	var id="project";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ScieTechProject.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","stp_name","stp_rate","stp_prize","stp_time","stp_team_order","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delScieTechProject(obj){
	del(obj,"DelScieTechProject",getScieTechProject);
}
function applyPaper(){
	if(!/^\+?[1-9][0-9]*$/.test(paper_team_num.value)){
		paper_team_num.focus();
		return false;
	}
	var params={
		"pa_name":paper_name.value,
		"pa_journal":paper_journal.value,
		"pa_vol":paper_vol.value,
		"pa_team_order":paper_team_order.value,
		"pa_team_num":paper_team_num.value,
		"pa_ei_sci":paper_ie_sci.value,
		"pa_level":paper_level.value,
		"pa_discuss_score":paper_discuss_score.value,
		"pa_time":paper_time.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyPaper.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				form_paper.reset();
				getPaper();
				hideCover("cover-paper");
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getPaper(){
	var id="paper";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/Paper.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","pa_name","pa_level","pa_time","pa_ei_sci","pa_team_order","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delPaper(obj){
	del(obj,"DelPaper",getPaper);
}
function applyInvention(){
	if(!/^\+?[1-9][0-9]*$/.test(invention_team_num.value)){
		invention_team_num.focus();
		return false;
	}
	var params={
		"in_name":invention_name.value,
		"in_account":invention_account.value,
		"in_team_num":invention_team_num.value,
		"in_team_order":team_ratio[invention_team_order.value].its_describe_a,
		"in_time":invention_time.value,
		"in_remark":invention_remark.value,
		"in_team_ratio":team_ratio[invention_team_order.value].its_score_ratio,
		"in_type":invention_type.value,
		"in_discuss_score":invention_discuss_score.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyInvention.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				form_invention.reset();
				getInvention();
				hideCover("cover-invention");
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getInvention(){
	var id="invention";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/Invention.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","in_name","in_type","in_time","in_account","in_team_order","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delInvention(obj){
	del(obj,"DelInvention",getInvention);
}