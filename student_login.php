<!DOCTYPE html>
<html lang="en">
<head>
	<title>DEU-DERS KAYIT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['id'])){
		
		$id = stripslashes($_REQUEST['id']); // removes backslashes
		$id = mysqli_real_escape_string($con,$id); //escapes special characters in a string
		$code = stripslashes($_REQUEST['code']);
		$code = mysqli_real_escape_string($con,$code);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `student` WHERE id='$id' and code='$code'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['id'] = $id;
			header("Location: student_panel.php"); // Redirect user to index.php
            }else{
					header("Location: warn.php");				}
    }else{
?>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="" method="post" name="login" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Öğrenci Girişi
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "ID alanı boş bırakılamaz">
						<span class="label-input100">Kullanıcı ID</span>
						<input class="input100" type="text" name="id" placeholder="Kullanıcı ID nizi giriniz">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Şifre alanı boş bırakılamaz">
						<span class="label-input100">Şifre</span>
						<input class="input100" type="password" name="code" placeholder="Şifrenizi Giriniz">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
		
					<div style="margin-top: 10px;" class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							
							<button name="submit" type="submit" class="login100-form-btn">
															Giriş
														</button>

							
						</div>
					</div>
				</form>
				
				
				
				
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

<?php } ?>
</html>