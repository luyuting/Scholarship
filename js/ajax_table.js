/**
**	全选
*/
function checkAll(obj){
	var e = window.event||arguments.callee.caller.arguments[0];//后者兼容firefox 
	var ele=e.srcElement||e.target;
	var check_state=obj.firstChild.checked;
	if(ele.type!="checkbox"){
		check_state=!check_state;
		obj.firstChild.checked=check_state;
	}
	var checkbox_arr=document.getElementsByName(obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate");
	for(var i=0;i<checkbox_arr.length;i++)
		checkbox_arr[i].checked=check_state;
	//checkNum=checkbox_arr.length;
}
/**
**	ajax
*/
function ajax(action,params,fun){
	$.ajax({
		type:"post",
		url:"php/action/"+action+".php",
		data:params,
		dataType:"text",
		success:fun,
		error : function(json){
			alert("error " + json);
		}
	});
}

/**
** 插入成功后清除勾选框和输入框中数据
*/

function clear(id){
	if(id==null)
		return;
	var input_arr=document.getElementById(id).getElementsByTagName('input');
	for(var i=0;i<input_arr.length;i++){
		if(input_arr[i].type=="checkbox")
			input_arr[i].checked=false;
		else
			input_arr[i].value="";
	}
}
/**
**	复选框字符串拼接
*/
function rateStr(name){
	var obj_arr=document.getElementsByName(name);
	var str="";
	var count=0;
	for(var i=0;i<obj_arr.length;i++){
		if(obj_arr[i].checked==true){
			if(count!=0)
				str+="，";
			str+=obj_arr[i].value;
			count++;
		}
	}
	return str;
}

/** 
**	表格插入和删除行的处理
*/

function addTableRow(cols,id,arr){
	var table=document.getElementById(id);
	var tr=table.insertRow();
	for(var i=0;i<arr.length;i++){
		var td=tr.insertCell(i);
		td.setAttribute("text-align","center");
		if(i==0){
			var newInput=document.createElement("input");
			newInput.type="checkbox";
			newInput.name=id+"_operate";
			newInput.value=cols[arr[0]];
			td.appendChild(newInput);
		}
		else{
			td.value=cols[arr[0]];
			td.onclick=function(){
			}
			if(window.navigator.userAgent.toLowerCase().indexOf("firefox")!=-1){
	        	td.textContent = cols[arr[i]];
	        }
	        else{
	        	td.innerText = cols[arr[i]];
	        }
		}
	}
}

function delTableRow(id){
	var table = document.getElementById(id);
   	while(table.getElementsByTagName("tr").length > 0){
        table.removeChild(table.getElementsByTagName("tr")[0]);
    }
}

/**
**	表格多行删除
*/

function delComp(obj,tablefun){
	var action="DelComp";
	multiDel(action,obj,tablefun);
}
function delItemScore(obj,tablefun){
	var action="DelItemScore";
	multiDel(action,obj,tablefun);
}

function multiDel(action,obj,tablefun){
	var failStr="删除失败";
	var name=obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate";
	var checkbox_arr=document.getElementsByName(name);
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var params={"id":checkbox_arr[i].value};
			executeAjax(null,action,params,tablefun,failStr);
		}
	}
}

/**
**	奖学金各单项的相应分数录入
*/

function setItemScore(id,params,tablefun){
	var action="ItemScore";
	var failStr="插入失败，请检查是否重复录入该项";
	executeAjax(id,action,params,tablefun,failStr);
}

function executeAjax(id,action,params,tablefun,failStr){
	ajax(action,params,function(result){
		if(result==true){
			tablefun();
			clear(id);
		}
		else
			alert(failStr);
	});
}

/**
**	插入成功更新表格
*/
function setTable(table,action,params,arr){
	ajax(action,params,function(json){
		var obj_arr = $.parseJSON(json);
		delTableRow(table);
		for(var i=0;i<obj_arr.length;i++){
			addTableRow(obj_arr[i],table,arr);
		}
	});
}

function setScoreTable(table,params,arr){
	var action="GetItemScore";
	setTable(table,action,params,arr);
}


