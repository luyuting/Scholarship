<?php 
	require_once('BaseDao.php');
	
	class SchoTypeDao extends BaseDao{
		
		private function getSchoByType($user_id,$sc_annual,$sc_type){
			$sql="select sc_id,sc_ratio from t_scholarship where sc_grade=(select user_grade from t_user where 
				user_id='$user_id') and sc_annual='$sc_annual' and sc_name like '%$sc_type%' order by sc_name asc";
			return $this->query($sql);
		}
		
		public function getStudyType($user_id,$sc_annual){
			return $this->getSchoByType($user_id,$sc_annual,'学习优秀');
		}
		
		public function setScieTechComp($stc_student,$sc_annual,$stc_rate,$stc_prize,$stc_team_ratio,$id){
			$sc_type="科技创新";
			$arr=$this->getSchoByType($stc_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$stc_student','t_scie_tech_comp','$id',
				$stc_team_ratio*(select its_score from t_item_score where its_describe_a='$stc_rate' 
				and its_describe_b='$stc_prize' and its_type='$sc_id'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setScieTechProject($stp_student,$sc_annual,$stp_prize,$stp_team_ratio,$id){
			$sc_type="科技创新";
			$arr=$this->getSchoByType($stp_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$stp_student','t_scie_tech_project','$id',
				$stp_team_ratio*(select its_score from t_item_score where its_describe_a='大学生创新创业项目' 
				and its_describe_b='$stp_prize' and its_type='$sc_id'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setScieTechPaper($pa_student,$sc_annual,$pa_level,$pa_team_order,$pa_discuss_score,$pa_ei_sci,$id){
			$sc_type="科技创新";
			$arr=$this->getSchoByType($pa_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql_score="(select its_score*its_score_ratio from t_item_score where its_type='$sc_id' and its_describe_a
				='$pa_level' and its_describe_b like '%$pa_team_order%')";
			if($pa_discuss_score!=0)
				$sql_score=$pa_discuss_score;
			if($pa_ei_sci=="是")
				$sql_score.="+(select its_score from t_item_score where its_type='$sc_id' and its_describe_a='被EI、SCI收录')";
			$sql="insert into t_apply values(uuid(),'$sc_id','$pa_student','t_paper','$id',".$sql_score.",'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setScieTechInvention($in_student,$sc_annual,$in_discuss_score,$in_team_ratio,$in_type,$id){
			$sc_type="科技创新";
			$arr=$this->getSchoByType($in_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql_score="$in_team_ratio*(select its_score from t_item_score where its_type='$sc_id' and its_describe_a
				='$in_type')";
			if($in_discuss_score!=0)
				$sql_score=$in_discuss_score;
			$sql="insert into t_apply values(uuid(),'$sc_id','$in_student','t_invention','$id',
				".$sql_score.",'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setSpiritualAppraisal($app_student,$sc_annual,$app_score,$id){
			$sc_type="精神文明";
			$arr=$this->getSchoByType($app_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$app_student','t_appraisal','$id',$app_score,
				'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setSpiritualDormitory($do_student,$sc_annual,$do_score,$id){
			$sc_type="精神文明";
			$arr=$this->getSchoByType($do_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$do_student','t_dormitory','$id',$do_score*
				(select its_score_ratio from t_item_score where its_type='$sc_id' and its_describe_a=
				'文明寝室'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setSpiritualReward($spr_student,$sc_annual,$spr_name,$spr_item,$spr_rate,$id){
			$sc_type="精神文明";
			$arr=$this->getSchoByType($spr_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$spr_student','t_spiritual_reward','$id',
				(select its_score from t_item_score where its_type='$sc_id' and its_name='$spr_name'
				and its_describe_a='$spr_item' and its_describe_b='$spr_rate'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setWorkCadre($wc_student,$sc_annual,$wc_level_ratio,$wc_last_time_ratio,$wc_name,$id){
			$sc_type="社会工作";
			$arr=$this->getSchoByType($wc_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$wc_student','t_work_cadre','$id',
				$wc_level_ratio*$wc_last_time_ratio*(select ws_score from t_work_score where 
				ws_type='$sc_id' and ws_position like '%$wc_name%'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setWorkReward($wr_student,$sc_annual,$wr_name,$wr_rate,$id){
			$sc_type="社会工作";
			$arr=$this->getSchoByType($wr_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$wr_student','t_work_reward','$id',
				(select its_score from t_item_score where its_name='社会工作优秀干部' and its_describe_a
				like '%$wr_name%' and its_type='$sc_id' and its_describe_b='$wr_rate'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setPractice($pr_student,$sc_annual,$pr_score,$id){
			$sc_type="社会实践";
			$arr=$this->getSchoByType($pr_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$pr_student','t_practice','$id','$pr_score','未审核',null)";
			return $this->execute($sql);
		}
		
		public function setActivityRole($ar_student,$sc_annual,$ar_role,$id){
			$sc_type="文体活动";
			$arr=$this->getSchoByType($ar_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql="insert into t_apply values(uuid(),'$sc_id','$ar_student','t_activity_role','$id',
				(select its_score from t_item_score where its_name='文体活动' and its_describe_a like '%$ar_role%'
				and its_type='$sc_id'),'未审核',null)";
			return $this->execute($sql);
		}
		
		public function setActivityComp($ac_student,$sc_annual,$ac_rate,$ac_prize,$ac_role,$ac_rule,$ac_team_num,$ac_break,$id){
			$sc_type="文体活动";
			$arr=$this->getSchoByType($ac_student,$sc_annual,$sc_type);
			$sc_id=$arr[0]->sc_id;
			$sql_score="(";
			if($ac_rule=="最高分")
				$sql_score.="1";
			else
				$sql_score.="0.5";
			if(($ac_team_num>=3)){
				$rate="市级及以上";
				if($ac_rate=="校级")
					$rate=$ac_rate;
				else if($ac_rate=="学部级")
					$rate="学部（学院）级";
				$sql_score.="*(select its_score_ratio from t_item_score where its_name='文体活动团队' and its_describe_a=
					'$ac_role' and its_describe_b='$rate' and its_type='$sc_id')";
			}
			$sql_score.=")*((select its_score from t_item_score where its_name='文体活动竞赛' and its_describe_a=
					'$ac_rate' and its_describe_b='$ac_prize' and its_type='$sc_id')";
			if($ac_break=="是")
				$sql_score.="+(select its_score from t_item_score where its_name='文体活动' and its_describe_a=
					'打破记录' and its_type='$sc_id')";
			$sql_score.=")";
			$sql="insert into t_apply values(uuid(),'$sc_id','$ac_student','t_activity_comp','$id',".$sql_score.",'未审核',null)";
			return $this->execute($sql);
		}
	}
?>