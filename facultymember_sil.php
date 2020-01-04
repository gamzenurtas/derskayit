<?php 

if ($_GET) 
{

include("db.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

if ($con->query("DELETE FROM facultymember WHERE id =".(int)$_GET['id'])) // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
{
	header("location:facultymember_process.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>