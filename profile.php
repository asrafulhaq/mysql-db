<?php 

	include_once "./autoload.php";

	// get profile data 
	if( isset($_GET['student_id']) ){
		$id = $_GET['student_id'];
		$data = connect() -> query("SELECT * FROM students WHERE id='$id' LIMIT 1");
		$student_data = $data -> fetch_object();
	}else {
		header("location:./");
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $student_data -> name;  ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>



	

	<div class="wrap ">
		<div class="card shadow-sm">
			<div class="card-body">
                <div class="profile">
				<img src="photos/<?php  echo $student_data -> photo;  ?>" alt="">
				<h2><?php  echo $student_data -> name;  ?></h2>
				<p><?php  echo $student_data -> email;  ?></p>
				<a class="btn btn-info btn-sm" href="./">back</a>
				</div>
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