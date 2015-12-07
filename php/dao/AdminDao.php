<?php 
	require_once('BaseDao.php');
	class AdminDao extends BaseDao{
		public function getAdminSetting($ad_id){
			$sql="select ad_name,ad_grade,ad_annual from t_admin where ad_id='$ad_id'";
			return $this->query($sql);
		}
		
		public function setScholarship($sc_name,$sc_ratio,$sc_admin){
			$sql="insert into t_scholarship values(uuid(),'$sc_name','$sc_ratio',(select ad_grade
				from t_admin where ad_id='$sc_admin'),(select ad_annual from t_admin where ad_id=
				'$sc_admin'),'$sc_admin')";
			return $this->execute($sql);
		}
		
		public function getScholarship($sc_admin){
			$sql="select * from t_scholarship where sc_grade=(select ad_grade from t_admin where 
				ad_id='$sc_admin') and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin')";
			return $this->query($sql);
		}
		
		private function setCompetition($cp_name,$cp_rate,$sc_admin,$cp_type){
			$sql="insert into t_competition values(uuid(),'$cp_name','$cp_rate',(select sc_id from t_scholarship where
				sc_name like '%$cp_type%' and sc_admin='$sc_admin'),now())";
			return $this->execute($sql);
		}
		
		private function getCompetition($sc_admin,$cp_type){
			$sql="select cp_id,cp_name,cp_rate from t_scholarship,t_competition where sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_id=cp_type and sc_name like '%$cp_type%' order by cp_time asc";
			return $this->query($sql); 
		}
		
		public function getScieTechComp($sc_admin){
			return $this->getCompetition($sc_admin,"科技创新");
		}
		
		public function setScieTechComp($cp_name,$cp_rate,$sc_admin){
			return $this->setCompetition($cp_name,$cp_rate,$sc_admin,"科技创新");
		}
		
		public function getActivityComp($sc_admin){
			return $this->getCompetition($sc_admin,"文体活动");
		}
		
		public function delComp($id){
			$sql="delete from t_competition where cp_id='$id'";
			return $this->execute($sql);
		}
		
		public function setActivityComp($cp_name,$cp_rate,$sc_admin){
			return $this->setCompetition($cp_name,$cp_rate,$sc_admin,"文体活动");
		}
		
		public function setItemScore($name,$describe_a,$describe_b,$score,$ratio,$sc_admin,$type){
			$sql="insert into t_item_score values(uuid(),(select sc_id from t_scholarship where
				sc_name like '%$type%' and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin')),'$name','$describe_a','$describe_b',$score,$ratio)";
			return $this->execute($sql);
		}
		public function getItemScore($name,$sc_admin){
			$sql="select i.* from t_item_score i,t_scholarship where sc_admin='$sc_admin' and 
				sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and 
				sc_id=its_type and its_name='$name' order by its_score desc,its_describe_a,its_score_ratio desc ";
			return $this->query($sql);
		}
		
		public function delItemScore($id){
			$sql="delete from t_item_score where its_id='$id'";
			return $this->execute($sql);
		}

	}
?>