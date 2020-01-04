 <!DOCTYPE html>
<?php
include("staff_auth.php"); //include auth.php file on all secure pages  
include("db.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div style="width: 730px;" class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<span style="font-size: 20px;" class="login100-form-title p-b-49">
						Sınıf Düzenleme İşlemleri 
					</span>
				<div class="container">
							<div class="col-md-6">
							<form action="" method="post">
								
								<table class="table">
									
									<tr>
										<td>Code</td>
										<td><input type="text" name="code" class="form-control" ></td>
									</tr>

									<tr>
										<td>Name</td>
										<td><input type="text" name="name" class="form-control" ></td>
									</tr>
									<tr>
										<td>Parentcode</td>
										<td><input type="text" name="parentcode" class="form-control" ></td>
									</tr>
									<tr>
										<td>Type</td>
										<td><input type="text" name="type" class="form-control" ></td>
									</tr>
			
									<tr>
										<td></td>
										<td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
									</tr>

								</table>

							</form>

							<!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

							<?php 

							if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
								
								$code = $_POST['code']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
								$name = $_POST['name'];
								$parentcode = $_POST['parentcode'];
								$type = $_POST['type'];
								

								if ($code<>"" && $name<>"" && $parentcode<>"" && $type<>"" ) { // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
									
									if ($con->query("INSERT INTO classroom (code, name, parentcode, type) VALUES ('$code','$name','$parentcode','$type')")) // Veri ekleme sorgumuzu yazıyoruz.
									{
										echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
									}
									else
									{
										echo "Hata oluştu";
									}

								}

							}

							?>
							</div>

							<div class="col-md-7">
							<table class="table">
								
								<tr>
									<th>Code</th>
									<th>Name</th>
									<th>Parentcode</th>
									<th>Type</th>
									<th></th>
									<th></th>
								</tr>


							<?php 

							$sorgu = $con->query("SELECT * FROM classroom"); // lecture tablosundaki tüm verileri çekiyoruz.

							while ($sonuc = $sorgu->fetch_assoc()) { 

							$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
							$code = $sonuc['code'];
							$name = $sonuc['name'];
							$parentcode = $sonuc['parentcode'];
							$type = $sonuc['type'];

							?>
								
								<tr>
									<td><?php echo $code; ?></td>
									<td><?php echo $name; ?></td>
									<td><?php echo $parentcode; ?></td>
									<td><?php echo $type; ?></td>
									<td><a href="classroom_duzenle.php?id=<?php echo $id; ?>"  class="btn btn-primary">Düzenle</a></td>
									<td><a href="classroom_sil.php?id=<?php echo $id; ?>"  class="btn btn-danger">Sil</a></td>
								</tr>

							<?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. ?>

							</table>
							</div>
</div>
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
</html>