function add(id){
	var cover=document.getElementById(id);
	cover.style.display="block";
	document.body.style.overflow="hidden";
}
function hideCover(id){
	var cover=document.getElementById(id);
	cover.style.display="none";
	document.body.style.overflow="auto";
}
function del(obj,action,fun){
	var name=obj.parentNode.parentNode.getElementsByTagName('tbody')[0].id+"_operate";
	var checkbox_arr=document.getElementsByName(name);
	var check=obj.parentNode.getElementsByTagName('input')[0];
	for(var i=0;i<checkbox_arr.length;i++){
		if(checkbox_arr[i].checked){
			var params={"ap_id":checkbox_arr[i].value};
			$.ajax({
				type : "post",
				url : "php/student_action/"+action+".php",
				data : params,
				dataType : "text",
				success : function(result){
					if(result==true){
						fun();
						check.checked=false;
					}
					else
						alert("删除失败");
				},
				error : function(json){
					alert("error " + json);
				}
			});
		}
	}
}