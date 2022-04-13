<?php 

	include_once "./autoload.php";

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


	<?php 

		/**
		 * Student form submit 
		 */
		if( isset($_POST['student_add']) ){
			// get form values
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$gender = $_POST['gender'] ?? '';
			$education = $_POST['education'];
			$location = $_POST['location'];
 

			// form validation 
			if( empty($name) || empty($email) || empty($cell)  ){
				$msg = validate('All fields are required !');
			}else {


				// Get file info
				$file_name = time() . rand(). $_FILES['photo']['name'];
				$file_tmp_name = $_FILES['photo']['tmp_name'];

				move_uploaded_file($file_tmp_name, 'photos/' . $file_name);


				connect() -> query("INSERT INTO students (name, email, cell, gender, education, location, photo) VALUES ('$name','$email','$cell', '$gender','$education','$location','$file_name')");

				$msg = validate('Data Stable', 'success');
			}





		}


	?>
		
	

	<div class="wrap ">
		<a class="btn btn-primary btn-sm"  href="./index.php">All Students</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Create new Student</h2>
				<?php echo $msg ?? ''; ?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input  name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Gender</label>
						<input name="gender" class="" type="radio" value="Male" id="Male"> <label for="Male">Male</label>
						<input name="gender" class="" type="radio" value="Female" id="Female"> <label for="Female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Education</label>
						<select class="form-control" name="education" id="">
							<option value="">-select-</option>
							<option value="PSC">PSC</option>
							<option value="JSC">JSC</option>
							<option value="SSC">SSC</option>
							<option value="HSC">HSC</option>
							<option value="BSc">BSc</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
							<option value="">-select-</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Uttara">Uttara</option>
							<option value="Banani">Banani</option>
							<option value="Badda">Badda</option>
							<option value="Gulshan">Gulshan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<hr>
						<img style="max-width: 100%;" id="preview" src="" alt="">
						<hr>
						<input name="photo" class="d-none" type="file" id="image_upload">
						<label for="image_upload"><img style="width: 70px; cursor:pointer; height:70px; display:block;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLhrNdfW7QcxmBZuekw6yIWAr7FEcsu7y4vsVQjwJSGo8dNQ7-6H4J9HHqzJkVEds20QI&usqp=CAU" alt=""></label>
					</div>
					<div class="form-group">
						<input name="student_add" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<script>

		$('#image_upload').change(function(e){
			let image = URL.createObjectURL(e.target.files[0]);
			$('#preview').attr('src', image);
		});

	</script>
</body>
</html>