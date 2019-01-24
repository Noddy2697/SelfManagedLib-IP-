<?php
session_start();
include"connection.php" ;
include("qr/qrlib.php");
?>

<?php
$res = $_SESSION[username];
							   
QRcode::png($res,"new.png","H","10","10")   ;
							  
?>
<img src="books/new.png" />