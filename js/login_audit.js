window.onload=function(){
	var y=document.body.clientHeight/2;
	var h=login.offsetHeight;
	login.style.marginTop=y-h/2+"px";
	document.onkeypress=pressEnter;
}
function pressEnter(event){
	var e = event||window.event; 
    var keyCode=e.keyCode||e.which;
    var isEnter=e.EnterKey||(keyCode == 13 )||false ;
	if(isEnter)
		checkLogin();
}
function checkLogin(){
	params={
		"ad_id" : userid.value,
		"ad_password" : password.value
	};
	$.ajax({
		type : "post",
		url : "php/action/AdminLogin.php",
		data : params,
		dataType : "text",
		success : function(result){
			if(result==true)
				location.href="study_audit.php";
			else{
				alert("登录失败，用户名或密码错误");
				form.reset();
			}
		},
		error : function(json){
			alert("error " + json);
		}
	});
}