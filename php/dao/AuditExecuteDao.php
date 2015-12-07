<?php 
	require_once('BaseDao.php');
	class AuditExecuteDao extends BaseDao{
		private function checkAppraisal($sc_admin,$ap_student){
			$sql="select ap_id from t_apply where ap_scho_type=(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%') and ap_student='$ap_student' and ap_item_table='t_appraisal'";
			$obj_arr=$this->query($sql);
			if(count($obj_arr)>0){
				$del_item="delete from t_appraisal where app_id in (select ap_item_id from t_apply where ap_scho_type=(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%') and ap_student='$ap_student' and ap_item_table='t_appraisal') t";
				$del_sql="delete from t_apply where ap_scho_type=(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
					t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%') and ap_student='$ap_student' and ap_item_table='t_appraisal'";
				$this->execute($del_item);
				$this->execute($del_sql);
			}
			return true;
		}
		public function setAppraisal($sc_admin,$ap_student,$app_ratio){
			$this->checkAppraisal($sc_admin,$ap_student);
			$sql="insert into t_appraisal(app_student,app_ratio) values('$ap_student','$app_ratio')";
			$app_id=$this->getId($sql);
			$ap_sql="insert into t_apply values(uuid(),(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%'),'$ap_student','t_appraisal',$app_id,(select its_score from t_item_score,
				t_scholarship where its_name='民主评议' and its_describe_a='$app_ratio' and its_type=sc_id and sc_grade=(select ad_grade from t_admin where 
				ad_id='$sc_admin') and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin')),'通过',null)";
			return $this->execute($ap_sql);
		}
		private function checkDormitoryReward($sc_admin,$ap_student){
			$sql="select ap_id from t_apply,t_spiritual_reward where ap_scho_type=(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select 
				ad_annual from t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%') and ap_student='$ap_student' and ap_item_table='t_spiritual_reward'
				and ap_item_id=spr_id and spr_item='千优寝室'";
			$obj_arr=$this->query($sql);
			if(count($obj_arr)>0){
				$del_item="delete from t_spiritual_reward where spr_id in (select ap_item_id from t_apply where ap_scho_type=(select sc_id from t_scholarship 
					where sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%')and ap_student
					='$ap_student' and ap_item_table='t_spiritual_reward') and spr_item='千优寝室'";
				$del_sql="delete from t_apply where ap_student='$ap_student' and ap_item_table='t_spiritual_reward' and ap_item_id 
					not in (select spr_id from t_spiritual_reward where spr_student='$ap_student')";
				$this->execute($del_item);
				$this->execute($del_sql);
			}
			return true;
		}
		public function setDormitoryReward($sc_admin,$ap_student){
			$this->checkDormitoryReward($sc_admin,$ap_student);
			$sql="insert into t_spiritual_reward(spr_student,spr_name,spr_item,spr_rate,spr_time) values('$ap_student','寝室环境建设','千优寝室','校级',now())";
			$spr_id=$this->getId($sql);
			$ap_sql="insert into t_apply values(uuid(),(select sc_id from t_scholarship where sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%'),'$ap_student','t_spiritual_reward',$spr_id,(select its_score from t_item_score,
				t_scholarship where its_describe_a='千优寝室' and its_type=sc_id and sc_grade=(select ad_grade from t_admin where 
				ad_id='$sc_admin') and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin')),'通过',null)";
			return $this->execute($ap_sql);
		}
	}
?>