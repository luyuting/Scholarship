<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>奖学金当前排名</title>
	<link rel="stylesheet" href="css/order.css"/>
	<script src="js/jquery-1.8.2.min.js"></script>
</head>
<body>
<center>
<?php
	require_once('php/dao/OrderDao.php');
	$orderDao=new OrderDao;
	session_start();
	$user_id=$_SESSION['u_sid'];
	function printTable($arr){
		echo "<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>分数</th>
					<th>排名</th>
				</tr>
			</thead>
			<tbody>";
		for($i=0;$i<count($arr);$i++){
			echo "<tr>";
				for($j=0;$j<count($arr[$i]);$j++)
					echo "<td>{$arr[$i][$j]}</td>";
			echo "</tr>";
		}		
		echo "</tbody>
		</table>";
	}
	$study=$orderDao->getStudyScho($user_id);
	$spiritual=$orderDao->getSpiritualScho($user_id);
	$activity=$orderDao->getActivityScho($user_id);
	$work=$orderDao->getWorkScho($user_id);
	$scie_tech=$orderDao->getScieTechScho($user_id);
	$practice=$orderDao->getPracticeScho($user_id);
	echo "<h3>学习优秀奖学金</h3>";
			echo "<table>
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>成绩排名</th>
					<th>奖学金类型</th>
				</tr>
			</thead>
			<tbody>";
		for($i=0;$i<count($study);$i++){
			echo "<tr>";
				for($j=0;$j<count($study[$i]);$j++)
					echo "<td>{$study[$i][$j]}</td>";
			echo "</tr>";
		}		
		echo "</tbody>
		</table>";
	echo "<h3>精神文明奖学金</h3>";
	printTable($spiritual);
	echo "<h3>文体活动奖学金</h3>";
	printTable($activity);
	echo "<h3>社会工作奖学金</h3>";
	printTable($work);
	echo "<h3>科技创新奖学金</h3>";
	printTable($scie_tech);
	echo "<h3>社会实践奖学金</h3>";
	printTable($practice);
?>
</center>
</body>
</html>