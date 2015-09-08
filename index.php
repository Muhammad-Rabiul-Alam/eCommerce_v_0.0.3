<?php 
	session_start();
	include "db/config.php";  
    include "db/connect.php";
    include "db/db_helper.php";
 ?>

<?php  
	
?>

<?php 
	$assets_loc="";
	$index_loc="";
	$cart_loc="customer/";
	$search_box_loc="";
	$search_action_loc="product/";
	
	if(isset($_SESSION['admin_name'])){
		$signin_who="admin_name";
		$signin_loc="admin/login.php";
		$signout_loc="admin/logout.php";
		$admin_loc="admin/index.php";
	}
	else {
		$signin_who="customer_email";
		$signin_loc="customer/customer_signin.php";
		$signout_loc="customer/customer_signout.php";
	}
?>
<?php include "views/header.view.php"; ?>
<?php include "views/index.view.php"; ?>
<br><br>
<?php include "views/footer.view.php"; ?>



