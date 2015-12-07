<?php 
	require_once('BaseDao.php');
	class DelApplyDao extends BaseDao{
		private function delApply($table,$column,$ap_id){
			$sql="delete from ".$table." where ".$column."=(select ap_item_id from t_apply where ap_id='$ap_id')";
			if($this->execute($sql)==0)
				return 0;
			$sql_del="delete from t_apply where ap_id='$ap_id'";
			return $this->execute($sql_del);
		}
		
		public function delAppraisal($ap_id){
			return $this->delApply("t_appraisal","app_id",$ap_id);
		}
		
		public function delSpiritualReward($ap_id){
			return $this->delApply("t_spiritual_reward","spr_id",$ap_id);
		}
		
		public function delDormitory($ap_id){
			return $this->delApply("t_dormitory","do_id",$ap_id);
		}
		
		public function delScieTechComp($ap_id){
			return $this->delApply("t_scie_tech_comp","stc_id",$ap_id);
		}
		
		public function delWorkCadre($ap_id){
			return $this->delApply("t_work_cadre","wc_id",$ap_id);
		}
		
		public function delWorkReward($ap_id){
			return $this->delApply("t_work_reward",'wr_id',$ap_id);
		}
		
		public function delPractice($ap_id){
			return $this->delApply("t_practice","pr_id",$ap_id);
		}
		
		public function delActivityRole($ap_id){
			return $this->delApply("t_activity_role","ar_id",$ap_id);
		}
		
		public function delActivityComp($ap_id){
			return $this->delApply("t_activity_comp","ac_id",$ap_id);
		}
		
		public  function delScieTechProject($ap_id){
			return $this->delApply("t_scie_tech_project","stp_id",$ap_id);
		}
		
		public function delPaper($ap_id){
			return $this->delApply("t_paper","pa_id",$ap_id);
		}
		
		public function delInvention($ap_id){
			return $this->delApply("t_invention","in_id",$ap_id);
		}
	}
?>