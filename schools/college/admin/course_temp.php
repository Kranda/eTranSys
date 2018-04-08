<?php
	require('../../../assets/templates/base.php');
	require('../../../assets/main/main.php');

	if (!(isset($_SESSION['school_id']))) {
		header('location: ../../index.php');
	}

	class page {
		public $db;

		function __construct() {
			$this->templates = new templates();

			$this->db = 'CO';
			$this->main = new mainDB($this->db);

			$this->school_id = $_SESSION['school_id'];
			$this->schoolInfo = $this->main->getSchoolInfo($this->school_id, $this->db);

			if (!(isset($_GET['u']))) {
				$this->link = 'man';
			}
			else {
				$this->link = $_GET['u'];

				if ($this->link != 'reg' && $this->link != 'man') {
					$this->link = 'reg';
				}
			}
		}
	}
	
	$page = new page();
?>

<!DOCTYPE html>
<html lang="en">
	<?php echo $page->templates->headTag2('UniTran | Course'); ?>

	<body class="main">
		<!-- Navbar-->
		<?php echo $page->templates->highNavbar($page->main->getAdminInfo($page->school_id, $page->db)->name); ?>

		<div class="container content-wrapper">
			<div class="page-title">
				<h1 class="text-center">Course</h1>
				<p class="text-center text-muted">Codes || Titles || Units</p>
			</div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><i class="fa fa-book"></i> Course</li>
				<li class="breadcrumb-item"><a href="course.php?u=reg">Register</a></li>
				<li class="breadcrumb-item"><a href="course.php?u=man">Manage</a></li>
			</ol>
			
			<?php
				// errors
				if (isset($_GET['in'])) {
					echo $page->templates->errors($_GET['in']);
				}

				if ($page->link == 'reg') {
					echo '
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Register</h4>
								<form method="POST" action="../../../assets/main/query.php">
									<input name="school_id" type="hidden" value="'.$page->school_id.'">
									<input name="db" type="hidden" value="'.$page->db.'">
									
									<div class="form-group">
										<label class="control-label">Title</label>
										<input class="form-control" name="title" type="text" placeholder="ICT, Biology, etc." required>
									</div>
									<div class="form-group">
										<label class="control-label">Code</label>
										<input class="form-control" name="code" type="text" placeholder="MIT AAA, CSC 111" required>
									</div>
									<div class="form-group">
										<label class="control-label">Unit</label>
										<input class="form-control" name="unit" type="number" placeholder="Importance" required>
									</div>
									<div class="form-group">
										<label class="control-label">Department</label>
										<select class="form-control" name="dept_id" required>
											<option value="">Assign a department...</option>';
											$stmt = $page->main->fetchDepartment($page->school_id, $page->db);
											while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
												echo '
													<option value="'.$row->dept_id.'">'.$row->name.'</option>
												';
												$sn++;
											}
										echo '
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Level</label>
										<select class="form-control" name="level" required>
											<option value="">Select level...</option>';
										echo '
										</select>
									</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-primary" type="submit" name="registerCourse"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
								</form>
							</div>
						</div>
					';
				}
				else {
					echo '
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Manage</h4>
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th width="25">S/N</th>
												<th>Name</th>
												<th>No of Courses</th>
												<th>No of Tutors</th>
												<th>No of Students</th>
												<th width="25"></th>
												<th width="25"></th>
												<th width="25"></th>
											</tr>
										</thead>
										<tbody>';
											$sn = 1;

											// $stmt = $page->main->fetchDepartment($page->school_id, $page->db);
											// while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
											// 	echo '
											// 		<tr>
											// 			<td>'.$sn.'</td>
											// 			<td>'.$row->name.'</td>
											// 			<td>'.$page->main->getFacultyInfo('name', $row->fac_id, $page->db).'</td>
											// 			<td>'.$page->main->getNumberOfCourseInDepartment($row->dept_id, $page->db).'</td>
											// 			<td>'.$page->main->getNumberOfTutorInDepartment($row->dept_id, $page->db).'</td>
											// 			<td>'.$page->main->getNumberOfStudentInDepartment($row->dept_id, $page->db).'</td>
											// 			<td><a href="#" class="btn btn-success btn-sm disabled"><i class="fa fa-edit"></i></a></td>
											// 			<td><a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-eye"></i></a></td>
											// 			<td><a href="#" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></a></td>
											// 		</tr>
											// 	';

											// 	$sn++;
											// }
										echo '
										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer">
								<a class="btn btn-primary" href="course.php?u=reg" type="button">
									<i class="fa fa-check-circle"></i> Register
								</a>
								<a class="btn btn-info disabled" href="#" type="button">
									<i class="fa fa-file"></i> Print
								</a>
							</div>
						</div>
					';
				}
			?>

			<?php echo $page->templates->footer(); ?>
		</div>

		<!-- Javascripts-->
		<?php echo $page->templates->scriptTags2(); ?>

		<?php echo $page->templates->highActive('Course'); ?>
	</body>
</html>