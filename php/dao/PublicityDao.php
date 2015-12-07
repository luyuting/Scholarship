<?php 
	require_once('BaseDao.php');
	class PublicityDao extends BaseDao{
		public function publicityStudy($user_id,$sc_annual){
			$sql="select user_id,user_name,sc_name,sc_ratio,ap_state,ap_remark from t_apply,t_scholarship,t_user where ap_item_table='t_scholarship' and 
				sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual'
				order by sc_ratio desc,user_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityAppraisal($user_id,$sc_annual){
			$sql="select user_id,user_name,'民主评议' app_name,app_ratio,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_appraisal,t_user where ap_item_table='t_appraisal' and 
				sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id=app_id
				order by ap_score desc,user_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityDormitory($user_id,$sc_annual){
			$sql="select user_id,user_name,'文明寝室' do_name,do_score,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_user,t_dormitory where ap_item_table='t_dormitory' and 
				sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id=do_id
				order by user_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicitySpiritualReward($user_id,$sc_annual){
			$sql="select user_id,user_name,spr_item,spr_rate,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_user,t_spiritual_reward where ap_item_table='t_spiritual_reward'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=spr_id order by user_id asc,spr_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityActivityComp($user_id,$sc_annual){
			$sql="select user_id,user_name,ac_name,ac_rate,ac_prize,ap_score,ap_state,ap_remark from t_apply,t_user,t_scholarship,t_activity_comp where ap_item_table='t_activity_comp'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=ac_id order by user_id asc,ac_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityActivityRole($user_id,$sc_annual){
			$sql="select user_id,user_name,ar_name,ar_role,ar_rate,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_user,t_activity_role where ap_item_table='t_activity_role'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=ar_id order by user_id asc,ar_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityWorkCadre($user_id,$sc_annual){
			$sql="select user_id,user_name,wc_level,wc_last_time,wc_name,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_user,t_work_cadre where ap_item_table='t_work_cadre'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=wc_id order by user_id asc,wc_level asc";
			return $this->queryRow($sql);
		}
		
		public function publicityWorkReward($user_id,$sc_annual){
			$sql="select user_id,user_name,wr_name,wr_rate,ap_score,ap_state,ap_remark from t_apply,t_scholarship,t_work_reward,t_user where ap_item_table='t_work_reward'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=wr_id order by user_id asc,wr_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityScieTechComp($user_id,$sc_annual){
			$sql="select user_id,user_name,stc_name,stc_rate,stc_prize,stc_team_order,ap_score,ap_state,ap_remark from t_scie_tech_comp,t_apply,t_user,t_scholarship where 
				ap_item_table='t_scie_tech_comp' and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and 
				sc_annual='$sc_annual' and ap_item_id=stc_id order by user_id asc,stc_id asc";
			return $this->queryRow($sql);
		}

		public function publicityPaper($user_id,$sc_annual){
			$sql="select user_id,user_name,pa_name,pa_level,pa_team_order,ap_score,ap_state,ap_remark from t_paper,t_user,t_apply,t_scholarship where ap_item_table='t_paper'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=pa_id order by user_id asc,pa_id asc";
			return $this->queryRow($sql);
		}		
		
		public function publicityInvention($user_id,$sc_annual){
			$sql="select user_id,user_name,in_name,in_team_order,ap_score,ap_state,ap_remark from t_invention,t_user,t_apply,t_scholarship where ap_item_table='t_invention'
				and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual='$sc_annual' and ap_item_id
				=in_id order by user_id asc,in_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityProject($user_id,$sc_annual){
			$sql="select user_id,user_name,stp_name,stp_rate,stp_prize,stp_team_order,ap_score,ap_state,ap_remark from t_scie_tech_project,t_apply,t_user,t_scholarship where 
				ap_item_table='t_scie_tech_project' and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual=
				'$sc_annual' and ap_item_id=stp_id order by user_id asc,stp_id asc";
			return $this->queryRow($sql);
		}
		
		public function publicityPractice($user_id,$sc_annual){
			$sql="select user_id,user_name,pr_title,pr_name,pr_team_prize,pr_person_prize,pr_team_role,ap_score,ap_state,ap_remark from t_apply,t_user,t_scholarship,t_practice where 
				ap_item_table='t_practice' and sc_grade=(select user_grade from t_user where user_id='$user_id') and user_id=ap_student and sc_id=ap_scho_type and sc_annual=
				'$sc_annual' and ap_item_id=pr_id order by user_id asc,pr_id asc";
			return $this->queryRow($sql);
		}
		
	}
?>