<!DOCTYPE html>
<html>
<head>
	<title>Analysis->Luyuting</title>
</head>
<style>
	@charset "utf-8";
	* {
		font-family: 'Microsoft YaHei';
	}
	h2 {
		font-family: '宋体';
	}
	table{
		font-size:14px;
		text-align:center;
		border-collapse: collapse;
		border-spacing: 0;
		clear:both;
		margin:20px auto;
	}
	th {
		height: auto;
		border-bottom: 0;
		color: #666;
		background-color: #f2f2f2;
		white-space: nowrap;
	}
	tr{
		background-color: #f9f9f9 !important;
	}
	td,th{
		padding: 6px 12px;
		border: 1px solid #dddddd;
		min-width: 12em;
	}
</style>
<?php 
	header("content-type : text/html; charset = utf-8"); 
	$arr = array();
	
	$file = 'd:/analysis.txt';
	$fp = fopen($file, "r");      
	while (!feof($fp)) {            
		$buffer = fgets($fp, 4096);  
		$col = explode("\t", (strtoupper($buffer)));
		$col[count($col)-1] = trim($col[count($col)-1]);
		$arr[] = $col;
	}
	fclose($fp); 
	
	$key = array('流动比率', '速动比率','资产负债率', '权益负债比率', '自有资本率', '利息保障倍数', '固定比率', '资本收益率', '资产净利率', '销售毛利率', 
		'销售净利润', '应收账款周转率', '存货周转率', '流动资金周转率', '流动资产周转率', '固定资产周转率', '资产周转率', '销售成本率', '成本利润率');
	
	echo 
	"<table>
		<tbody>";
	for($i = 0; $i < count($arr); $i++) {
		echo "<tr>";
		for($j = 0; $j < count($arr[$i]); $j++){
			if(count($arr[$i]) == 1)
				break;
			if($i == 0 || $j == 0)
				echo "<th>{$arr[$i][$j]}</th>";
			else
				echo "<td>{$arr[$i][$j]}</td>";
		}
		echo "</tr>";
	}
	echo "</tbody></table>";
	
	echo 
	"<center><h2>结果分析</h2></center><table>
		<thead>
			<tr>
				<th></th>
				<th>2011</th>
				<th>2012</th>
				<th>2013</th>
				<th>2012 对 2011 增长 / 增长率<br>（保留5位小数）</th>
				<th>2013 对 2012 增长 / 增长率<br>（保留5位小数）</th>
			</tr>
		</thead>
		<tbody>";
	for($i = 0; $i < count($key); $i++) {
		echo "<tr><th>{$key[$i]}</th>";
		$value = null;
		$compare = array();
		for($j = 0; $j < 3; $j++){
			switch($i) {
				case 0: $value = $arr[1][$j + 1] / $arr[2][$j + 1];break;
				case 1: $value = ($arr[1][$j + 1] - $arr[18][$j + 1]) / $arr[2][$j + 1];break;
				case 2: $value = $arr[4][$j + 1] / $arr[3][$j + 1];break;
				case 3: $value = $arr[5][$j + 1] / $arr[4][$j + 1];break;
				case 4: $value = $arr[5][$j + 1] / $arr[3][$j + 1];break;
				case 5: $value = $arr[6][$j + 1] / $arr[7][$j + 1];break;
				case 6: $value = $arr[5][$j + 1] / $arr[8][$j + 1];break;
				case 7: $value = $arr[12][$j + 1] / $arr[5][$j + 1];break;
				case 8: $value = $arr[12][$j + 1] / ($arr[9][$j + 1] + $arr[3][$j + 1]) *2;break;
				case 10: $value = $arr[12][$j + 1] / $arr[11][$j + 1];break;
				case 11: $value = $arr[11][$j + 1] / ($arr[13][$j + 1] + $arr[14][$j + 1]) *2;break;
				case 12: $value = $arr[16][$j + 1] / ($arr[17][$j + 1] + $arr[18][$j + 1]) *2;break;
				case 13: $value = $arr[11][$j + 1] / ($arr[26][$j + 1] + $arr[27][$j + 1]) *2;break;
				case 14: $value = $arr[11][$j + 1] / ($arr[22][$j + 1] + $arr[23][$j + 1]) *2;break;
				case 15: $value = $arr[11][$j + 1] / ($arr[24][$j + 1] + $arr[25][$j + 1]) *2;break;
				case 16: $value = $arr[11][$j + 1] / ($arr[9][$j + 1] + $arr[3][$j + 1]) *2;break;
				case 17: $value = $arr[16][$j + 1] / $arr[11][$j + 1];break;
				case 18: $value = $arr[12][$j + 1] / $arr[16][$j + 1];break;
			}
			echo "<td>{$value}</td>";
			$compare[] = $value;
		}
		$comp_a = null;
		$comp_b = null;
		if($compare[0] != null) {
			$comp_a = round($compare[1] - $compare[0], 5) . " / " . round(($compare[1] - $compare[0]) / $compare[0], 5);
			$comp_b = round($compare[2] - $compare[1], 5) . " / " . round(($compare[2] - $compare[1]) / $compare[1], 5);
		}
		echo "<td>{$comp_a}</td>";
		echo "<td>{$comp_b}</td>";
		echo "</tr>";
	}
	echo "</tbody></table>";
	
	echo "</body></html>";