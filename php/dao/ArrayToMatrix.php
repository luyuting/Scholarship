<!DOCTYPE html>
<html>
<head>
	<title>Array To Matrix</title>
	<meta charset = "utf-8"/>
</head>
<style>
	@charset "utf-8";
	* {
		font-family:'Microsoft YaHei';
	}
	table{
		font-size:14px;
		text-align:center;
		border-collapse: collapse;
		border-spacing: 0;
		clear:both;
		margin:10px auto;
	}
	th {
		height: auto;
		font-size: 12px;
		border-bottom: 0;
		color: #666;
		background-color: #f2f2f2;
		white-space: nowrap;
		min-width: 8em;
	}
	tr{
		background-color: #f9f9f9 !important;
	}
	td,th{
		padding: 6px 12px;
		border: 1px solid #dddddd;
	}
</style>
<?php 
	header("content-type : text/html; charset = utf-8"); 
	$arr = array();
	
	/**
	*	@Note 读取分列后的关键词表
	*/
	$file = 'd:/word.txt';
	
	/**
	*	以只读的方式读取文件
	*/
	$fp = fopen($file, "r");      
	while (!feof($fp)) { 
		/**
		*	逐行读取字符流
		*/
		$buffer = fgets($fp, 4096); 
		
		/**
		*	strtoupper函数：将关键词统一转换为大写，如ajax、Ajax、AJAX等同一词汇不同大小写的写法，以AJAX代替
		* 	explode函数：从excel粘贴到txt文档的数据，每列之间以制表符作为分隔
		*	每行的关键词生成一个$col数组
		*/
		$col = explode("\t", (strtoupper($buffer)));	

		/**
		*	去除每行最后一个关键字读取的行结束符
		*/
		$col[count($col)-1] = trim($col[count($col)-1]);

		/**
		*	逐行添加到$arr数组中（$arr是二维数组）
		*/
		$arr[] = $col;
	}
	fclose($fp);     
	
	/**
	*	@Note 读取高频关键词
	*/
	$keys = array();
	$file = 'd:/key.txt';
	$fp = fopen($file, "r");      
	while (!feof($fp)) {            
		$buffer = fgets($fp, 4096);  
		$keys[] = trim((strtoupper($buffer)));
	}
	fclose($fp);
	
	/**
	*	统计每两个关键词同时出现的次数
	*/
	$sum = array();
	for($i = 0; $i < count($keys); $i++) {
		$row = array();
		for($j = 0; $j <= $i; $j++) {
			$count = 0;
			for($k = 0; $k < count($arr); $k++)
				if(in_array($keys[$i], $arr[$k])&&in_array($keys[$j], $arr[$k])) {
					$count++;
				}
			$row[] = array('key_one' => $keys[$i], 'key_two' => $keys[$j], 'count' => $count);
		}
		$sum[] = $row;
	}
	
	echo "<body>";
	
	/**
	*	@Note 共词矩阵
	*/
	echo 
	"<table>
		<thead>
			<tr>
				<th></th>";
	for($i = 0; $i < count($keys); $i++) {
		echo "<th>{$keys[$i]}</th>";
	}
	echo 
			"</tr>
		</thead>
	<tbody>";
	for($i = 0; $i < count($sum); $i++) {
		echo "<tr><th>{$keys[$i]}</th>";
		for($j = 0; $j < count($sum[$i]); $j++){
			echo "<td>{$sum[$i][$j]['count']}</td>";
		}
		for(; $j < count($sum); $j++) {
			echo "<td>{$sum[$j][$i]['count']}</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";
	
	/**
	*	@Note 相似矩阵
	*/
	echo 
	"<table>
		<thead>
			<tr>
				<th></th>";
	for($i = 0; $i < count($keys); $i++) {
		echo "<th>{$keys[$i]}</th>";
	}
	echo 
			"</tr>
		</thead>
	<tbody>";

	
	for($i = 0; $i < count($sum); $i++) {
		echo "<tr><th>{$keys[$i]}</th>";
		for($j = 0; $j < count($sum[$i]); $j++){
			$value = $sum[$i][$j]['count']/sqrt($sum[$i][$i]['count']*$sum[$j][$j]['count']);
			echo "<td>{$value}</td>";
		}
		for(; $j < count($sum); $j++) {
			$value = $sum[$j][$i]['count']/sqrt($sum[$i][$i]['count']*$sum[$j][$j]['count']);
			echo "<td>{$value}</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";
	
	/**
	*	@Note 相异矩阵
	*/
	echo 
	"<table>
		<thead>
			<tr>
				<th></th>";
	for($i = 0; $i < count($keys); $i++) {
		echo "<th>{$keys[$i]}</th>";
	}
	echo 
			"</tr>
		</thead>
	<tbody>";
	for($i = 0; $i < count($sum); $i++) {
		echo "<tr><th>{$keys[$i]}</th>";
		for($j = 0; $j < count($sum[$i]); $j++){
			$value = 1 - $sum[$i][$j]['count']/sqrt($sum[$i][$i]['count']*$sum[$j][$j]['count']);
			echo "<td>{$value}</td>";
		}
		for(; $j < count($sum); $j++) {
			$value = 1 - $sum[$j][$i]['count']/sqrt($sum[$i][$i]['count']*$sum[$j][$j]['count']);
			echo "<td>{$value}</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";
	echo "</body></html>";
?>