<?php 
	require_once('BaseDao.php');
	class LoginDao extends BaseDao{
		public function getAdminPassword($ad_id){
			$sql="select ad_password from t_admin where ad_id='$ad_id'";
			return $this->query($sql);
		}
		
		public function getUserPassword($user_id){
			$sql="select user_password from t_user where user_id='$user_id'";
			return $this->query($sql);
		}
		
		public function setAdminPassword($ad_id,$ad_password){
			$sql="update t_admin set ad_password='$ad_password' where ad_id='$ad_id'";
			return $this->execute($sql);
		}
		
		public function setUserPassword($user_id,$user_password){
			$sql="update t_user set user_password='$user_password' where user_id='$user_id'";
			return $this->execute($sql);
		}
		
		public function getAdminName($ad_id){
			$sql="select ad_name from t_admin where ad_id='$ad_id'";
			return $this->query($sql);
		}
		
		public function getUserName($user_id){
			$sql="select user_name from t_user where user_id='$user_id'";
			return $this->query($sql);
		}
		
		public function getUserGrade($user_id){
			$sql="select user_grade from t_user where user_id='$user_id'";
			return $this->query($sql);
		}
	}
?>