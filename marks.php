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
	<title><?php echo $student_data -> name; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>


	<?php 
    
        // result form submit 
        if( isset($_POST['result_add']) ){
            // get student id value 
            $student_id = $student_data -> id;

            // get form data 
            $bn = $_POST['bn'];
            $en = $_POST['en'];
            $math = $_POST['math'];
            $sci = $_POST['sci'];
            $ssci = $_POST['ssci'];
            $reli = $_POST['reli'];


            if( empty($bn) || empty($en) || empty($math) || empty($sci) || empty($ssci) || empty($reli) ){
                $msg = validate('All fields are required');
            }else {
                connect() -> query("UPDATE students SET bn='$bn', en='$en', math='$math', sci='$sci', ssci='$ssci', reli='$reli' WHERE id='$student_id'");
                header("location:./");
            }


        }
    
    
    ?>
	

	<div class="wrap ">
		<a class="btn btn-primary btn-sm"  href="./">back</a>
		<br>
		<br>
		<div class="card shadow-sm">
			<div class="card-body">
				<div class="profile">
                    <img src="photos/<?php echo $student_data -> photo; ?>" alt="">
                    <h4><?php echo $student_data -> name; ?></h4>
                    <p>Roll :<?php echo $student_data -> roll; ?> Registration : <?php echo $student_data -> reg; ?></p>
                </div>
                <hr>
				<?php echo $msg ?? ''; ?>
				<form action="" method="POST">

					<div class="form-group">
						<label for="">Bangla</label>
						<input name="bn" value="<?php echo $student_data -> bn; ?>" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">English</label>
						<input name="en" value="<?php echo $student_data -> en; ?>" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Math</label>
						<input name="math" value="<?php echo $student_data -> math; ?>" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Science</label>
						<input name="sci" class="form-control" value="<?php echo $student_data -> sci; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Social Science</label>
						<input name="ssci" class="form-control" value="<?php echo $student_data -> ssci; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Religion</label>
						<input name="reli" class="form-control" value="<?php echo $student_data -> reli; ?>" type="text">
					</div>
					
					<div class="form-group">
						<input name="result_add" class="btn btn-primary" type="submit" value="Set Result">
					</div>
				</form>
			</div>
		</div>
	</div>


    <br>
    <br>
    <br>
    <br>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>


</body>
</html>