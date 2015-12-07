window.onload=function(){
	setStudyInfo();
	setSpiritualInfo();
	setActivityInfo();
	setWorkInfo();
	setScieTechInfo();
	setPracticeInfo();
}
function setStudyInfo(){
	var action="GatherStudy";
	var id="study_info";
	var arr=["user_id","user_id","user_name","sc_ratio","sc_name"];
	setBaseInfo(action,id,arr);
}

function setSpiritualInfo(){
	var action="GatherSpiritual";
	var id="spiritual_info"
	var arr=["user_id","user_id","user_name","score","user_order"];
	setBaseInfo(action,id,arr);
}
function setActivityInfo(){
	var action="GatherActivity";
	var id="activity_info"
	var arr=["user_id","user_id","user_name","score","user_order"];
	setBaseInfo(action,id,arr);
}
function setWorkInfo(){
	var action="GatherWork";
	var id="work_info"
	var arr=["user_id","user_id","user_name","score","user_order"];
	setBaseInfo(action,id,arr);
}
function setScieTechInfo(){
	var action="GatherScieTech";
	var id="scie_tech_info"
	var arr=["user_id","user_id","user_name","score","user_order"];
	setBaseInfo(action,id,arr);
}
function setPracticeInfo(){
	var action="GatherPractice";
	var id="practice_info"
	var arr=["user_id","user_id","user_name","score","user_order"];
	setBaseInfo(action,id,arr);
}
function setBaseInfo(action,id,arr){
   	$.ajax({
   		type : "post",
   		url : "php/audit_action/"+action+".php",
   		data : "",
   		dataType : "text",
   		success : function(json){
			var obj_arr = $.parseJSON(json);
			$("#"+id).empty();
   			for(var i = obj_arr.length-1; i >=0; i--){
   				addTableRow(obj_arr[i],id,arr);
   			}
		},
		error : function(json){
   			alert("error " + json);
   		}
   	});
}