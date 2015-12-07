window.onload=function(){
	init();
}
function json(position,score){
	this.position=position;
	this.score=score;
}

function init(){
	var obj_arr=new Array();
	obj_arr[0]=new json("校学生会主席，校学生会副主席，校团委常务副部长，校艺术总团团长，校社团联合会主席，学部（学院）学生会主席，"
		+"学部（学院）团委常务副书记","15");
	obj_arr[1]=new json("校学生会部长，校团委副部长，校社团联合会副主席，校艺术总团副团长，校艺术总团分团团长，"
		+"大学生自我管理委员会主席，校自强社社长，校阳光心理协会会长，校学习与发展协会会长，校奖助学金工作室主任，校广播台台长，"
		+"校学生电视台台长，大学生记者团团长，学部（学院）学生会副主席，学部（学院）团委副书记，学部（学院）本科生党总支委员，"
		+"学部（学院）自强社社长，学部（学院）阳光心理协会会长","12");
	obj_arr[2]=new json("校学生会副部长，校团委中心主任，校社团联合会部长，校艺术团总团部长，校艺术总团分团副团长，大学生自我管理委员会副主席，"
		+"校自强社副社长，校阳光心理协会副会长，校奖助学金工作室副主任，校广播台副台长，校广播台节目总监，校学生电视台副台长，"
		+"校学生电视台总编，大学生记者团副团长，学部（学院）学生会部长，学部（学院）团委部长，学部（学院）本科生党总支部长，"
		+"学部（学院）自强社副社长，学部（学院）阳光心理协会副会长，级队长，级队团总支书记，班长，团支部书记，基层党支部书记","10");
	obj_arr[3]=new json("校社团联合会社团负责人，校社团联合会副部长，校艺术团总团副部长，校艺术团分团部长，大学生自我管理委员会中心主任，"
		+"校自强社部长，校阳光心理协会部长，校学习与发展协会部长，校奖助学金工作室部长，校广播台部长，校学生电视台部长，"
		+"大学生记者团部长，学部（学院）学生会副部长，学部（学院）团委副部长，学部（学院）自强社部长，学部（学院）阳光心理协会部长，"
		+"级队委员，基层党支部委员","8");
	obj_arr[4]=new json("大学生自我管理委员会中心副主任，校自强社副部长，校阳光心理协会副部长，校学习与发展协会副部长，校奖助学金工作室副部长，"
		+"校广播台副部长，校学生电视台副部长，大学生记者团副部长，学部（学院）自强社副部长，学部（学院）阳光心理协会副部长，班委会委员，"
		+"团支部委员，班级心理委员，寝室长","6");
	obj_arr[5]=new json("校社团联合会干事，学生会干事，团委干事，自强社干事，阳光心理协会干事，大学生自我管理委员会干事，校学习与发展协会干事，"
		+"校奖助学金工作室干事，校电视台台员，校广播台台员，大学生记者团团员，学生调研员","4");
	var arr=[null,"position","score"];
	var id="work_admin_info";
	delTableRow(id);
	for(var i=0;i<obj_arr.length;i++){
		addTableRow(obj_arr[i],id,arr);
	}
}
function setWorkScore(){
	var checkbox_arr=document.getElementsByName("work_admin_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var obj=checkbox_arr[i].parentNode.parentNode.getElementsByTagName('td');
			var params=new json(obj[1].innerHTML,obj[2].innerHTML);
			var action="WorkScore";
			var failStr="插入失败，请检查是否重复录入该项";
			executeAjax(null,action,params,getWorkScore,failStr);
			checkbox_arr[i].checked=false;
		}
	}
}
function getWorkScore(){
	var table="work_admin_info";
	var action="GetWorkScore";
	var params="";
	var arr=["ws_id","ws_position","ws_score"];
	setTable(table,action,params,arr);
}
function setWorkReward(){
	var checkbox_arr=document.getElementsByName("work_reward_info_operate");
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var obj=checkbox_arr[i].parentNode.parentNode.getElementsByTagName('td');
			var params={
				"name":"社会工作优秀干部",
				"describe_a":obj[2].innerHTML,
				"describe_b":obj[1].innerHTML,
				"type":"社会工作",
				"score":obj[3].innerHTML,
				"ratio":"1.0"
			};
			setItemScore(null,params,getWorkReward);
		}
	}
}
function getWorkReward(){
	var table="work_reward_info";
	var params={"name":"社会工作优秀干部"};
	var arr=["its_id","its_describe_b","its_describe_a","its_score"];
	setTable(table,params,arr);
}