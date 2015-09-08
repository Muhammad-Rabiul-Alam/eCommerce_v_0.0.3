<?php 

	session_start();
	session_unset();
	session_destroy();
	//if(isset($_GET['logout'])) {
	   // session_unset($_SESSION["customer_id"]);
	   // session_unset($_SESSION["customer_email"]);
	   // session_unset($_SESSION["customer_password"]);
	//}
	header("location: customer_signin.php");

 ?>