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

							
							$sqlIn = "DELETE FROM `lecture_register` WHERE code = '$code' ";
							$sorguIn=mysqli_query($con,$sqlIn);


							
		                   /* $dosya = fopen('deneme.txt', 'a');
							
							fwrite($dosya, $codeClass);

						    fclose($dosya);*/
						  
?>