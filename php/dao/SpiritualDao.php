<?php 
	require_once('BaseDao.php');
	class SpiritualDao extends BaseDao{
		public function getAppraisalRatio($user_id,$sc_annual){
			$sql="select its_describe_a,its_score from t_item_score,t_scholarship where its_name='民主评议'
				 and its_type=sc_id and sc_grade=(select user_grade from t_user where user_id='$user_id') 
				 and sc_annual='$sc_annual' order by its_score desc";
			return $this->query($sql);
		}
		
		public function applyAppraisal($app_student,$app_ratio){
			$sql="insert into t_appraisal(app_student,app_ratio) values('$app_student','$app_ratio')";
			return $this->getId($sql);
		}
		
		public function getAppraisal($app_student,$sc_annual){
			$sql="select ap_id,ap_score,app_ratio,ap_state,'民主评议' app_name from t_apply,t_scholarship,t_appraisal where
				sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_student='$app_student' and ap_item_table=
				't_appraisal' and ap_item_id=app_id";
			return $this->query($sql);
		}	
		
		public function applyDormitory($do_student,$do_score){
			$sql="insert into t_dormitory(do_student,do_score) values('$do_student',$do_score)";
			return $this->getId($sql);
		}
		
		public function getDormitory($do_student,$sc_annual){
			$sql="select ap_id,ap_score,do_score,ap_state,'文明寝室' do_name from t_apply,t_scholarship,t_dormitory
				where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_student='$do_student' and ap_item_table=
				't_dormitory' and ap_item_id=do_id";
			return $this->query($sql);
		}
		
		public function getSpiritualReward($spr_student,$sc_annual){
			$sql="select ap_id,ap_score,spr_name,spr_item,spr_rate,spr_time,ap_state from t_apply,t_scholarship,
				t_spiritual_reward where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_student='$spr_student' 
				and ap_item_table='t_spiritual_reward' and ap_item_id=spr_id order by spr_id desc";
			return $this->query($sql);
		}
		
		public function applySpiritualReward($spr_student,$spr_name,$spr_item,$spr_rate,$spr_time){
			$sql="insert into t_spiritual_reward(spr_student,spr_name,spr_item,spr_rate,spr_time)
				values('$spr_student','$spr_name','$spr_item','$spr_rate','$spr_time')";
			return $this->getId($sql);
		}
	}
?>