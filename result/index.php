<?php 

	include_once "./autoload.php"; 
	$msg = $_GET['error'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="assets/css/syle.css">

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/bd_logo.png">
</head>
<body>



	

	<div class="wraper">
		
		<div class="w-top">
			<div class="logo">
				<img src="assets/images/bd_logo.png" alt="">
			</div>
			<div class="banner">
				<h3>Ministry of Education</h3>
				<hr>
				<h4>Intermediate and Secondary Education Boards Bangladesh</h4>
			</div>
		</div>
		<div class="w-main">
		<p><?php echo $msg ?? ''; ?></p>
			<div class="search-result">
				<form action="./search.php" method="POST">
					<table>
					<tr>
						<td>Examination</td>
						<td>
							<select name="exam">
							<option value="">-select-</option>
							<option value="PSC">PSC</option>
							<option value="JSC">JSC</option>
							<option value="SSC">SSC</option>
							<option value="HSC">HSC</option>
							<option value="BSc">BSc</option>
                          	</select>
						</td>
					</tr>
					<tr>
						<td>Year</td>
						<td>
							<select name="year">
                            <option value="" selected>Select One</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                          </select>
						</td>
					</tr>
					<tr>
						<td>Board</td>
						<td>
						 	<select name="board">
		                          <option value=""selected>Select One</option>
								  <option value="barisal">Barisal</option>
								  <option value="chittagong">Chittagong</option>
								  <option value="comilla">Comilla</option>
		                          <option value="dhaka">Dhaka</option>
								  <option value="dinajpur">Dinajpur</option>
								  <option value="jessore">Jessore</option>
		                          <option value="rajshahi">Rajshahi</option>
		                          <option value="sylhet">Sylhet</option>
		                          <option value="madrasah">Madrasah</option>
								  <option value="tec">Technical</option>
								  <option value="dibs">DIBS(Dhaka)</option>
                          	</select>
						</td>
					</tr>
					<tr>
						<td> Roll</td>
						<td><input type="text" name="roll"></td>
					</tr>
					<tr>
						<td> Reg: No</td>
						<td><input type="text" name="reg"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="reset" value="reset"><input name="result" type="submit" value="submit"></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		<div class="w-footer">
			<div class="f-left">
				<p>©2005-2019 Ministry of Education, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<img src="assets/images/tbl_logo.png" alt="">
			</div>
		</div>
	</div>
	<div class="bottom">
		<img src="assets/images/play.png" alt="">
	</div>

	

	
</body>
</html>