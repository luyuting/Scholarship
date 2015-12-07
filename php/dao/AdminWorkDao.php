<?php
	//字段长度过长另放一个表存储
	
	require_once('BaseDao.php');
	class AdminWorkDao extends BaseDao{
		public function setWorkScore($position,$score,$sc_admin){
			$sql="insert into t_work_score values(uuid(),(select sc_id from t_scholarship where
				sc_name like '%社会工作%' and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin')),'$position',$score)";
			return $this->execute($sql);
		}
		
		public function getWorkScore($sc_admin){
			$sql="select i.* from t_work_score i,t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_id=its_type order by ws_score desc";
			return $this->query($sql);
		}
		
		public function delWorkScore($id){
			$sql="delete from t_work_score where ws_id='$id'";
			return $this->execute($sql);
		}
	}
?>