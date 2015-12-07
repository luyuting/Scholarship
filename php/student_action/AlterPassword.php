<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
	var redirect="#";
	function forward(){
   		location.href="../../"+redirect+".php";
   	}
    var Time = 0;
    function timedCount(){
		document.getElementById("time").innerHTML = 3 - Time;
		++Time;
		if(parseInt(Time) >= 3) 
			forward();
		else{
    	 	t=setTimeout("timedCount()", 1000);
		}
	}
</script>
<?php 
	require_once('../dao/LoginDao.php');
	
	$user_id=$_POST['user_id'];
	$ori_pwd=$_POST['ori_pwd'];
	$new_pwd=$_POST['new_pwd'];
	
	$loginDao=new LoginDao;
	$obj_arr=$loginDao->getUserPassword($user_id);
	if($ori_pwd!=$obj_arr[0]->user_password){
		echo 
<<<EOD
	<center>
	<div style="margin-top:200px;">
        <h1>原始密码输入错误，<font color="red"><span id="time"></span></font>秒钟之后跳转回修改密码页面！</h1>
    </div>
	<script>window.onload=function(){redirect='alter_password';timedCount();}</script>
	</center>
EOD;
		exit;
	}
	if($ori_pwd==$new_pwd){
		echo
<<<EOD
	<center>
	<div style="margin-top:200px;">
        <h1>新密码与原始密码相同，修改失败，<font color="red"><span id="time"></span></font>秒钟之后跳转回修改密码页面！</h1>
    </div>
	<script>window.onload=function(){redirect='alter_password';timedCount();}</script>
	</center>
EOD;
		exit;
	}
	if($loginDao->setUserPassword($user_id,$new_pwd)>0){
		echo 
<<<EOD
	<center>
	<div style="margin-top:200px;">
        <h1>密码修改成功，<font color="red"><span id="time"></span></font>秒钟之后跳转登录页面！</h1>
    </div>
	<script>window.onload=function(){redirect='logout';timedCount();}</script>
	</center>
EOD;
	}
?>