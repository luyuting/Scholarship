<html>
<head>
<title>错误提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
	function forward(){
   		location.href="notice.php";
   	}
    var Time = 0;
    function timedCount(){
		document.getElementById("time").innerHTML = 5 - Time;
		++Time;
		if(parseInt(Time) >= 5) 
			forward();
		else{
    	 	t=setTimeout("timedCount()", 1000);
		}
	}
</script>
<style>
	body{
		background:url(image/background.jpg);
	}
	div{
	width:80%;
	margin:auto;
	padding:10px 5px;
	border: 1px solid #e1e1e1;
	-webkit-box-shadow: 0 0 3px #eee,inset 0 0 3px #fff;
	box-shadow: 0 0 3px #eee,inset 0 0 3px #fff;
	background: #fbfbfb;
	border-radius:7px;
}
</style>
</head>
<body>
<center>
	<div style="margin-top:200px;">
        <h1>当前不在申请时间内，<font color="red"><span id="time"></span></font>秒钟之后跳转回主页！</h1>
    </div>
	<script>window.onload=function(){timedCount();}</script>
</center>
<body>
<html>