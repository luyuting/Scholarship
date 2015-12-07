<?php 
	require_once('BaseDao.php');
	class WorkDao extends BaseDao{
		public function applyWorkCadre($wc_level,$wc_last_time,$wc_student,$wc_name,$wc_begin_time,
			$wc_end_time,$wc_remark){
			$sql="insert into t_work_cadre(wc_level,wc_last_time,wc_student,wc_name,wc_begin_time,
				wc_end_time,wc_remark) values('$wc_level','$wc_last_time','$wc_student','$wc_name',
				'$wc_begin_time','$wc_end_time','$wc_remark')";
			return $this->getId($sql);
		}
		
		public function getWorkCadre($wc_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,wc_name,wc_level,wc_last_time,wc_begin_time,wc_end_time 
				from t_apply,t_scholarship,t_work_cadre where sc_annual='$sc_annual' and sc_id=
				ap_scho_type and ap_item_table='t_work_cadre' and ap_student='$wc_student' and ap_item_id=
				wc_id order by wc_level desc";
			return $this->query($sql);
		}
		
		public function applyWorkReward($wr_name,$wr_student,$wr_rate,$wr_time){
			$sql="insert into t_work_reward(wr_name,wr_student,wr_rate,wr_time) values('$wr_name','$wr_student',
				'$wr_rate','$wr_time')";
			return $this->getId($sql);
		}
		
		public function getWorkReward($wr_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,wr_name,wr_time,wr_rate from t_apply,t_scholarship,t_work_reward 
				where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table='t_work_reward' and ap_student
				='$wr_student' and ap_item_id=wr_id order by wr_id desc";
			return $this->query($sql);
		}
	}
?>