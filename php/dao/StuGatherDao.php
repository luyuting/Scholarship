<?php 
	require_once('BaseDao.php');
	class StuGatherDao extends BaseDao{
		public function gatherStudy($ap_student,$sc_annual){
			$sql="select ap_state,sc_name,sc_ratio,ap_remark from t_apply,t_scholarship where ap_item_table='t_scholarship' and 
				ap_student='$ap_student' and sc_id=ap_scho_type and sc_annual='$sc_annual'";
			return $this->query($sql);
		}
		
		public function gatherAppraisal($ap_student,$sc_annual){
			$sql="select ap_state,'民主评议' app_name,ap_score,ap_remark from t_apply,t_scholarship where ap_item_table='t_appraisal' and 
				ap_student='$ap_student' and sc_id=ap_scho_type and sc_annual='$sc_annual'";
			return $this->query($sql);
		}
		
		public function gatherDormitory($ap_student,$sc_annual){
			$sql="select ap_state,'文明寝室' do_name,ap_score,ap_remark from t_apply,t_scholarship where ap_item_table='t_dormitory' and 
				ap_student='$ap_student' and sc_id=ap_scho_type and sc_annual='$sc_annual'";
			return $this->query($sql);
		}
		
		public function gatherSpiritualReward($ap_student,$sc_annual){
			$sql="select ap_score,spr_item,ap_state,ap_remark from t_apply,t_scholarship,
				t_spiritual_reward where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_student='$ap_student' 
				and ap_item_table='t_spiritual_reward' and ap_item_id=spr_id order by spr_id asc";
			return $this->query($sql);
		}
		
		public function gatherActivityComp($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,ac_name,ap_remark from t_apply,
				t_scholarship,t_activity_comp where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table=
				't_activity_comp' and ap_student='$ap_student' and ap_item_id=ac_id order by ac_id asc";
			return $this->query($sql);
		}
		
		public function gatherActivityRole($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,ar_name,ap_remark from t_apply,t_scholarship,
				t_activity_role where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table=
				't_activity_role' and ap_student='$ap_student' and ap_item_id=ar_id order by ar_id asc";
			return $this->query($sql);
		}
		
		public function gatherWorkCadre($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,wc_level,ap_remark from t_apply,t_scholarship,t_work_cadre where sc_annual=
				'$sc_annual' and sc_id=ap_scho_type and ap_item_table='t_work_cadre' and ap_student='$ap_student' and 
				ap_item_id=wc_id order by wc_level asc";
			return $this->query($sql);
		}
		
		public function gatherWorkReward($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,wr_name,ap_remark from t_apply,t_scholarship,t_work_reward 
				where sc_annual='$sc_annual' and sc_id=ap_scho_type and ap_item_table='t_work_reward' and ap_student
				='$ap_student' and ap_item_id=wr_id order by wr_id asc";
			return $this->query($sql);
		}
		
		public function gatherScieTechComp($ap_student,$sc_annual){
			$sql="select stc_name,ap_remark,ap_score,ap_state from t_scie_tech_comp,t_apply,t_scholarship where 
				stc_student='$ap_student' and ap_item_table='t_scie_tech_comp' and ap_item_id=stc_id and sc_annual
				='$sc_annual' and ap_scho_type=sc_id order by stc_id asc";
			return $this->query($sql);
		}

		public function gatherPaper($ap_student,$sc_annual){
			$sql="select pa_name,ap_remark,ap_state,ap_score from t_paper,
				t_apply,t_scholarship where pa_student='$ap_student' and ap_item_table='t_paper' and ap_item_id=
				pa_id and sc_annual='$sc_annual' and ap_scho_type=sc_id order by pa_id asc";
			return $this->query($sql);
		}		
		
		public function gatherInvention($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,in_name,ap_remark from t_invention,
				t_apply,t_scholarship where in_student='$ap_student' and ap_item_table='t_invention' and ap_item_id=
				in_id and sc_annual='$sc_annual' and ap_scho_type=sc_id order by in_id asc";
			return $this->query($sql);
		}
		
		public function gatherProject($ap_student,$sc_annual){
			$sql="select stp_name,stp_team_num,ap_remark,ap_score,ap_state 
				from t_scie_tech_project,t_apply,t_scholarship where stp_student='$ap_student' and ap_item_table
				='t_scie_tech_project' and ap_item_id=stp_id and sc_annual='$sc_annual' and ap_scho_type=sc_id
				order by stp_id asc";
			return $this->query($sql);
		}
		
		public function gatherPractice($ap_student,$sc_annual){
			$sql="select ap_score,ap_state,pr_name,ap_remark from t_apply,t_scholarship,t_practice where sc_annual
				='$sc_annual' and sc_id=ap_scho_type and ap_item_table='t_practice' and ap_student='$ap_student' 
				and ap_item_id=pr_id order by pr_id asc";
			return $this->query($sql);
		}
		
		public function scoreGather($ap_student,$sc_annual,$type){
			$sql="select round(sum(ap_score),2) score from t_apply where ap_student='$ap_student' and ap_state='通过' 
				and ap_scho_type=(select sc_id from t_scholarship where sc_grade=(select user_grade from t_user where 
				user_id='$ap_student') and sc_name like '%$type%' and sc_annual='$sc_annual')";
			$obj_arr=$this->query($sql);
			return $obj_arr[0]->score;
		}
	}
?>