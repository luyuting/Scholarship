var paramsList;
window.onload=function(){
	init();
}
function init(){
	var now=new Date();
	buttonChange(false);
	paramsList = {
		"sc_annual" : now.getFullYear(),
	};
	$.ajax({
		type : "post",
		url : "php/student_action/GetStudySchoType.php",
		data : paramsList,
		dataType : "text",
		success : function(json){
			var obj=$.parseJSON(json);
			for(var i=0;i<obj.length;i++)
				study_ratio.options.add(new Option("前"+obj[i].sc_ratio,obj[i].sc_id));
		},
		error : function(json){
			alert("error " + json);
		}
	});
	checkStudyUnique();
}
function checkStudyUnique(){
	$.ajax({
		type : "post",
		url : "php/student_action/CheckStudyUnique.php",
		data : paramsList,
		dataType : "text",
		success : function(json){
			var obj=$.parseJSON(json);
			if(obj.length==0){
				buttonChange(true);
				return;
			}
			study_ratio.value=obj[0].ap_scho_type;
			var arr=["ap_id","sc_name","sc_ratio","ap_state"];
			addTableRow(obj[0],"apply_study_info",arr);
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function applyStudyScho(){
	var params = {
		"ap_scho_type" : study_ratio.value,
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyStudyScho.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result>0){
				buttonChange(false);
				checkStudyUnique();
			}
			else
				alert("不可重复申请!");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function deleteStudyScho(){
	var id="apply_study_info";
	var params = {
		"ap_id" : document.getElementsByName(id+"_operate")[0].value
	};
	$.ajax({
		type : "post",
		url : "php/student_action/DeleteStudyScho.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result>0){
				delTableRow(id);
				buttonChange(true);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function buttonChange(enabled){
	var obj=document.getElementById('apply_btn');
	var select=document.getElementById("study_ratio");
	if(enabled){
		select.removeAttribute("disabled");
		select.removeAttribute("title");
		obj.setAttribute("class","button-success");
		obj.setAttribute("value","点击申请");
		obj.onclick=applyStudyScho;
	}
	else{
		select.setAttribute("disabled",true);
		select.setAttribute("title","修改之前请取消当前申请");
		obj.setAttribute("class","button-failed");
		obj.setAttribute("value","取消申请");
		obj.onclick=deleteStudyScho;
	}
}