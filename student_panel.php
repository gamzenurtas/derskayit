<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("student_auth.php"); //include auth.php file on all secure pages  
include("db.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bilgisayar.me</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
* {
	margin: 0;
}
html, body {
	height: 100%;
}
.container {
	min-height: 100%;
	/* equal to footer height */
	margin-bottom: -50px;
}
.container:after {
	content: "";
	display: block;
}
.site-footer, .container:after {
	height: 50px;
}
.site-footer {
	background: #86DB78;
	text-align: center;
	padding-top: 15px
}
</style>
</head>

<body>
<div class="container">
  
  <hr />
  <div class="row">
    <div class="col-lg-12"> 
					        <?php session_start();
							 
							$postId = isset($_SESSION['id']);
							$sqlLec="SELECT * FROM student WHERE id ='$postId'";
							$sorguLec=mysqli_query($con,$sqlLec);
							while( $sonucLec=mysqli_fetch_assoc($sorguLec) ){
							   $nameO = $sonucLec['name'];
							   $surname = $sonucLec['surname'];
							}

							echo "<p style='color:blue;font-weight:bold;'>HOŞGELDİN " . $nameO . " " . $surname ." !</p>";
							


 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
  <thead>
    <tr id="defaultTr">
    <!--<th width="5%"><input type="checkbox" name="hepsinisec" id="hepsinisec" /></th>-->
    <th width="5%">Code</th>
    <th width="23%">Ad</th>
    <th width="23%">Zorunluluk</th>
	<th width="67%">Öğretim Görevlisi</th>
    <th width="23%">Gün</th>
	<th width="67%">Saat</th>
  </tr></thead>
  <?php 

							$sorgu = $con->query("SELECT * FROM lecture"); // lecture tablosundaki tüm verileri çekiyoruz.

							while ($sonuc = $sorgu->fetch_assoc()) { 

							$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
							$code = $sonuc['code'];
							$name = $sonuc['name'];
							$ismandatory = $sonuc['ismandatory'];
							$facultymember_name = $sonuc['facultymember_name'];
							$class = $sonuc['class'];
							$day = $sonuc['day'];
							$hour = $sonuc['hour'];						

							?>
  <tbody>
  <tr class="ss" id="<?php echo $id; ?>">
									<!--<td><input type="checkbox" name="onaykutusu[]" id="onaykutusu[<?php echo $id; ?>]" value="<?php echo $id; ?>"/></td>-->
									<td><?php echo $code; ?></td>
									<td><?php echo $name; ?></td>
									<td><?php echo $ismandatory; ?></td>
									<td><?php echo $facultymember_name; ?></td>
									<td><?php echo $day; ?></td>
									<td><?php echo $hour; ?></td>
  </tr>
  <?php }?>
    </tbody>
</table>
<button class="btn btn-info" id="kaydiTamamla"><i class="fa fa-check"></i> Seçilenleri Programa Ekle</button>
<button class="btn btn-info" id="kaydiSil"><i class="fa fa-trash"></i>Seçilenleri Programdan Kaldır</button>
    </div>
  </div>
  <!-- row--> 




  <div class="row" style="margin-top: 5%;">
    <div class="col-lg-12"> 
					        <?php 
							echo "<p style='color:blue;font-weight:bold;'>SEÇTİĞİNİZ DERSLER  " . $nameO . " " . $surname ." !</p>";
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
  <thead>
    <tr id="defaultTr">
    <!--<th width="5%"><input type="checkbox" name="hepsinisec" id="hepsinisec" /></th>-->
    <th width="5%">Code</th>
    <th width="23%">Ad</th>
    <th width="23%">Zorunluluk</th>
	<th width="67%">Öğretim Görevlisi</th>
    <th width="23%">Gün</th>
	<th width="67%">Saat</th>
  </tr></thead>
  <?php 

  							$sorgu1 = $con->query("SELECT * FROM lecture_register"); // lecture tablosundaki tüm verileri çekiyoruz.

							while ($sonuc1 = $sorgu1->fetch_assoc()) {
								$code1 = $sonuc1['code'];
							


							$sorgu = $con->query("SELECT * FROM lecture WHERE code = '$code1'"); // lecture tablosundaki tüm verileri çekiyoruz.

							while ($sonuc = $sorgu->fetch_assoc()) { 

							$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
							$code = $sonuc['code'];
							$name = $sonuc['name'];
							$ismandatory = $sonuc['ismandatory'];
							$facultymember_name = $sonuc['facultymember_name'];
							$day = $sonuc['day'];
							$hour = $sonuc['hour'];						

							?>
  <tbody>
  <tr id="<?php echo $id; ?>">
									<!--<td><input type="checkbox" name="onaykutusu[]" id="onaykutusu[<?php echo $id; ?>]" value="<?php echo $id; ?>"/></td>-->
									<td><?php echo $code; ?></td>
									<td><?php echo $name; ?></td>
									<td><?php echo $ismandatory; ?></td>
									<td><?php echo $facultymember_name; ?></td>
									<td><?php echo $day; ?></td>
									<td><?php echo $hour; ?></td>
  </tr>
  <?php }}?>
    </tbody>
</table>
    </div>
  </div>


</div>
<div id="sonuc"></div> 
<script>
(function($){
	// Bütün onay kutularını seç

	// Button tıklandı

  
    /*var checkedBox[];

    $(document).on("click","input",function(){
		var thisVal = parseInt($(this).attr("value")) + 2;
		alert(thisVal);
		alert("thisVal");

		if ($(this).prop("checked"))
         addArray(thisVal); 
        else
         removeArray(thisVal);
	});
*/
	

	/*$(document).on("click","#kaydiTamamla",function(){
		var onaykutu = $('input[name="onaykutusu[]"]:checked');
		var enazbironay = onaykutu.length > 0;
		if (enazbironay <= 0) {
			alert("En az bir onay kutusu seçmelisiniz");
			return false;
		} else {
			$.ajax({ 
				type: "POST", 
				url: "ajax.php",
				data: "onay=onay&" + onaykutu.serialize(), 
				success: function(html){
					if (onaykutu){ 
						onaykutu.closest("tr").slideUp();
					}
					alert("başarılı!!");
				}
			});
		}
	});*/


	 $("tr.ss").mouseover(function(){
	 	if($(this).css("background-color")!="rgb(0, 0, 255)") { //background blue ise
        	$(this).css("background-color", "#00BFFF"); //turquoise
        	$("#defaultTr").css("background-color", "white");
        }
     });

     $("tr.ss").mouseout(function(){
     	if($(this).css("background-color")!="rgb(0, 0, 255)") {
       		 $(this).css("background-color", "white");
        }
    });

     $("tr.ss").click(function(){
     	
     	if($(this).css("background-color")=="rgb(0, 0, 255)") {
        	$(this).css("background-color", "white");          
        }
        else
     	 $(this).css("background-color", "#0000FF");

     	 $("#defaultTr").css("background-color", "white");
     });


     $(document).on("click","#kaydiTamamla",function(){
     		var backColor;
     		var id;
     		$('tr.ss').each(function (i){

     				backColor = $(this).css("background-color");
     				id = $(this).attr("id");

     				if ((i != 0) && backColor == "rgb(0, 0, 255)" ) {
     						    var dataI = 'id='+id;
			     				$.ajax({ 
									type: "POST", 
									url: "ajax.php",
									data: dataI, 
									success: 
									 function(cevap){
								            
								    } 
								});
     				}
    		});
     });

     $(document).on("click","#kaydiSil",function(){
     		var backColor;
     		var id;
     		$('tr.ss').each(function (i){

     				backColor = $(this).css("background-color");
     				id = $(this).attr("id");

     				if ((i != 0) && backColor == "rgb(0, 0, 255)" ) {
     						    var dataI = 'id='+id;
			     				$.ajax({ 
									type: "POST", 
									url: "ajaxSil.php",
									data: dataI, 
									success: 
									 function(cevap){
								           
								    } 
								});
     				}
    		});
     });
     

})(jQuery);
</script>

</body>
</html>