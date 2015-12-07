window.onload=function(){
	getScholarship();
}
function getScholarship(){
	delTableRow();
	$.ajax({
		type : "post",
		url : "php/action/SchoType.php",
		data : "",
		dataType : "text",
		success : function(json){
			var obj=$.parseJSON(json);
			for(var i=0;i<obj.length;i++)
				addTableRow(obj[i]);
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
function setScholarship(){
	var params = {
		"sc_name" : sc_name.value,
		"sc_ratio" : sc_ratio.value+"%",
	};
	$.ajax({
		type : "post",
		url : "php/action/SchoRatio.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(!result){
				alert("插入失败，请检查该单项是否已经录入过");
				return false;
			}
			sc_ratio.value="";
			getScholarship();
		},
		error : function(json){
			alert("error " + json);
		}
	});
}
var arr=["sc_name","sc_grade","sc_annual","sc_ratio"];
function addTableRow(cols){
	var table = document.getElementById("info");
     var tr = table.insertRow();
     for(var i = 0; i <= arr.length; i++){
        var td = tr.insertCell(i);
        if(i == 0){
        	td.setAttribute("text-align", "center");
        	var newInput = document.createElement("input"); 
        	newInput.type = "checkbox";
        	newInput.name = "operate";
        	newInput.value = cols["sc_id"];
        	td.appendChild(newInput);
        }
        else{
	        td.setAttribute("text-align", "center");
	        td.value = cols["sc_id"];
	        td.onclick = function (){
	        }
	        if(window.navigator.userAgent.toLowerCase().indexOf("firefox")!=-1){
	        	td.textContent = cols[arr[i-1]];
	        }
	        else{
	        	td.innerText = cols[arr[i-1]];
	        }
        }
	}
}
function delTableRow(){
	var table = document.getElementById("info");
   	while(table.getElementsByTagName("tr").length > 0){
        table.removeChild(table.getElementsByTagName("tr")[0]);
    }
}
