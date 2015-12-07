<?php
	session_start();
	//$_SESSION=array();
	//session_unset();
	unset($_SESSION['u_sid']);
	//session_destroy();
	header("location:login.html");
?>