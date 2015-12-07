var table_arr_clone=new Array();
function setBaseInfo(action,id,arr){
   	$.ajax({
   		type : "post",
   		url : "php/audit_action/"+action+".php",
   		data : "",
   		dataType : "text",
   		success : function(json){
			var obj_arr = $.parseJSON(json);
			$("#"+id).empty();
   			for(var i = 0; i < obj_arr.length; i++){
   				addTableRow(obj_arr[i],id,arr);
   			}
			if(searchUser.value!=""){
				var table_arr=document.getElementsByTagName('tbody');
				for(var i=0;i<table_arr.length;i++)
					if(table_arr[i].id==id){
						table_arr_clone[i]=table_arr[i].cloneNode(true);
						break;
					}
				searchByUser();
			}
		},
		error : function(json){
   			alert("error " + json);
   		}
   	});
}	
function schoRemark(obj,fun){
	var check=obj.parentNode.getElementsByTagName('input')[0];
	var input=obj.parentNode.parentNode.getElementsByTagName('input')[0];
	var ap_remark=input.value;
	if(ap_remark==""||/^\s+$/.test(ap_remark)){
		input.focus();
		return false;
	}
	var name = obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate";
	var obj_arr=document.getElementsByName(name);
	for(var i=0;i<obj_arr.length;i++)
		if(obj_arr[i].checked==true){
			var params={
				"ap_id" : obj_arr[i].value,
				"ap_remark" : ap_remark
			};
			$.ajax({
				type : "post",
				url : "php/audit_action/SchoRemark.php",
				data : params,
				dataType : "text",
				success : function(result){
					if(result==true){
						fun();
						input.value="";
						check.checked=false;
					}
				},
				error : function(json){
					alert("error " + json);
				}
		});
	}
}
function schoFail(obj,fun){
	operate("不通过",obj,fun);
}
function schoPass(obj,fun){
	operate("通过",obj,fun);
}	
function operate(state,obj,fun){
	var check=obj.parentNode.getElementsByTagName('input')[0];
	var name = obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate";
	var obj_arr=document.getElementsByName(name);
	for(var i=0;i<obj_arr.length;i++)
		if(obj_arr[i].checked==true){
			var params={
				"ap_id" : obj_arr[i].value,
				"ap_state" : state
			};
			schoState(params,fun)
			check.checked=false;
		}
}	
function schoState(params,fun){
	$.ajax({
		type : "post",
		url : "php/audit_action/SchoState.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true){
				fun();
			}
			//如果插入失败，也应当去除选择框的勾勾
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function searchByUser(){
	var user=searchUser.value;	
	if(table_arr_clone.length==0){
		var t=document.getElementsByTagName('tbody');
		for(var i=0;i<t.length;i++){
			table_arr_clone[i]=t[i].cloneNode(true);
		}
	}
	var table_arr=document.getElementsByTagName('tbody');
	for(var i=0;i<table_arr.length;i++){
		$("#"+table_arr[i].id).empty();
		var tr_arr=table_arr_clone[i].childNodes;
		for(var j=0;j<tr_arr.length;j++){
			var td_arr=tr_arr[j].childNodes;
			if(td_arr[1].innerHTML==user||td_arr[2].innerHTML==user)
				table_arr[i].appendChild(tr_arr[j].cloneNode(true));
		}
	}
}