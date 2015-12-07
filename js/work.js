var sc_annual;
window.onload=function(){
	var now=new Date();
	sc_annual=now.getFullYear();
	getWorkCadre();
	getWorkReward();
	init();
}
function json(code,position,score){
	this.code=code;
	this.position=position;
	this.score=score;
}

function init(){
	var obj_arr=new Array();
	obj_arr[0]=new json("ES101X","校学生会主席，校学生会副主席，校团委常务副部长，校艺术总团团长，校社团联合会主席，学部（学院）学生会主席，"
		+"学部（学院）团委常务副书记","15");
	obj_arr[1]=new json("ES102X","校学生会部长，校团委副部长，校社团联合会副主席，校艺术总团副团长，校艺术总团分团团长，"
		+"大学生自我管理委员会主席，校自强社社长，校阳光心理协会会长，校学习与发展协会会长，校奖助学金工作室主任，校广播台台长，"
		+"校学生电视台台长，大学生记者团团长，学部（学院）学生会副主席，学部（学院）团委副书记，学部（学院）本科生党总支委员，"
		+"学部（学院）自强社社长，学部（学院）阳光心理协会会长","12");
	obj_arr[2]=new json("ES103X","校学生会副部长，校团委中心主任，校社团联合会部长，校艺术团总团部长，校艺术总团分团副团长，大学生自我管理委员会副主席，"
		+"校自强社副社长，校阳光心理协会副会长，校奖助学金工作室副主任，校广播台副台长，校广播台节目总监，校学生电视台副台长，"
		+"校学生电视台总编，大学生记者团副团长，学部（学院）学生会部长，学部（学院）团委部长，学部（学院）本科生党总支部长，"
		+"学部（学院）自强社副社长，学部（学院）阳光心理协会副会长，级队长，级队团总支书记，班长，团支部书记，基层党支部书记","10");
	obj_arr[3]=new json("ES104X","校社团联合会社团负责人，校社团联合会副部长，校艺术团总团副部长，校艺术团分团部长，大学生自我管理委员会中心主任，"
		+"校自强社部长，校阳光心理协会部长，校学习与发展协会部长，校奖助学金工作室部长，校广播台部长，校学生电视台部长，"
		+"大学生记者团部长，学部（学院）学生会副部长，学部（学院）团委副部长，学部（学院）自强社部长，学部（学院）阳光心理协会部长，"
		+"级队委员，基层党支部委员","8");
	obj_arr[4]=new json("ES105X","大学生自我管理委员会中心副主任，校自强社副部长，校阳光心理协会副部长，校学习与发展协会副部长，校奖助学金工作室副部长，"
		+"校广播台副部长，校学生电视台副部长，大学生记者团副部长，学部（学院）自强社副部长，学部（学院）阳光心理协会副部长，班委会委员，"
		+"团支部委员，班级心理委员，寝室长","6");
	obj_arr[5]=new json("ES106X","校社团联合会干事，学生会干事，团委干事，自强社干事，阳光心理协会干事，大学生自我管理委员会干事，校学习与发展协会干事，"
		+"校奖助学金工作室干事，校电视台台员，校广播台台员，大学生记者团团员，学生调研员","4");
	var arr=[null,"code","position","score"];
	$("#work_info").empty();
	for(var i=0;i<obj_arr.length;i++){
		addTableRow(obj_arr[i],"work_info",arr);
	}
	$("#work_code").empty();
	for(var i=0;i<obj_arr.length;i++){
		work_code.options.add(new Option(obj_arr[i].code));
		var select_code=function(){
			var index=work_code.selectedIndex;
			var arr=obj_arr[index].position.split("，");
			$("#work_position").empty();
			for(var j=0;j<arr.length;j++){
				work_position.options.add(new Option(arr[j]));
			}
		};
		work_code.onchange=select_code;
		select_code();
	}
}
function applyWorkCadre(){
	var params={
		"wc_level":work_level.value,
		"wc_last_time":work_last_time.value,
		"wc_begin_time":work_begin_time.value,
		"wc_end_time":work_end_time.value,
		"wc_name":work_position.value,
		"wc_remark":work_remark.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyWorkCadre.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getWorkCadre();
				form_work.reset();
				init();
				hideCover("cover-work");
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getWorkCadre(){
	var id="work_cadre_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/WorkCadre.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","wc_level","wc_last_time","wc_name","wc_begin_time","wc_end_time","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delWorkCadre(obj){
	del(obj,"DelWorkCadre",getWorkCadre);
}
function applyWorkReward(){
	var params={
		"wr_name":reward_name.value,
		"wr_rate":reward_rate.value,
		"wr_time":reward_time.value,
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/ApplyWorkReward.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				getWorkReward();
				form_reward.reset();
				hideCover("cover-work-reward");
			}
			else
				alert("插入失败");
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function getWorkReward(){
	var id="work_reward_info";
	var params={
		"sc_annual":sc_annual
	};
	$.ajax({
		type : "post",
		url : "php/student_action/WorkReward.php",
		data : params,
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			$("#"+id).empty();
			var arr=["ap_id","wr_name","wr_rate","wr_time","ap_score","ap_state"];
			for(var i=0;i<obj_arr.length;i++){
				addTableRow(obj_arr[i],id,arr);
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function delWorkReward(obj){
	del(obj,"DelWorkReward",getWorkReward);
}