<?php

	namespace SON\Database;
	
	class cnn{
		
		private $pdo;
		
		public function __construct($host,$dbname,$user,$pass)
		{			
			try{				
				
				$this->pdo = new \PDO($host,$user, $pass, array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ));  
				$this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
				$this->pdo->exec("USE $dbname");
				
			}catch(\PDOException $ex){
				echo "Connection failure: " . $ex->getMessage();				
			}		
		}
		
		public function getConnection()
		{
			return $this->pdo;
		}		
	}
?>