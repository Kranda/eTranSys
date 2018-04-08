<?php
	require('../main.php');


	class dbmain {
		public $pdo;

		function __construct() {
			$this->main = new mainDB('EL');
			$this->pdo = $this->main->pdo;
		}
	}	

	new dbmain;
?>