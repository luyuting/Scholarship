<?php 
	@session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>location='error.php';</script>";
		exit;
	}
?>