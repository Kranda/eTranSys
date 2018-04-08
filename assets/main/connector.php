<?php
	require('db.php');

	class connect {
		public $conn;

		function __construct($db) {
			$this->conn = $this->connectDB($db);
		}

		function connectDB($database) {
			$db = 'dbConn_'.$database;

			return $conn_EL = new $db();
		}
	}
?>