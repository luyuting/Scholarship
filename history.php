<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>申请历史</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/gather.css"/>
	<link rel="stylesheet" href="css/history.css"/>
</head>
<body>
	<?php 
		include('nav.php');
		require_once('php/dao/BaseDao.php');
		class HistoryDao extends BaseDao{
			public function applyHistory($ap_student,$sc_annual){
				$sql="select count(*) num,sc_name from t_apply,t_scholarship where sc_annual='$sc_annual' and sc_id=
					ap_scho_type and ap_student='$ap_student' group by(sc_name) order by sc_name asc";
				return $this->query($sql);
			}
		}
	?>
	<div class="main-box">
	<?php 
			$year=Date("Y");
			$hDao=new HistoryDao;
			$ap_student=$_SESSION['u_sid'];
			for($i=2013;$i<=$year;$i++){
				$describe=array();
				switch($i){
					case 2013:$describe[]="使用校园资助网进行奖学金评审";break;
					case 2014:
						$describe[]="Torch奖学金评审系统1.0";
						$describe[]="职业生涯档案系统";
						break;
					case 2015:
						$describe[]="Torch奖学金评审系统2.0";
						break;
					default:;break;
				}
				echo "<div class='section'>
						<div class='arrow'>{$i}</div>";
				for($j=0;$j<count($describe);$j++)
					echo "<span class='describe'>
							{$describe[$j]}
						</span>";
				$history_arr=$hDao->applyHistory($ap_student,$i);
				echo "<div>";
				for($k=0;$k<count($history_arr);$k++){
					echo "<span class='describe audit'>
							{$history_arr[$k]->sc_name}（审核中）
						</span>";
				}
				echo "</div></div>";
			}
		?>
</div>
<center>
	<div class="bottom">
		Copyright © 2014 - 2015 Torch.All Rights Reserved.<br>
		Torch职业生涯规划团队 版权所有
	</div>
	</center>
</body>
</html>