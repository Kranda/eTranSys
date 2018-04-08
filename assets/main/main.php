<?php
	session_start();
	require('connector.php');

	class mainDB {
		public $pdo;
		public $db;

		function __construct($db) {
			$this->db = $db;
			$connect = new connect($this->db);

			$this->pdo = $connect->conn->pdo;
		}

		function getSchoolInfo($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_schools';

			$stmt = $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id'");
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		function getAdminInfo($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_admin';

			$stmt = $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id'");
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		function imageUpload($image) {
			$maxsize = 2097152;
			$size = $_FILES[$image]['size'];

			if ($size > $maxsize) {
				return 'error';
			}
			else {
				$imgDetails = getimagesize($_FILES[$image]['tmp_name']);
				$mime_type = $imgDetails['mime'];

				if ($mime_type != 'image/png' && $mime_type != 'image/jpeg') {
					return 'error';
				}
				else {
					return $imgData = addslashes(file_get_contents($_FILES[$image]['tmp_name']));
				}
		            }
		}

		/* --- Elementary & Middle --- */
		function fetchClasses($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' ORDER BY name ASC");
		}

		function fetchTeachers($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_teachers';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' ORDER BY name ASC");
		}

		function fetchStudents($class_id, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_students';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' AND class_id='$class_id' ORDER BY name ASC");
		}

		function fetchSubjects($class_id, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_subjects';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' AND class_id='$class_id' ORDER BY name ASC");
		}

		function getNumberOfStudentsInClass($class_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_students';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE class_id='$class_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfClasses($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfTeachers($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_teachers';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfStudents($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_students';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfSubjects($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_subjects';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getSubjectID($name, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_subjects';

			$stmt = $this->pdo->query("SELECT subject_id FROM $table WHERE name='$name' AND school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getSubjectInfo($col, $subject_id, $db) {
			if (!empty($subject_id)) {
				$this->db = strtolower($db);
				$table = $this->db.'_subjects';

				if ($col == '*') {
					$stmt = $this->pdo->query("SELECT * FROM $table WHERE subject_id='$subject_id' ORDER BY name ASC");
					return $stmt->fetch(PDO::FETCH_OBJ);
				}
				else {
					$stmt = $this->pdo->query("SELECT $col FROM $table WHERE subject_id='$subject_id'");
					return $stmt->fetchColumn();
				}
			}
			else {
				return;
			}
		}

		function getTeacherID($col, $class_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			if ($col == '*') {
				$stmt = $this->pdo->query("SELECT * FROM $table WHERE class_id='$class_id'");
				return $stmt->fetch(PDO::FETCH_OBJ);
			}
			else {
				$stmt = $this->pdo->query("SELECT $col FROM $table WHERE class_id='$class_id'");
				return $stmt->fetchColumn();
			}
		}

		function getTeacherInfo($col, $teacher_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_teachers';

			if ($col == '*') {
				$stmt = $this->pdo->query("SELECT * FROM $table WHERE teacher_id='$teacher_id'");
				return $stmt->fetch(PDO::FETCH_OBJ);
			}
			else {
				$stmt = $this->pdo->query("SELECT $col FROM $table WHERE teacher_id='$teacher_id'");
				return $stmt->fetchColumn();
			}
		}

		function getClassInfo($col, $class_id, $db) {
			if (!empty($class_id)) {
				$this->db = strtolower($db);
				$table = $this->db.'_classes';

				if ($col == '*') {
					$stmt = $this->pdo->query("SELECT * FROM $table WHERE class_id='$class_id' ORDER BY name ASC");
					return $stmt->fetch(PDO::FETCH_OBJ);
				}
				else {
					$stmt = $this->pdo->query("SELECT $col FROM $table WHERE class_id='$class_id'");
					return $stmt->fetchColumn();
				}
			}
			else {
				return;
			}
		}

		function getClassID($name, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			$stmt = $this->pdo->query("SELECT class_id FROM $table WHERE name='$name' AND school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getClassInCharge($teacher_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			$stmt = $this->pdo->query("SELECT class_id FROM $table WHERE teacher_id='$teacher_id'");
			return $stmt->fetchColumn();
		}

		function validateClass($class_id, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_classes';

			$stmt = $this->pdo->query("SELECT class_id FROM $table WHERE class_id='$class_id' AND school_id='$school_id'");

			if ($stmt->fetchColumn() != $class_id) {
				return 'error';
			}
			else {
				return;
			}
		}

		function validateSubject($subject_id, $class_id, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_subjects';

			$stmt = $this->pdo->query("SELECT subject_id FROM $table WHERE subject_id='$subject_id' AND class_id='$class_id' AND school_id='$school_id'");

			if ($stmt->fetchColumn() != $subject_id) {
				return 'error';
			}
			else {
				return;
			}
		}

		function getScore($student_id, $subject_id, $class_id, $school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_scores';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE student_id='$student_id' AND subject_id='$subject_id' AND class_id='$class_id' AND school_id='$school_id'");

			if ($stmt->fetchColumn() > 0) {
				$stmt = $this->pdo->query("SELECT score FROM $table WHERE student_id='$student_id' AND subject_id='$subject_id' AND class_id='$class_id' AND school_id='$school_id'");
				return $stmt->fetchColumn();
			}
			else {
				return;
			}
		}

		/* --- High & College --- */
		function getNumberOfFaculty($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_faculty';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfDepartment($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_department';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfCourse($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_course';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfTutor($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_tutor';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE school_id='$school_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfDepartmentInFaculty($fac_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_department';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE fac_id='$fac_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfCourseInDepartment($dept_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_course';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE dept_id='$dept_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfTutorInDepartment($dept_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_tutor';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE dept_id='$dept_id'");
			return $stmt->fetchColumn();
		}

		function getNumberOfStudentInDepartment($dept_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_students';

			$stmt = $this->pdo->query("SELECT COUNT(*) FROM $table WHERE dept_id='$dept_id'");
			return $stmt->fetchColumn();
		}

		function getFacultyInfo($col, $fac_id, $db) {
			if (!empty($fac_id)) {
				$this->db = strtolower($db);
				$table = $this->db.'_faculty';

				if ($col == '*') {
					$stmt = $this->pdo->query("SELECT * FROM $table WHERE fac_id='$fac_id' ORDER BY name ASC");
					return $stmt->fetch(PDO::FETCH_OBJ);
				}
				else {
					$stmt = $this->pdo->query("SELECT $col FROM $table WHERE fac_id='$fac_id'");
					return $stmt->fetchColumn();
				}
			}
			else {
				return;
			}
		}

		function fetchFaculty($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_faculty';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' ORDER BY name ASC");
		}

		function fetchDepartment($school_id, $db) {
			$this->db = strtolower($db);
			$table = $this->db.'_department';

			return $this->pdo->query("SELECT * FROM $table WHERE school_id='$school_id' ORDER BY name ASC");
		}
	}
?>