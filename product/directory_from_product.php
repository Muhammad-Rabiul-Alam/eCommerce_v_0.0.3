<?php  
	$assets_loc="../";
    $index_loc="../";
    $signin_loc="../customer/";
    if(isset($_SESSION['admin_name'])) $signout_loc="../admin/logout.php";
    else $signout_loc="../customer/customer_signout.php";
    $cart_loc="../customer/";
    $signin_who="customer_email";
    $admin_loc="../admin/";
    $search_box_loc="../";
    $search_action_loc="";
    $paginate_loc="views/";
?>