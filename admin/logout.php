<?php 

	session_start();
	session_unset();
	session_destroy();
	//session_unset($_SESSION["admin_id"]);
 	//session_unset($_SESSION["admin_name"]);
 	//session_unset($_SESSION["admin_password"]);
	header("location: login.php");

 ?>