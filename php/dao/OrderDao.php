<?php 
	require_once('BaseDao.php');
	class OrderDao extends BaseDao{
		private function getScho($user_id,$type){
			$year=Date("Y");
			$sql="select t.*,@rownum:=@rownum+1 as user_order from (select @rownum:=0)r,(select user_id,user_name,
			    round(sum(ap_score),2) score from t_user,t_apply where user_id=ap_student and ap_state='通过' and ap_scho_type
				=(select sc_id from t_scholarship where sc_admin=(select ad_id from t_admin,t_user where ad_grade=user_grade
				and user_id='$user_id') and sc_name like '%$type%' and sc_annual='$year')group by(ap_student) order by score desc)t";
			return $this->queryRow($sql);
		}
		public function getStudyScho($user_id){
			$year=Date("Y");
			$sql="select user_id,user_name,sc_ratio,sc_name from t_user,t_apply,t_scholarship where
				user_id=ap_student and ap_state='通过' and ap_scho_type=sc_id and sc_name like '%学习优秀%' and
				sc_admin=(select ad_id from t_admin,t_user where ad_grade=user_grade and user_id='$user_id') and sc_annual='$year'
				order by sc_ratio desc,user_id asc";
			return $this->queryRow($sql);
		}
		public function getSpiritualScho($user_id){
			return $this->getScho($user_id,"精神文明");
		}
		public function getActivityScho($user_id){
			return $this->getScho($user_id,"文体活动");
		}
		public function getWorkScho($user_id){
			return $this->getScho($user_id,"社会工作");
		}
		public function getScieTechScho($user_id){
			return $this->getScho($user_id,"科技创新");
		}
		public function getPracticeScho($user_id){
			return $this->getScho($user_id,"社会实践");
		}
	}
?>