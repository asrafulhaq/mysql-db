<?php 

	include_once "./autoload.php";


	// student data delete
	if( isset($_GET['delete_id']) ){
		$id = $_GET['delete_id'];
		connect() -> query("DELETE FROM students WHERE id='$id'");
		header("location:./");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	

	
	

	<div class="wrap-table">
		<a class="btn btn-primary btn-sm"  href="./create.php">Add new student</a>
		<hr>
		<form action="" class="form-inline" method="POST">
			<!-- <div class="my-3">
				<select class="form-control" name="ls" id="">
					<option value="">-select-</option>
					<option value="Mirpur">Mirpur</option>
					<option value="Uttara">Uttara</option>
					<option value="Banani">Banani</option>
					<option value="Badda">Badda</option>
					<option value="Gulshan">Gulshan</option>
				</select>
			</div>
			<div class="my">
			<select class="form-control" name="edu" id="">
				<option value="">-select-</option>
				<option value="PSC">PSC</option>
				<option value="JSC">JSC</option>
				<option value="SSC">SSC</option>
				<option value="HSC">HSC</option>
				<option value="BSc">BSc</option>
			</select> -->
			<!-- </div> -->
			<div class="my-3">
				<input name="se" type="text">
			</div>
			<div class="my-3">
				<input type="submit" name="search" value="Search" class="btn btn-sm btn-primary">
			</div>
		</form>
		<hr>

		<div class="card shadow-sm">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Roll</th>
							<th>Reg</th>
							<th>Gender</th>
							<th>Location</th>
							<th>Education</th>
							<th>Result</th>
							<th>Photo</th>
							<th width="200">Action</th>
						</tr>
					</thead>
					<tbody>


						<?php 


							// get all students data 
							$data = connect() -> query("SELECT * FROM students");



							// get all students data 
							$minmax = connect() -> query("SELECT MIN(payment) as minPay, MAX(payment) as maxPay, SUM(payment) as total, AVG(payment) as avgPay  FROM students");
							$minmaxdata = $minmax -> fetch_object();
							

							// search student by location & education 
							if( isset($_POST['search']) ){
								// $location = $_POST['ls'];
								// $edu = $_POST['edu'];
								$search = $_POST['se'];
								$data = connect() -> query("SELECT * FROM students WHERE name LIKE '%$search%'");
							}
							
							$i = 1;
							while( $student = $data -> fetch_object() ) :

						?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $student -> name; ?></td>
							<td><?php echo $student -> roll; ?></td>
							<td><?php echo $student -> reg; ?></td>
							<td><?php echo $student -> gender; ?></td>
							<td><?php echo $student -> location; ?></td>
							<td><?php echo $student -> education; ?></td>
							<td>
								<?php if( $student -> bn == 0 || $student -> en == 0 || $student -> math == 0 ) : ?>
									<a class="btn btn-warning btn-sm" href="./marks.php?student_id=<?php echo $student -> id; ?>">Set Marks</a>
								<?php else : ?>
									<a class="btn btn-success btn-sm" href="./result/">Check Result</a>
								<?php endif; ?>


							</td>
							<td><img src="photos/<?php echo $student -> photo; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="profile.php?student_id=<?php echo $student -> id; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $student -> id; ?>">Delete</a>
							</td>
						</tr>
						<?php endwhile; ?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							
						</tr>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>