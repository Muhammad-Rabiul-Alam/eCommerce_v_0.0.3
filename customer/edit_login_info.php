<?php 
	 session_start(); 
	 if(!isset($_SESSION['customer_email'])){ 
	 	header('location:../customer/customer_signin.php');
	 	exit();
	 }
	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
?>

<?php  
	$disable="disable";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$disable="";
	}
?>