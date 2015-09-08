<?php 
    session_start();
    include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
    include "../product/pagination.php";;
    // Check to see the URL variable is set and that it exists in the database

    if(!empty($_GET['pt_id'])){
        $id=htmlspecialchars($_GET['pt_id']);
        $query='pt_id='.$id;
        $qa['pt_id']=$id;
        $sql=search('','',$qa);
        $row=$sql->rowCount();
        if($row>0){
            $pg_qty=(int)ceil($row/$limit);
            $res=paginate($page,$qa,$limit);
        }
        else{ $data['empty_pt_err'] = "There is no product of this type yet!"; }
    }
    elseif(!empty($_GET['cat_id'])){
        $id=htmlspecialchars($_GET['cat_id']);
        $query='cat_id='.$id;
        $qa['cat_id']=$id;
        $sql=search('','',$qa);
        $row=$sql->rowCount();
        if($row>0){
            $pg_qty=(int)ceil($row/$limit);
            $res=paginate($page,$qa,$limit);
        }
        else{$data['empty_cat_err'] = "There is no product of this category yet!"; }
    }
    elseif(!empty($_GET['scat_id'])){
        $id=htmlspecialchars($_GET['scat_id']);
        $query='scat_id='.$id;
        $qa['scat_id']=$id;
        $sql=search('','',$qa);
        $row=$sql->rowCount();
        if($row>0){
            $pg_qty=(int)ceil($row/$limit);
            $res=paginate($page,$qa,$limit);
        }
        else{ $data['empty_scat_err'] = "There is no product of this subsubcategory yet!"; }
    }
    elseif (!empty($_GET['search_query'])) {
        $q=htmlspecialchars($_GET['search_query']);
     	$cat=htmlspecialchars($_GET['search_param']);
        $query='search_param='.$cat.'&search_query='.$q;
        $qa['cat_name']=$cat;
        $qa['query']=$q;
    	$sql=search('','',$qa);
        $row=$sql->rowCount();
        if($row>0){
            $pg_qty=(int)ceil($row/$limit);
            $res=paginate($page,$qa,$limit);
        } 
        else { $data['empty_p_err'] = "No such item found."; }
    		
    } 
    else { $data['empty_q_err'] = "Nothing to search !"; };

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
        header('location: search_product.php?'.$query.'&page='.$page);
    } 

    include "directory_from_product.php";
    include "../views/header.view.php";
    include "../views/product/index.view.php"; 
    include "../views/footer.view.php";
?>