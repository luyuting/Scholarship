window.onload=function(){
	setStudyInfo();
	setSpiritualInfo();
	setActivityInfo();
	setWorkInfo();
	setScieTechInfo();
	setPracticeInfo();
}
function setStudyInfo(){
	var id="study_info";
	var params={
		"type":"学习优秀"
	};
	setInfo(id,params);
}
function setSpiritualInfo(){
	var id="spiritual_info";
	var params={
		"type":"精神文明"
	};
	setInfo(id,params);
}
function setActivityInfo(){
	var id="activity_info";
	var params={
		"type":"文体活动"
	};
	setInfo(id,params);
}
function setWorkInfo(){
	var id="work_info";
	var params={
		"type":"社会工作"
	};
	setInfo(id,params);
}
function setScieTechInfo(){
	var id="scie_tech_info";
	var params={
		"type":"科技创新"
	};
	setInfo(id,params);
}
function setPracticeInfo(){
	var id="practice_info";
	var params={
		"type":"社会实践"
	};
	setInfo(id,params);
}
var nullParams={
	"user_id":"无",
	"user_name":"无",
	"un_state":0
}
function setInfo(id,params){
	var arr=["user_id","user_id","user_name","un_state"];
	$.ajax({
		type : "post",
		url : "php/audit_action/Process.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			if(obj_arr.length==0){
				addTableRow(nullParams,id,arr);
				return;
			}
			for(var i=0;i<obj_arr.length;i++)
				addTableRow(obj_arr[i],id,arr);
		},
		error : function(json){
			alert("error " + json);
		}
	});
}