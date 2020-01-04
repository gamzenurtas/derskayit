

<?php
session_start();
if(!isset($_SESSION["id"])){
header("Location: staff_login.php");
exit(); }
?>
