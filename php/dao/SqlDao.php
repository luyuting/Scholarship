<?php
	class SqlDao {
		private $host="localhost";
		private $user="root";
		private $pass="lyt";
		private $db="db_info";
		var $conn;
		
		private function initConnection() {
			$this->conn=mysql_connect($this->host,$this->user,$this->pass);
			mysql_select_db($this->db);
			mysql_query("set names utf8");
		}
		
		private function closeConnection() {
			mysql_close($this->conn);
		}
		
		public function setCountRoughly() {
			$this->initConnection();
			$sql = "select * from tb_count";
			$obj_result = mysql_query($sql);
			while($obj = mysql_fetch_object($obj_result)){
				$keyword = $obj->keyword;
				$in_sql = "insert into tb_high values('$keyword', (select sum(count) from tb_count where keyword like '%$keyword%'))";
				mysql_query($in_sql);
			}
			$this->closeConnection();
		}
		
		public function setSimilarWord() {
			$this->initConnection();
			$sql = "select * from tb_high order by count desc";
			$obj_result = mysql_query($sql);
			while($obj = mysql_fetch_object($obj_result)){
				$keyword = $obj->word;
				
				$similar = "";
				$find_sql = "select keyword from tb_count where keyword like '%$keyword%'";
				$find_result=mysql_query($find_sql);
				while($find_obj = mysql_fetch_object($find_result)){
						$similar .= $find_obj->keyword ."；";
				}
				$in_sql = "insert into tb_similar(keyword, similar) values('$keyword', '$similar')";
				mysql_query($in_sql);
			}
			$this->closeConnection();
		}
	}
	
	$sqlDao = new SqlDao();
	$sqlDao->setSimilarWord();
	echo true;

?>