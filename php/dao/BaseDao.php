<?php 
	class BaseDao{
		private $host="localhost";
		private $user="root";
		private $pass="lyt";
		private $db="db_scholarship";
		var $conn;
		
		protected function initConnection(){
			$this->conn=mysql_connect($this->host,$this->user,$this->pass);
			mysql_select_db($this->db);
			mysql_query("set names utf8");
		}
		
		protected function closeConnection(){
			mysql_close($this->conn);
		}
		
		protected function execute($sql){
			$this->initConnection();
			mysql_query($sql);
			$result=mysql_affected_rows($this->conn);
			$this->closeConnection();
			return $result;
		}
		
		protected function query($sql){
			$this->initConnection();
			$obj_arr=array();
			$obj_result=mysql_query($sql);
			while($obj=mysql_fetch_object($obj_result)){
				$obj_arr[]=$obj;
			}
			$this->closeConnection();
			return $obj_arr;
		}
		
		protected function getId($sql){
			$this->initConnection();
			mysql_query($sql);
			$id=mysql_insert_id($this->conn);
			$this->closeConnection();
			return $id;
		}
		
		protected function queryRow($sql){
			$this->initConnection();
			$obj_arr=array();
			$obj_result=mysql_query($sql);
			while($obj=mysql_fetch_row($obj_result)){
				$obj_arr[]=$obj;
			}
			$this->closeConnection();
			return $obj_arr;
		}
	}
?>