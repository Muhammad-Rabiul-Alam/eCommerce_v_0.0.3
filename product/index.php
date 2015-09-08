<?php 
	session_start();
	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
    include "pagination.php";

    $sql=search('','','');
    $row=$sql->rowCount();
    if($row>0){
        $limit=3;
        $pg_qty=(int)ceil($row/$limit);
        $res=paginate($page,$qa,$limit);
    } 
    else {
		echo "No such item found.";
	    exit();
	}

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


	include "directory_from_product.php";
    include "../views/header.view.php";
    include "../views/product/index.view.php"; 
    include "../views/footer.view.php";
?>