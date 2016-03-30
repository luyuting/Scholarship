<?php 
    // 超出申请时间执行，正常申请时注释这部分代码，考虑加入时间判断而不是人工干预
	@session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>location='error.php';</script>";
		exit;
	}
?>