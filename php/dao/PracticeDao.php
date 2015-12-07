<?php 
	require_once('BaseDao.php');
	class PracticeDao extends BaseDao{
		public function applyPractice($pr_title,$pr_name,$pr_student,$pr_team_prize,$pr_person_prize,
			$pr_team_role,$pr_remark){
			$sql="insert into t_practice(pr_title,pr_name,pr_student,pr_team_prize,pr_person_prize,
				pr_team_role,pr_remark) values('$pr_title','$pr_name','$pr_student','$pr_team_prize',
				'$pr_person_prize','$pr_team_role','$pr_remark')";
			return $this->getId($sql);
		}
		
		public function getPractice($pr_student,$sc_annual){
			$sql="select ap_id,ap_score,ap_state,pr_title,pr_name,pr_team_prize,pr_person_prize,
				pr_team_role from t_apply,t_scholarship,t_practice where sc_annual='$sc_annual' and sc_id=
				ap_scho_type and ap_item_table='t_practice' and ap_student='$pr_student' and ap_item_id=
				pr_id order by pr_id desc";
			return $this->query($sql);
		}
	}
?>