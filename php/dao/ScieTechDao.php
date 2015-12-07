<?php 
	require_once('BaseDao.php');
	class ScieTechDao extends BaseDao{
		public function applyScieTechComp($stc_student,$stc_name,$stc_rate,$stc_prize,$stc_team_status,$stc_team_num,
			$stc_team_order,$stc_host,$stc_time,$stc_remark){
			$sql="insert into t_scie_tech_comp(stc_student,stc_name,stc_rate,stc_prize,
				stc_team_status,stc_team_num,stc_team_order,stc_host,stc_time,stc_remark) 
				values('$stc_student','$stc_name','$stc_rate','$stc_prize','$stc_team_status',
				$stc_team_num,'$stc_team_order','$stc_host','$stc_time','$stc_remark')";
			return $this->getId($sql);
		}
		
		public function getScieTechComp($stc_student,$sc_annual){
			$sql="select ap_id,stc_name,stc_rate,stc_prize,stc_team_num,stc_team_order,ap_score,ap_state 
				from t_scie_tech_comp,t_apply,t_scholarship where stc_student='$stc_student' and ap_item_table
				='t_scie_tech_comp' and ap_item_id=stc_id and sc_annual='$sc_annual' and ap_scho_type=sc_id
				order by stc_id desc";
			return $this->query($sql);
		}	
		
		public function applyScieTechProject($stp_student,$stp_name,$stp_rate,$stp_prize,$stp_team_num,$stp_team_order,
				$stp_time,$stp_remark){
			$sql="insert into t_scie_tech_project(stp_student,stp_name,stp_rate,stp_prize,stp_team_num,stp_team_order,
				stp_time,stp_remark) values('$stp_student','$stp_name','$stp_rate','$stp_prize','$stp_team_num','$stp_team_order',
				'$stp_time','$stp_remark')";
			return $this->getId($sql);
		}
			
		public function getScieTechProject($stp_student,$sc_annual){
			$sql="select ap_id,stp_name,stp_rate,stp_prize,stp_time,stp_team_num,stp_team_order,ap_score,ap_state 
				from t_scie_tech_project,t_apply,t_scholarship where stp_student='$stp_student' and ap_item_table
				='t_scie_tech_project' and ap_item_id=stp_id and sc_annual='$sc_annual' and ap_scho_type=sc_id
				order by stp_id desc";
			return $this->query($sql);
		}
		
		public function applyPaper($pa_student,$pa_name,$pa_journal,$pa_level,$pa_vol,$pa_ei_sci,$pa_team_num,
			$pa_team_order,$pa_time,$pa_discuss_score){
			$sql="insert into t_paper(pa_student,pa_name,pa_journal,pa_level,pa_vol,pa_ei_sci,pa_team_num,
				pa_team_order,pa_time,pa_discuss_score) values('$pa_student','$pa_name','$pa_journal','$pa_level',
				'$pa_vol','$pa_ei_sci','$pa_team_num','$pa_team_order','$pa_time','$pa_discuss_score')";
			return $this->getId($sql);
		}
		
		public function getPaper($pa_student,$sc_annual){
			$sql="select ap_id,pa_name,pa_level,pa_ei_sci,pa_team_order,pa_time,ap_state,ap_score from t_paper,
				t_apply,t_scholarship where pa_student='$pa_student' and ap_item_table='t_paper' and ap_item_id=
				pa_id and sc_annual='$sc_annual' and ap_scho_type=sc_id order by pa_id desc";
			return $this->query($sql);
		}
		
		public function applyAttention($in_student,$in_name,$in_account,$in_team_num,$in_team_order,$in_type,$in_time,
				$in_discuss_score,$in_remark){
			$sql="insert into t_invention(in_student,in_name,in_account,in_team_num,in_team_order,in_type,in_time,
				in_discuss_score,in_remark) values('$in_student','$in_name','$in_account','$in_team_num','$in_team_order',
				'$in_type','$in_time','$in_discuss_score','$in_remark')";
			return $this->getId($sql);
		}
		
		public function getInvention($in_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,in_type,in_time,in_account,in_name,in_team_order from t_invention,
				t_apply,t_scholarship where in_student='$in_student' and ap_item_table='t_invention' and ap_item_id=
				in_id and sc_annual='$sc_annual' and ap_scho_type=sc_id order by in_id desc";
			return $this->query($sql);
		}
	}
?>