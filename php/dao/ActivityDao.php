<?php 
	require_once('BaseDao.php');
	class ActivityDao extends BaseDao{
		public function applyActivityRole($ar_name,$ar_student,$ar_time,$ar_role,$ar_rate,$ar_host,$ar_remark){
			$sql="insert into t_activity_role(ar_name,ar_student,ar_time,ar_role,ar_rate,ar_host,ar_remark)
				values('$ar_name','$ar_student','$ar_time','$ar_role','$ar_rate','$ar_host','$ar_remark')";
			return $this->getId($sql);
		}
		
		public function getActivityRole($ar_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,ar_name,ar_role,ar_rate,ar_time from t_apply,t_scholarship,
				t_activity_role where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table=
				't_activity_role' and ap_student='$ar_student' and ap_item_id=ar_id order by ar_id desc";
			return $this->query($sql);
		}
		
		public function applyActivityComp($ac_name,$ac_student,$ac_rate,$ac_prize,$ac_role,$ac_rule,$ac_break,
			$ac_team_num,$ac_time,$ac_remark){
			$sql="insert into t_activity_comp(ac_name,ac_student,ac_rate,ac_prize,ac_role,ac_rule,ac_break,
				ac_team_num,ac_time,ac_remark) values('$ac_name','$ac_student','$ac_rate','$ac_prize','$ac_role',
				'$ac_rule','$ac_break','$ac_team_num','$ac_time','$ac_remark')";
			return $this->getId($sql);
		}
		
		public function getActivityComp($ac_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,ac_name,ac_role,ac_rate,ac_prize,ac_team_num,ac_rule,ac_break from t_apply,
				t_scholarship,t_activity_comp where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table=
				't_activity_comp' and ap_student='$ac_student' and ap_item_id=ac_id order by ac_id desc";
			return $this->query($sql);
		}
	}
?>