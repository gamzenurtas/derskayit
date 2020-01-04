<?php
						include("db.php");	                   
							session_start();
							$studentCode = isset($_SESSION['id']);

							$postId = $_POST['id'];
							$sqlLec="SELECT * FROM lecture WHERE id ='$postId'";
							$sorguLec=mysqli_query($con,$sqlLec);
							while( $sonucLec=mysqli_fetch_assoc($sorguLec) ){
							   $code = $sonucLec['code'];
							   $facultymember_name = $sonucLec['facultymember_name'];
							}


							$sqlMem="SELECT * FROM facultymember WHERE name + ' ' + surname ='$facultymember_name'";
							$sorguMem=mysqli_query($con,$sqlMem);
							while( $sonucMem=mysqli_fetch_assoc($sorguMem) ){
							   $codeMember = $sonucMem['code'];
							   $surname = $sonucMem['surname'];
							}

							$sqlMem="SELECT * FROM classroom WHERE id = 1";
							$sorguMem=mysqli_query($con,$sqlMem);
							while( $sonucMem=mysqli_fetch_assoc($sorguMem) ){
							   $codeClass = $sonucMem['code'];
							}	

							$mailkayitlimi= mysql_query("SELECT * FROM lecture_register where code = '$code' ");
							$num_rows = mysql_num_rows($mailkayitlimi);
							if ($num_rows > 0) 
							{


							//veri var ise bura çalışacak

							}
							else
							{

							$sqlIn = "INSERT INTO `lecture_register` (`code`,`facultymember_code`,`student_code`,`classroom_code`) VALUES ('$code', '$codeMember', '$studentCode', '$codeClass')";
										$sorguIn=mysqli_query($con,$sqlIn);

							}

							
		

		                   /* $dosya = fopen('deneme.txt', 'a');
							
							fwrite($dosya, $codeClass);

						    fclose($dosya);*/
?>