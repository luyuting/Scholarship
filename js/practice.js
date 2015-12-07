var sc_annual;
window.onload=function(){
	var now=new Date();
	sc_annual=now.getFullYear();
	getPractice();
	init();
}
function json(name,team,person,role){
	this.name=name;
	this.team=team;
	this.person=person;
	this.role=role;
}
function init(){
	var obj_arr=new Array();

	obj_arr[0]=new json("社区挂职","暂无可选项","先进个人，锻炼标兵，未获得奖项","暂无可选项");
	obj_arr[1]=new json("优秀志愿者","暂无可选项","国家级，省级，市级，校级，学部（学院）级","暂无可选项");
	obj_arr[2]=new json("寒假社会调查","暂无可选项","个人调查报告一等奖，个人调查报告二等奖，个人调查报告三等奖","暂无可选项");
	obj_arr[3]=new json("暑假社会调查","暂无可选项","个人调查报告一等奖，个人调查报告二等奖，个人调查报告三等奖","暂无可选项");
	obj_arr[4]=new json("寒假社会实践","国家级奖，省级奖，市级奖，校级一等奖，校级二等奖，校级三等奖，未获得奖项","国家级优秀个人，省级优秀个人，市级优秀个人"
		+"，校级优秀个人一等奖，校级优秀个人二等奖，校级优秀个人三等奖，未获得奖项","队长，队员");
	obj_arr[5]=new json("暑假社会实践","国家级奖，省级奖，市级奖，校级一等奖，校级二等奖，校级三等奖，未获得奖项","国家级优秀个人，省级优秀个人，市级优秀个人"
		+"，校级优秀个人一等奖，校级优秀个人二等奖，校级优秀个人三等奖，未获得奖项","去年暑假参与（不可计入参与分），队长，队员");
	obj_arr[6]=new json("军训","暂无可选项","军训先进集体成员，军训先进个人","暂无可选项");
	obj_arr[7]=new json("其他类社会实践","暂无可选项","暂无可选项","暂无可选项");
	
	$("#practice_name").empty();
	for(var i=0;i<obj_arr.length;i++)
		practice_name.options.add(new Option(obj_arr[i].name));
	var selectFun=function(){
		$("#practice_team").empty();
		$("#practice_person").empty();
		$("#practice_role").empty();
		var index=practice_name.selectedIndex;
		var team_arr=obj_arr[index].team.split("，");
		var person_arr=obj_arr[index].person.split("，");
		var role_arr=obj_arr[index].role.split("，");
		for(var i=0;i<team_arr.length;i++)
			practice_team.options.add(new Option(team_arr[i]));
		for(var j=0;j<person_arr.length;j++)
			practice_person.options.add(new Option(person_arr[j]));
		for(var k=0;k<role_arr.length;k++)
			practice_role.options.add(new Option(role_arr[k]));
	}
	practice_name.onchange=selectFun;
	selectFun();
}
function applyPractice(){
	if(practice_title.value==""||/^\s+$/.test(practice_title.value))
		if(practice_name.value!="优秀志愿者"&&practice_name.value!="军训"){
			practice_title.focus();
			return false;
		}
	var params={
		"pr_title":practice_title.value,
		"pr_name":practice_name.value,
		"pr_team_prize":practice_team.value,
		"pr_person_prize":practice_person.value,
		"pr_team_role":practice_role.value,
		"pr_remark":practice_remark.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyPractice.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getPractice();
				form_practice.reset();
				init();
				hideCover("cover-practice");
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getPractice(){
	var id="practice_apply_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/Practice.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","pr_title","pr_name","pr_team_prize","pr_person_prize","pr_team_role","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delPractice(obj){
	del(obj,"DelPractice",getPractice);
}