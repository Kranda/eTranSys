<?php
	/**
	* Templates for website
	*/
	class templates {

		public $title;
		public $activeLink;

		function __construct() {
			
		}

		function headTag($title) {
			$html = '
				<link rel="icon" type="image/png" href="../../assets/img/symbol.png">

				<title>'.$title.'</title>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="Unified Transcript">
				<meta name="keywords" content="Unified, Transcript, Education, Student">
				<meta name="author" content="UniTran Team">

				<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../../assets/font-awesome/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

				<noscript>
					<meta http-equiv="refresh" content="5; URL=http://www.enable-javascript.com">
					Your browser does not support JavaScript. Please follow the next steps to enable it.
				</noscript>
			';

			return $html;
		}

		function headTag2($title) {
			$html = '
				<link rel="icon" type="image/png" href="../../../assets/img/symbol.png">

				<title>'.$title.'</title>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="Unified Transcript">
				<meta name="keywords" content="Unified, Transcript, Education, Student">
				<meta name="author" content="UniTran Team">

				<link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../../../assets/font-awesome/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

				<noscript>
					<meta http-equiv="refresh" content="5; URL=http://www.enable-javascript.com">
					Your browser does not support JavaScript. Please follow the next steps to enable it.
				</noscript>
			';

			return $html;
		}

		function scriptTags() {
			$html = '
				<script src="../../assets/js/jquery.min.js"></script>
				<script src="../../assets/js/popper.min.js"></script>
				<script src="../../assets/js/bootstrap.js"></script>
				<script src="../../assets/js/base.js"></script>
			';

			return $html;
		}

		function scriptTags2() {
			$html = '
				<script src="../../../assets/js/jquery.min.js"></script>
				<script src="../../../assets/js/popper.min.js"></script>
				<script src="../../../assets/js/bootstrap.js"></script>
				<script src="../../../assets/js/base.js"></script>
			';

			return $html;
		}

		function errors($msg) {
			$html = '';

			if ($msg == 'success') {
				$html .= '
					<div class="alert alert-dismissible alert-success">
						<button class="close" type="button" data-dismiss="alert">×</button>
						Command was successfully processed!
					</div>
				';
			}
			else if ($msg == 'error') {
				$html .= '
					<div class="alert alert-dismissible alert-danger">
						<button class="close" type="button" data-dismiss="alert">×</button>
						Command was unsuccessfully processed!
					</div>
				';
			}

			return $html;
		}

		function footer() {
			$html = '
				<div class="footer text-center">
					&copy;Copyright 2018. All Rights Reserved.<br>
					<b class="paint">UniTran Team</b>
				</div>
			';

			return $html;
		}

		/* --- Elementary & Middle Schools --- */
		function elementNavbar($adminName) {
			$html = '
				<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
					<a class="navbar-brand" href="index.php"><img src="../../assets/img/logo.png" width="150"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Dashboard</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Classes
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="classes.php?u=reg">Register</a>
									<a class="dropdown-item" href="classes.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Teachers
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="teachers.php?u=reg">Register</a>
									<a class="dropdown-item" href="teachers.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Students
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="students.php?u=reg">Register</a>
									<a class="dropdown-item" href="students.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Subjects
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="subjects.php?u=reg">Register</a>
									<a class="dropdown-item" href="subjects.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Result
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="result.php?u=op">Open</a>
									<a class="dropdown-item" href="result.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Settings</a>
							</li>
							<li class="nav-item logout">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			';

			return $html;
		}

		function elementActive($activeLink) {
			$active = $activeLink;
			$html; $id;

			if ($active == 'Class') {
				$id = '2';
			}
			else if ($active == 'Teacher') {
				$id = '3';
			}
			else if ($active == 'Student') {
				$id = '4';
			}
			else if ($active == 'Subject') {
				$id = '5';
			}
			else if ($active == 'Result') {
				$id = '6';
			}
			else if ($active == 'Profile') {
				$id = '7';
			}
			else if ($active == 'Settings') {
				$id = '8';
			}
			else {
				$id = '1';
			}

			$html = '
				<script type="text/javascript">
					$(document).ready(function() {
						var id = parseInt('.$id.');
						$(".navbar .collapse ul li:nth-child(" + id + ")").addClass("active");
					});
				</script>
			';

			return $html;
		}

		/* --- High School & College --- */
		function highNavbar($adminName) {
			$html = '
				<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
					<a class="navbar-brand" href="index.php"><img src="../../../assets/img/logo.png" width="150"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Dashboard</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Faculty
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="faculty.php?u=reg">Register</a>
									<a class="dropdown-item" href="faculty.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Department
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="department.php?u=reg">Register</a>
									<a class="dropdown-item" href="department.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Course
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="course.php?u=reg">Register</a>
									<a class="dropdown-item" href="course.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Tutor
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="tutor.php?u=reg">Register</a>
									<a class="dropdown-item" href="tutor.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Student
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="student.php?u=op">Open</a>
									<a class="dropdown-item" href="student.php?u=man">Manage</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Settings</a>
							</li>
							<li class="nav-item logout">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			';

			return $html;
		}

		function highActive($activeLink) {
			$active = $activeLink;
			$html; $id;

			if ($active == 'Faculty') {
				$id = '2';
			}
			else if ($active == 'Department') {
				$id = '3';
			}
			else if ($active == 'Course') {
				$id = '4';
			}
			else if ($active == 'Tutor') {
				$id = '5';
			}
			else if ($active == 'Student') {
				$id = '6';
			}
			else if ($active == 'Profile') {
				$id = '7';
			}
			else if ($active == 'Settings') {
				$id = '8';
			}
			else {
				$id = '1';
			}

			$html = '
				<script type="text/javascript">
					$(document).ready(function() {
						var id = parseInt('.$id.');
						$(".navbar .collapse ul li:nth-child(" + id + ")").addClass("active");
					});
				</script>
			';

			return $html;
		}
	}
?>