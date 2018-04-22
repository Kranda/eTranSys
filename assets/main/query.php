<?php
	require('main.php');
	class dbmain {
		public $db;
		public $main;

		function __construct() {
			if (isset($_POST['registerSchool'])) {
				$this->registerSchool();
			}
			else if (isset($_POST['login'])) {
				$this->login();
			}
			else {
				header('../../index.php');
			}
		}

		function registerSchool() {
			$school_type = $_POST['school_type'];

			if ($school_type == 'college') {
				$this->db = 'CO';
			}
			else {
				header('location: ../../register.php?in=platform');
				die();
			}

			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
			$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
	
			// Admin
			$admin_name  = htmlspecialchars($_POST['admin_name'], ENT_QUOTES);
			$admin_email = htmlspecialchars($_POST['admin_email'], ENT_QUOTES);
			$admin_phone = htmlspecialchars($_POST['admin_phone'], ENT_QUOTES);

			// Login
			$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

			$school_id = md5($name).'_'.$this->db;
			$table = $this->db.'_schools';

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, address, school_id) VALUES('$name', '$address', '$school_id')");

			$table1 = $this->db.'_admin';

			$this->main->pdo->query("INSERT INTO $table1(name, email, phone, address, username, password, school_id) VALUES('$admin_name', '$admin_email', '$admin_phone', '$address', '$username', '$password', '$school_id')");

			if ($stmt) {
				header('location: ../../'.$school_type.'_login.php?in=success');
			}
			else {
				header('location: ../../register.php?in=error');
			}
		}

		function login() {
			$school_id = $_POST['school_id'];
			$type = $_POST['type'];

			$this->db = $type;
			$this->main = $this->selectDB($this->db);

			$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

			
				$identity = $_POST['identity'];

				if ($identity == 'admin') {
					$table = strtolower($type).'_admin';
				}
			
				
				$stmt = $this->main->pdo->query("SELECT COUNT(*) FROM $table WHERE username='$username' AND password='$password' AND school_id = '$school_id' ");
		

			if ($stmt->fetchColumn() > 0) {
				$_SESSION['school_id'] = $school_id;
				$_SESSION['adminusername'] = $username;
				header('location: ../../schools/college/'.$identity.'/index.php');
				
			}
			else {
				header('location: ../../college_login.php?in=incorrect');
			}
		}

		function selectDB($db) {
			$this->main = new mainDB($db);
			return $this->main;
		}
	}

	new dbmain;
?>