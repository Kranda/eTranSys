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
		}
	}
	
	$page = new page();
?>

<!DOCTYPE html>
<html lang="en">
	<?php echo $page->templates->headTag2('UniTran | Dashboard'); ?>

	<body class="main">
		<!-- Navbar-->
		<?php echo $page->templates->highNavbar($page->main->getAdminInfo($page->school_id, $page->db)->name); ?>

		<div class="container content-wrapper">
			<div class="page-title">
				<h1 class="text-center">Dashboard</h1>
				<p class="text-center text-muted">Student Management System</p>
			</div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
				<li class="breadcrumb-item"><a href="#adminInfo">Admin Info</a></li>
			</ol>

			<div class="card">
				<div class="card-header text-center">
					<?php echo '<img alt="logo" src="data:image/jpeg;base64,'.base64_encode($page->main->getSchoolInfo($page->school_id, $page->db)->logo).'" width="150" style="padding: 10px;">'; ?>
					<h3 class="font-weight-bold text-uppercase"><?php echo $page->schoolInfo->name; ?></h3>
				</div>
				<div class="card-body">
					<div class="card-deck">
						<div class="card text-dark bg-white">
							<div class="card-header">
								Total Number of Faculties
							</div>
							<div class="card-body">
								<span class="pull-right font-weight-bold" style="font-size: 200%;">
									<?php echo $page->main->getNumberOfFaculty($page->school_id, $page->db); ?>
								</span>
							</div>
						</div>
						<div class="card text-dark bg-white">
							<div class="card-header">
								Total Number of Departments
							</div>
							<div class="card-body">
								<span class="pull-right font-weight-bold" style="font-size: 200%;">
									<?php echo $page->main->getNumberOfDepartment($page->school_id, $page->db); ?>
								</span>
							</div>
						</div>
						<div class="card text-dark bg-white">
							<div class="card-header">
								Total Number of Courses
							</div>
							<div class="card-body">
								<span class="pull-right font-weight-bold" style="font-size: 200%;">
									<?php echo $page->main->getNumberOfCourse($page->school_id, $page->db); ?>
								</span>
							</div>
						</div>
					</div>
					<br>
					<div class="card-deck">
						<div class="card text-dark bg-white">
							<div class="card-header">
								Total Number of Tutors
							</div>
							<div class="card-body">
								<span class="pull-right font-weight-bold" style="font-size: 200%;">
									<?php echo $page->main->getNumberOfTutor($page->school_id, $page->db); ?>
								</span>
							</div>
						</div>
						<div class="card text-dark bg-white">
							<div class="card-header">
								Total Number of Students
							</div>
							<div class="card-body">
								<span class="pull-right font-weight-bold" style="font-size: 200%;">
									<?php echo $page->main->getNumberOfStudents($page->school_id, $page->db); ?>
								</span>
							</div>
						</div>
					</div>
					<br>
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th colspan="2" class="paint" id="adminINfo">ADMINISTRATOR INFORMATION</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Name</th>
									<td><?php echo $page->main->getAdminInfo($page->school_id, $page->db)->name; ?></td>
								</tr>
								<tr>
									<th>Email address</th>
									<td><?php echo $page->main->getAdminInfo($page->school_id, $page->db)->email; ?></td>
								</tr>
								<tr>
									<th>Phone number</th>
									<td><?php echo $page->main->getAdminInfo($page->school_id, $page->db)->phone; ?></td>
								</tr>
								<tr>
									<th>Address</th>
									<td><?php echo $page->main->getAdminInfo($page->school_id, $page->db)->address; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<?php echo $page->templates->footer(); ?>
		</div>

		<!-- Javascripts-->
		<?php echo $page->templates->scriptTags2(); ?>

		<?php echo $page->templates->highActive('Dashboard'); ?>
	</body>
</html>