function checkPwd(){
	var pwd=alterForm.new_pwd.value;
	var ori_pwd=alterForm.ori_pwd.value;
	if(ori_pwd==""||/^\s+$/.test(ori_pwd)){
		alert("原始密码不能为空或包含空格");
		alterForm.ori_pwd.focus();
	}
	else if(!/^[a-zA-Z0-9]\w{0,15}$/.test(pwd)){
		alterForm.new_pwd.focus();
		alert("新密码应由数字或字母组成，0-16位");
	}
	else if(pwd!=alterForm.con_pwd.value){
		alterForm.con_pwd.focus();
		alert("密码确认错误");
	}
	else
		alterForm.submit();
}