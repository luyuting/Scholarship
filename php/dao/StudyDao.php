<?php 
	require_once('BaseDao.php');
	class StudyDao extends BaseDao{
		
		function checkStudyUnique($ap_student,$sc_annual){
			$sql="select ap_id,ap_scho_type,ap_state,sc_name,sc_ratio from t_apply,t_scholarship where ap_item_table='t_scholarship' and 
				ap_student='$ap_student' and sc_id=ap_scho_type and sc_annual='$sc_annual'";
			return $this->query($sql);
		}
		
		function applyStudyScho($ap_scho_type,$ap_student){
			$sql="insert into t_apply values(uuid(),'$ap_scho_type','$ap_student','t_scholarship','$ap_scho_type',0,'未审核',null)";
			return $this->execute($sql);
		}
		
		function deleteStudyScho($ap_id){
			$sql="delete from t_apply where ap_id='$ap_id'";
			return $this->execute($sql);
		}
	}
?>