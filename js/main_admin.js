window.onload=function(){
	init();
	setInfo();
}
function init(){
	var now=new Date();
	var year=now.getFullYear();
	for(var i=2014;i<=year;i++)
		ad_annual.options.add(new Option(i+"年度",i));
	for(var i=2012;i<year;i++)
		ad_grade.options.add(new Option("管经"+i+"级"));
}
function setInfo(){
	$.ajax({
		type : "post",
		url : "php/action/AdminSetting.php",
		data : "",
		dataType : "text",
		success : function(json){
			var obj_arr=$.parseJSON(json);
			var obj=obj_arr[0];
			ad_grade.value=obj.ad_grade;
			ad_annual.value=obj.ad_annual;
			ad_grade_text.innerHTML="年级:"+obj.ad_grade;
			ad_annual_text.innerHTML="年度:"+obj.ad_annual+"年度";
		},
		error : function(json){
			alert("error " + json);
		}
	});
}