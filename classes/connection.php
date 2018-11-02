<?php
	class Connection
	{
		private $host;
		private $dbName;
		private $user;
		private $pass;
		private $conn;
		public function __construct($host, $dbname, $username, $password)
		{
			$this->host = $host;
			$this->dbName = $dbname;
			$this->user = $username;
			$this->pass = $password;
			try {
				$this->conn = new PDO(
					"mysql:host=$this->host; dbname=$this->dbName; charset=utf8mb4",
					$this->user,
					$this->pass,
					[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
				);
			} catch (PDOException $exception) {
				echo $exception->getMessage();
			}
		}
		public function getConnection()
		{
			return $this->conn;
		}
	}
