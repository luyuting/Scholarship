<?php 
	require('BaseDao.php');
	class InsertKey extends BaseDao {
		public function insert($key) {
			$sql = "insert into tb_keywords values('$key')";
			return $this -> execute($sql);
		}
	}
	
	$insertKey = new InsertKey();
	
	$arr = array();
	
	/**
	*	@Note 读取分列后的关键词表
	*/
	$file = 'd:/w2.txt';
	
	/**
	*	以只读的方式读取文件
	*/
	$fp = fopen($file, "r");      
	while (!feof($fp)) { 
		/**
		*	逐行读取字符流
		*/
		$buffer = fgets($fp, 4096); 
		
		/**
		*	strtoupper函数：将关键词统一转换为大写，如ajax、Ajax、AJAX等同一词汇不同大小写的写法，以AJAX代替
		* 	explode函数：从excel粘贴到txt文档的数据，每列之间以制表符作为分隔
		*	每行的关键词生成一个$col数组
		*/
		$col = explode("\t", (strtoupper($buffer)));	

		/**
		*	去除每行最后一个关键字读取的行结束符
		*/
		$col[count($col)-1] = trim($col[count($col)-1]);

		/**
		*	逐行添加到$arr数组中（$arr是二维数组）
		*/
		for($i = 0; $i < count($col); $i ++) {
			$insertKey -> insert($col[$i]);
		}
		print_r($col);
	}
	fclose($fp);     
	
	echo "done!";
?>