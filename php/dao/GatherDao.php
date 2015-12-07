<?php 
	require_once('BaseDao.php');
	class GatherDao extends BaseDao{
		private function getScho($sc_admin,$type){
			$sql="select @rownum:=@rownum+1 as user_order,t.* from (select @rownum:=0)r,(select user_id,user_name,
			    round(sum(ap_score),2) score from t_user,t_apply where user_id=ap_student and ap_state='通过' and ap_scho_type
				=(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_name like '%$type%' and sc_annual
				=(select ad_annual from t_admin where ad_id='$sc_admin')) group by(ap_student) order by
				score desc)t";
			return $this->query($sql);
		}
		public function getStudyScho($sc_admin){
			$sql="select user_id,user_name,sc_name,sc_ratio from t_user,t_apply,t_scholarship where
				user_id=ap_student and ap_state='通过' and ap_scho_type=sc_id and sc_name like '%学习优秀%' and
				sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin')
				order by sc_ratio desc,user_id asc";
			return $this->query($sql);
		}
		public function getSpiritualScho($sc_admin){
			return $this->getScho($sc_admin,"精神文明");
		}
		public function getActivityScho($sc_admin){
			return $this->getScho($sc_admin,"文体活动");
		}
		public function getWorkScho($sc_admin){
			return $this->getScho($sc_admin,"社会工作");
		}
		public function getScieTechScho($sc_admin){
			return $this->getScho($sc_admin,"科技创新");
		}
		public function getPracticeScho($sc_admin){
			return $this->getScho($sc_admin,"社会实践");
		}
	}
?>