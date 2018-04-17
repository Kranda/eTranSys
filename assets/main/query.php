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
			else if (isset($_POST['registerClass'])) {
				$this->registerClass();
			}
			else if (isset($_POST['registerTeacher'])) {
				$this->registerTeacher();
			}
			else if (isset($_POST['registerStudent'])) {
				$this->registerStudent();
			}
			else if (isset($_POST['registerSubject'])) {
				$this->registerSubject();
			}
			else if (isset($_POST['registerScore'])) {
				$this->registerScore();
			}
			else if (isset($_POST['registerFaculty'])) {
				$this->registerFaculty();
			}
			else if (isset($_POST['registerDepartment'])) {
				$this->registerDepartment();
			}
			else {
				header('../../index.php');
			}
		}

		function registerSchool() {
			$school_type = $_POST['school_type'];

			if ($school_type == 'elementary') {
				$this->db = 'EL';
			}
			else if ($school_type == 'middle') {
				$this->db = 'MI';
			}
			else if ($school_type == 'high') {
				$this->db = 'HI';
			}
			else if ($school_type == 'college') {
				$this->db = 'CO';
			}
			else {
				header('location: ../../register.php?in=platform');
				die();
			}

			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
			$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
			$motto = htmlspecialchars($_POST['motto'], ENT_QUOTES);

			$logo = $this->main->imageUpload('logo');
			if ($logo == 'error') {
				header('location: ../../register.php?in=image');
				die();
			}

			// Admin
			$admin_name = htmlspecialchars($_POST['admin_name'], ENT_QUOTES);
			$admin_email = htmlspecialchars($_POST['admin_email'], ENT_QUOTES);
			$admin_phone = htmlspecialchars($_POST['admin_phone'], ENT_QUOTES);

			// Login
			$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

			$school_id = md5($name).'_'.$this->db;
			$table = $this->db.'_schools';

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, address, logo, motto, school_id) VALUES('$name', '$address', '$logo', '$motto', '$school_id')");

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

			if ($this->db == 'EL' || $this->db == 'MI') {
				$table = strtolower($type).'_admin';
				$stmt = $this->main->pdo->query("SELECT COUNT(*) FROM $table WHERE username='$username' AND password='$password'");
			}
			else {
				$identity = $_POST['identity'];

				if ($identity == 'admin') {
					$table = strtolower($type).'_admin';
				}
				else if ($identity == 'tutor') {
					$table = strtolower($type).'_tutor';
				}
				else {
					$table = strtolower($type).'_student';
				}
				
				$stmt = $this->main->pdo->query("SELECT COUNT(*) FROM $table WHERE username='$username' AND password='$password'");
			}

			if ($stmt->fetchColumn() > 0) {
				$_SESSION['school_id'] = $school_id;
				$_SESSION['adminusername'] = $username;



				if ($type == 'EL') {
					header('location: ../../schools/elementary/index.php');
				}
				else if ($type == 'MI') {
					header('location: ../../schools/middle/index.php');
				}
				else if ($type == 'HI') {
					header('location: ../../schools/high/'.$identity.'/index.php');
				}
				else {
					header('location: ../../schools/college/'.$identity.'/index.php');
				}
			}
			else {
				header('location: ../../index.phh?in=incorrect');
			}
		}

		/* --- Elementary & Middle --- */
		function registerClass() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['class_name'], ENT_QUOTES);

			$class_id = md5($name).'_'.$this->db;
			$school_id = $_POST['school_id'];

			$table = $this->db.'_classes';

			$head = '';
			if ($this->db == 'el') {
				$head = 'elementary';
			} else if ($this->db == 'mi') {
				$head = 'middle';
			}

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, class_id, school_id) VALUES('$name', '$class_id', '$school_id')");

			if ($stmt) {
				header('location: ../../schools/'.$head.'/classes.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/classes.php?u=man&&in=error');
			}
		}

		function registerTeacher() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
			$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
			$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
			$gender = $_POST['gender'];
			$address = htmlspecialchars($_POST['address'], ENT_QUOTES);

			$teacher_id = md5($email).'_'.$this->db;
			$school_id = $_POST['school_id'];

			$table = $this->db.'_teachers';
			$table2 = $this->db.'_classes';

			$head = '';
			if ($this->db == 'el') {
				$head = 'elementary';
			} else if ($this->db == 'mi') {
				$head = 'middle';
			}

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, email, phone, gender, address, teacher_id, school_id) VALUES('$name', '$email', '$phone', '$gender', '$address', '$teacher_id', '$school_id')");

			if (isset($_POST['class_id'])) {
				$class_id = $_POST['class_id'];
				$this->main->pdo->query("UPDATE $table2 SET teacher_id='$teacher_id' WHERE class_id='$class_id'");
			}

			if ($stmt) {
				header('location: ../../schools/'.$head.'/teachers.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/teachers.php?u=man&&in=error');
			}
		}

		function registerStudent() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
			// DOB
			$d = htmlspecialchars($_POST['day'], ENT_QUOTES);
			$m = htmlspecialchars($_POST['month'], ENT_QUOTES);
			$y = htmlspecialchars($_POST['year'], ENT_QUOTES);
			$dob = $d.'-'.$m.'-'.$y;

			$gender = $_POST['gender'];
			$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
			$guardian_name = htmlspecialchars($_POST['guardian_name'], ENT_QUOTES);
			$guardian_phone = htmlspecialchars($_POST['guardian_phone'], ENT_QUOTES);

			$student_id = md5($name).'_'.$this->db;
			$class_id = $_POST['class_id'];
			$school_id = $_POST['school_id'];

			$table = $this->db.'_students';

			$head = '';
			if ($this->db == 'el') {
				$head = 'elementary';
			} else if ($this->db == 'mi') {
				$head = 'middle';
			}

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, dob, gender, address, guardian_name, guardian_phone, student_id, class_id, school_id) VALUES('$name', '$dob', '$gender', '$address', '$guardian_name', '$guardian_phone', '$student_id', '$class_id', '$school_id')");

			if ($stmt) {
				header('location: ../../schools/'.$head.'/students.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/students.php?u=reg&&in=error');
			}
		}

		function registerSubject() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['name'], ENT_QUOTES);

			$school_id = $_POST['school_id'];
			$teacher_id = $_POST['teacher_id'];

			$table = $this->db.'_subjects';

			$head = '';
			if ($this->db == 'el') {
				$head = 'elementary';
			} else if ($this->db == 'mi') {
				$head = 'middle';
			}

			foreach ($_POST['class_id'] as $class_id) {
				$subject_id = md5($name).'_'.($this->main->getNumberOfSubjects($school_id, $this->db) + 1);

				$stmt = $this->main->pdo->query("INSERT INTO $table(name, class_id, teacher_id, subject_id, school_id) VALUES('$name', '$class_id', '$teacher_id', '$subject_id', '$school_id')");
			}

			if ($stmt) {
				header('location: ../../schools/'.$head.'/subjects.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/subjects.php?u=reg&&in=error');
			}
		}

		function registerScore() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$school_id = $_POST['school_id'];
			$subject_id = $_POST['subject_id'];
			$class_id = $_POST['class_id'];

			$table = $this->db.'_scores';

			$i = 0;
			while ($i < $this->main->getNumberOfStudentsInClass($class_id, $this->db)) {
				$student_id = $_POST['student_id'][$i];
				$score = $_POST['score'][$i];

				$stmt = $this->main->pdo->query("SELECT COUNT(*) FROM $table WHERE student_id='$student_id' AND subject_id='$subject_id' AND school_id='$school_id'");
				$num = $stmt->fetchColumn();

				if ($num > 0) {
					$stmt = $this->main->pdo->query("UPDATE $table SET score='$score' WHERE student_id='$student_id' AND subject_id='$subject_id' AND class_id='$class_id' AND school_id='$school_id'");
				}
				else {
					$stmt = $this->main->pdo->query("INSERT INTO $table(score, student_id, subject_id, class_id, school_id) VALUES('$score', '$student_id', '$subject_id', '$class_id', '$school_id')");
				}

				$i++;
			}

			$head = '';
			if ($this->db == 'el') {
				$head = 'elementary';
			} else if ($this->db == 'mi') {
				$head = 'middle';
			}

			if ($stmt) {
				header('location: ../../schools/'.$head.'/result.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/result.php?u=reg&&in=error');
			}
		}

		/* --- High & College*/
		function registerFaculty() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['fac_name'], ENT_QUOTES);

			$fac_id = md5($name).'_'.$this->db;
			$school_id = $_POST['school_id'];

			$table = $this->db.'_faculty';

			$head = '';
			if ($this->db == 'hi') {
				$head = 'high';
			} else if ($this->db == 'co') {
				$head = 'college';
			}

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, fac_id, school_id) VALUES('$name', '$fac_id', '$school_id')");

			if ($stmt) {
				header('location: ../../schools/'.$head.'/admin/faculty.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/admin/faculty.php?u=man&&in=error');
			}
		}

		function registerDepartment() {
			$this->db = strtolower($_POST['db']);
			$this->main = $this->selectDB($this->db);

			$name = htmlspecialchars($_POST['dept_name'], ENT_QUOTES);
			$no_of_years = htmlspecialchars($_POST['no_of_years'], ENT_QUOTES);
			$fac_id = $_POST['fac_id'];

			$dept_id = md5($name).'_'.$this->db;
			$school_id = $_POST['school_id'];

			$table = $this->db.'_department';

			$head = '';
			if ($this->db == 'hi') {
				$head = 'high';
			} else if ($this->db == 'co') {
				$head = 'college';
			}

			$stmt = $this->main->pdo->query("INSERT INTO $table(name, no_of_years, dept_id, fac_id, school_id) VALUES('$name', '$no_of_years', '$dept_id', '$fac_id', '$school_id')");

			if ($stmt) {
				header('location: ../../schools/'.$head.'/admin/department.php?u=reg&&in=success');
			}
			else {
				header('location: ../../schools/'.$head.'/admin/department.php?u=man&&in=error');
			}
		}

		function selectDB($db) {
			$this->main = new mainDB($db);
			return $this->main;
		}
	}

	new dbmain;
?>