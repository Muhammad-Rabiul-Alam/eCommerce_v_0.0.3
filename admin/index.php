<?php 

	include "../db/config.php";  
    include "../db/connect.php";
    include "check_login.php";
    include "../db/db_helper.php";
    include "../product/pagination.php";

    $data=NULL;

    $sql=search('','','');
    $row=$sql->rowCount();
    if($row>0){
        $limit=3;
        $pg_qty=(int)ceil($row/$limit);
        $res=paginate($page,$qa,$limit);
    } 
    else $data['empty'] = "No such item found.";

    if($page==1) $disable_pre="disabled";
    elseif($page==$pg_qty) $disable_nxt="disabled";

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(!empty($_POST['previous']) && $_POST['previous']==='previous'){
            if($page>1) $page--;
            else $page=1;
        }
        if(!empty($_POST['next']) && $_POST['next']==='next'){
            if($page<$pg_qty) $page++;
            else $page=$pg_qty;
        }
        header('location: index.php?page='.$page);
    }
    

	//Delete Product
	if (isset($_GET['deleteproduct_id'])) {
	  $data['confirmation'] = '<div class="confirmation" align="center"> Do you really want to delete product with ID of ' 
                	  		  . $_GET['deleteproduct_id'] . '? <a class="btn btn-warning" href="index.php?yesdelete=' 
                	  		  . $_GET['deleteproduct_id'] . '">Yes</a> | <a class="btn btn-info" href="index.php">No</a> </div>';
	}
	if (isset($_GET['yesdelete'])) {
	  $product_id_to_delete = $_GET['yesdelete'];
	  myQuery("DELETE FROM products WHERE product_id=:product_id LIMIT 1",array(':product_id'=>$product_id_to_delete),$conn) or die (error());
	   $pictodelete = ("../assets/img/$product_id_to_delete.jpg");
	    if (file_exists($pictodelete)) {
	              unlink($pictodelete);
	    }
	  header("location: index.php"); 
	}

    include "directory_from_admin.php";
    include "../views/header.view.php";
    include "../views/admin/admin_header.view.php";
    include "../views/admin/index.view.php"; 
    include "../views/admin/admin_footer.view.php";
?>