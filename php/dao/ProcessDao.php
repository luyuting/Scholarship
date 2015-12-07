<?php 
	require_once('BaseDao.php');
	class ProcessDao extends BaseDao{
		public function getProcess($sc_admin,$type){
			$sql="select user_id,user_name,count(ap_state) un_state from t_user,t_apply,t_scholarship where user_id=ap_student 
				and sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and sc_id=
				ap_scho_type and sc_name like '%$type%' and ap_state='未审核' group by(ap_student) order by ap_student desc";
			return $this->query($sql);
		}
	}
?>