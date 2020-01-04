
<?php 
ob_start();
include("db.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>DEU-DERS KAYIT</title>
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div style="width: 730px;" class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<?php 

					$sorgu = $con->query("SELECT * FROM facultymember WHERE id =".(int)$_GET['id']); //id değeri ile düzenlenecek verileri veritabanından alacak sorgu
					$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

					?>
					<span style="font-size: 20px;" class="login100-form-title p-b-49">
						Öğretim Görevlisi Düzenleme 
					</span>
					<div class="container">
					<div class="col-md-6">

					<form action="" method="post">
						
						<table class="table">
														<tr>
															<td>Code</td>
															<td><input type="text" name="code" class="form-control" value="<?php echo $sonuc['code'];?>"  ></td>
														</tr>

														<tr>
															<td>Ad</td>
															<td><input type="text" name="name" class="form-control" value="<?php echo $sonuc['name'];?>" ></td>
														</tr>
														<tr>
															<td>Soyad</td>
															<td><input type="text" name="surname" class="form-control" value="<?php echo $sonuc['surname'];?>" ></td>
														</tr>
														<tr>
															<td>Email</td>
															<td><input type="text" name="email" class="form-control" value="<?php echo $sonuc['email'];?>" ></td>
														</tr>
														<tr>
															<td>Başlama Tarihi</td>
															<td><input type="date" name="startdate" class="form-control" value="<?php echo $sonuc['startdate'];?>" ></td>
														</tr>
							

							

							<tr>
								<td></td>
								<td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
							</tr>

						</table>

					</form>
					</div>
				
					<?php 
ob_start();
					if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
						
						$code = $_POST['code']; // Post edilen değerleri değişkenlere aktarıyoruz
						$name = $_POST['name'];
						$surname = $_POST['surname'];
						$email = $_POST['email'];
						$startdate = $_POST['startdate'];

						if ($code<>"" && $name<>"" && $surname<>"" && $email<>"" && $startdate<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
							
							if ($con->query("UPDATE facultymember SET code = '$code', name = '$name', surname = '$surname', email = '$email', startdate = '$startdate'  WHERE id =".$_GET['id'])) // Veri güncelleme sorgumuzu yazıyoruz.
							{

									header("location:facultymember_process.php"); 
							}
							else
							{
								echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
							}

						}

					}
ob_flush();

					?>
					</div>
			</div>
		</div>

</body>
</html>