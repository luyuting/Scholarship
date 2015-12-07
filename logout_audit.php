<?php
	session_start();
	//$_SESSION=array();
	//session_unset();
	unset($_SESSION['admin']);
	//session_destroy();
	header("location:login_audit.html");
?>