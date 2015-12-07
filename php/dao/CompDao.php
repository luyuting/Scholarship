<?php 
	require_once('BaseDao.php');
	
	class CompDao extends BaseDao{	
		private function getComp($sc_annual,$type){
			$sql="select cp_name,cp_rate from t_competition,t_scholarship where sc_name like '%$type%'
				and sc_id=cp_type and sc_annual='$sc_annual' order by cp_time asc";
			return $this->query($sql);
		}
		
		public function getScieTechComp($sc_annual){
			return $this->getComp($sc_annual,"科技创新");
		}
		
		public function getActivityComp($sc_annual){
			return $this->getComp($sc_annual,"文体活动");
		}
		
		public function getTeamRatio($user_id,$sc_annual){
			$sql="select its_describe_a,its_score_ratio from t_item_score,t_scholarship where its_name='科技创新团队'
				 and its_type=sc_id and sc_grade=(select user_grade from t_user where user_id='$user_id') and 
				 sc_annual='$sc_annual' order by its_score_ratio desc";
			return $this->query($sql);
		}
	}
?>