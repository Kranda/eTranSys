<?php
	
	/**
	* Database Functions
	*/


	class dbConn_CO {
		public $pdo;
		private $dbuser = 'root'; 
		private $dbpass = '';
		private $dbhost = '127.0.0.1';
		private $dbname = 'etransys_college';

		function __construct() {
			try {
				$this->pdo = new PDO("mysql:dbname={$this->dbname};dbhost={$this->dbhost}", $this->dbuser, $this->dbpass);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die('you are not connected!');
			}
		}
	}

?>