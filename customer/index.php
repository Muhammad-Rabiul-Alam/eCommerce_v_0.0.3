<?php 
	 session_start(); 
	 if(!isset($_SESSION['customer_email'])){ 
	 	header('location: customer_signin.php');
	 	exit();
	 }
	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";

    include "directory_from_customer.php";
    include "../views/header.view.php";
    include "../views/customer/index.view.php";
    include "../views/footer.view.php";
?>