window.onload=function(){
	init();
}

function scoreParams(name,describe_a,describe_b,score,ratio){
	this.name=name;
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.type="社会实践";
	this.score=score;
	this.ratio=ratio;
}

function json(describe_a,describe_b,score){
	this.describe_a=describe_a;
	this.describe_b=describe_b;
	this.score=score;
}
function init(){
	var obj_arr=new Array();
	/**
	**	条件1
	*/
	obj_arr[0]=new json("社区挂职",null,"5");
	obj_arr[1]=new json("校社区挂职","优秀个人","2");
	obj_arr[2]=new json("校社区挂职","锻炼标兵","4");
	/**
	**	条件2
	*/
	obj_arr[3]=new json("优秀志愿者","国家级","20");
	obj_arr[4]=new json("优秀志愿者","省级","15");
	obj_arr[5]=new json("优秀志愿者","市级","10");
	obj_arr[6]=new json("优秀志愿者","校级","7");
	obj_arr[7]=new json("优秀志愿者","学部级","5");
	/**
	**	条件3
	*/
	obj_arr[8]=new json("寒暑假社会调查","个人调查报告一等奖","3");
	obj_arr[9]=new json("寒暑假社会调查","个人调查报告二等奖","2");
	obj_arr[10]=new json("寒暑假社会调查","个人调查报告三等奖","1");
	/**
	**	条件4
	*/
	obj_arr[11]=new json("寒暑假社会实践","团队队长","3");
	obj_arr[12]=new json("寒暑假社会实践","团队成员","2");

	obj_arr[13]=new json("实践团队","获国家级奖","8");
	obj_arr[14]=new json("实践团队","获省级奖","6");
	obj_arr[15]=new json("实践团队","获市级奖","4");
	
	obj_arr[16]=new json("实践团队","获校一等奖","3");
	obj_arr[17]=new json("实践团队","获校二等奖","2");
	obj_arr[18]=new json("实践团队","获校三等奖","1");
	
	obj_arr[19]=new json("国家级社会实践","优秀个人称号","10");
	obj_arr[20]=new json("省级社会实践","优秀个人称号","7");
	obj_arr[21]=new json("市级社会实践","优秀个人称号","4");
	
	obj_arr[22]=new json("校级社会实践","优秀个人一等奖","3");
	obj_arr[23]=new json("校级社会实践","优秀个人二等奖","2");
	obj_arr[24]=new json("校级社会实践","优秀个人三等奖","1");
	/**
	**	条件5
	*/
	obj_arr[25]=new json("军训","先进集体成员","2");
	obj_arr[26]=new json("军训","先进个人称号","2");
	/**
	**	条件6
	*/
	obj_arr[27]=new json("其它类社会实践",null,"1");
	var arr=[null,"describe_a","describe_b","score"];
	var id="practice_admin_info";
	delTableRow(id);
	for(var i=0;i<obj_arr.length;i++){
		addTableRow(obj_arr[i],id,arr);
	}
}