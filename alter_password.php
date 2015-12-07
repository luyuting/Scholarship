<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改密码</title>
<link rel="stylesheet" href="css/alter_password.css" />
<script src="js/alter_password.js"></script>
</head>
<body>
	<?php include('nav.php');?>
	<div id="alter_box">
		<center>
		<form name="alterForm" action="php/student_action/AlterPassword.php" method="post">
			<div class="title"><img src="image/operate.png" title="修改密码"/>修改密码</div>
			<div><label>学号</label><input type="text" name="user_id" readonly="true" value=<?php @session_start();echo $_SESSION['u_sid'];?> /></div>
			<div><label>原始密码</label><input type="password" name="ori_pwd" onpaste="return false;" placeholder="请输入原始密码"/></div>
			<div><label>修改密码</label><input type="password" name="new_pwd" onpaste="return false;" placeholder="请输入修改密码"/></div>
			<div><label>确认密码</label><input type="password" name="con_pwd" onpaste="return false;" placeholder="请确认新密码"/></div>
			<input type="reset" class="button-success" value="重&nbsp;&nbsp;置"/>
			<input type="button" class="button-success" value="提&nbsp;&nbsp;交" onclick="checkPwd()"/>
		</form>
		</center>
	</div>
</body>
</html>