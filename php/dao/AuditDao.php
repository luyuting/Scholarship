<?php 
	require_once('BaseDao.php');
	class AuditDao extends BaseDao{
		public function getStudyList($sc_admin){
			$sql="select ap_id,user_id,user_name,u_major,sc_name,sc_ratio,ap_state,ap_remark from t_apply,user,t_user,t_scholarship 
				where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual from
				t_admin where ad_id='$sc_admin') and sc_name like '%学习优秀%' and u_id=user_id order by u_major asc,sc_ratio asc,user_id desc";
			return $this->query($sql);
		}
		public function getAppraisalList($sc_admin){
			$sql="select ap_id,user_id,user_name,'民主评议' app_name,app_ratio,ap_score,ap_state,ap_remark from t_apply,t_user,t_appraisal,
				t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual
				from t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%' and app_id=ap_item_id and ap_item_table='t_appraisal'
				order by ap_score asc,user_id desc";
			return $this->query($sql);
		}
		public function getDormitoryList($sc_admin){
			$sql="select ap_id,user_id,user_name,'文明寝室' do_name,do_score,ap_score,ap_state,ap_remark from t_apply,t_user,t_dormitory,
				t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual
				from t_admin where ad_id='$sc_admin') and sc_name like '%精神文明%' and do_id=ap_item_id and ap_item_table='t_dormitory'
				order by user_id desc";
			return $this->query($sql);
		}
		public function getSpiritualRewardList($sc_admin){
			$sql="select ap_id,user_id,user_name,spr_name,spr_item,spr_rate,spr_time,ap_score,ap_state,ap_remark from t_apply,t_user,t_scholarship,
				t_spiritual_reward where sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name
				like '%精神文明%' and sc_id=ap_scho_type and user_id=ap_student and spr_id=ap_item_id and ap_item_table='t_spiritual_reward'
				order by user_id desc,spr_id desc";
			return $this->query($sql);
		}
		public function getActivityCompList($sc_admin){
			$sql="select ap_id,user_id,user_name,ac_name,ac_rate,ac_prize,ac_role,ac_rule,ac_break,ap_score,ap_state,ap_remark from t_apply,t_user,
				t_scholarship,t_activity_comp where sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name
				like '%文体活动%' and sc_id=ap_scho_type and user_id=ap_student and ac_id=ap_item_id and ap_item_table='t_activity_comp'
				order by user_id desc,ac_id desc";
			return $this->query($sql);
		}
		public function getActivityRoleList($sc_admin){
			$sql="select ap_id,user_id,user_name,ar_name,ar_role,ar_rate,ar_time,ap_score,ap_state,ap_remark from t_apply,t_user,t_scholarship,
				t_activity_role where sc_admin='$sc_admin' and sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name
				like '%文体活动%' and sc_id=ap_scho_type and user_id=ap_student and ar_id=ap_item_id and ap_item_table='t_activity_role'
				order by user_id desc,ar_id desc";
			return $this->query($sql);
		}
		public function getWorkCadreList($sc_admin){
			$sql="select ap_id,user_id,user_name,wc_level,wc_last_time,wc_name,ap_score,ap_state,ap_remark from t_apply,t_user,
				t_scholarship,t_work_cadre where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=
				(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name like '%社会工作%' and wc_id=ap_item_id and 
				ap_item_table='t_work_cadre' order by user_id desc,wc_level desc";
			return $this->query($sql);
		}
		public function getWorkRewardList($sc_admin){
			$sql="select ap_id,user_id,user_name,wr_name,wr_rate,wr_time,ap_score,ap_state,ap_remark from t_apply,t_user,t_scholarship,
				t_work_reward where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=
				(select ad_annual from t_admin where ad_id='$sc_admin') and sc_name like '%社会工作%' and wr_id=ap_item_id and 
				ap_item_table='t_work_reward' order by user_id desc,wr_id desc";
			return $this->query($sql);
		}
		public function getScieTechCompList($sc_admin){
			$sql="select ap_id,user_id,user_name,stc_name,stc_rate,stc_prize,stc_team_order,ap_score,ap_state,ap_remark from t_scie_tech_comp,
				t_apply,t_user,t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and 
				sc_annual=(select ad_annual from t_admin where ad_id='$sc_admin')
				and sc_name like '%科技创新%' and stc_id=ap_item_id and ap_item_table='t_scie_tech_comp' order by user_id desc,
				stc_id desc";
			return $this->query($sql);
		}
		
		public function getScieTechPaperList($sc_admin){
			$sql="select ap_id,user_id,user_name,pa_name,pa_level,pa_ei_sci,pa_team_order,ap_score,ap_state,ap_remark from t_paper,t_apply,t_user,
				t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin')and sc_name like '%科技创新%' and pa_id=ap_item_id and ap_item_table='t_paper' order 
				by user_id desc,pa_id desc";
			return $this->query($sql);
		}
		public function getScieTechInventionList($sc_admin){
			$sql="select ap_id,user_id,user_name,in_name,in_type,in_account,in_team_order,ap_score,ap_state,ap_remark from t_invention,t_apply,t_user,
				t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin') and sc_name like '%科技创新%' and in_id=ap_item_id and ap_item_table='t_invention' order 
				by user_id desc,in_id desc";
			return $this->query($sql);
		}
		public function getScieTechProjectList($sc_admin){
			$sql="select ap_id,user_id,user_name,stp_name,stp_rate,stp_prize,stp_team_order,ap_score,ap_state,ap_remark from t_scie_tech_project,
				t_apply,t_user,t_scholarship where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin') and sc_name like '%科技创新%' and stp_id=ap_item_id and ap_item_table='t_scie_tech_project' order 
				by user_id desc,stp_id desc";
			return $this->query($sql);
		}
		public function getPracticeList($sc_admin){
			$sql="select ap_id,user_id,user_name,pr_title,pr_name,pr_team_prize,pr_person_prize,pr_team_role,ap_score,ap_state,ap_remark from t_apply,
				t_scholarship,t_user,t_practice where sc_id=ap_scho_type and user_id=ap_student and sc_admin='$sc_admin' and sc_annual=(select ad_annual 
				from t_admin where ad_id='$sc_admin') and sc_name like '%社会实践%' and pr_id=ap_item_id and ap_item_table='t_practice' order 
				by user_id desc,pr_id desc";
			return $this->query($sql);
		}
		public function setSchoState($ap_id,$ap_state){
			$sql="update t_apply set ap_state='$ap_state' where ap_id='$ap_id'";
			return $this->execute($sql);
		}
		public function setSchoRemark($ap_id,$ap_remark){
			$sql="update t_apply set ap_remark='$ap_remark' where ap_id='$ap_id'";
			return $this->execute($sql);
		}
	}
?>