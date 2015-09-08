<?php 
  include "../db/config.php";  
  include "../db/connect.php";
  include "check_login.php"; 
  include '../db/db_helper.php';
  $data=$value_pt=$value_scat=NULL;
?>

<!-- Create New Category -->
<?php 
    $catpt_value="--- select category";
    if(isset($_POST['btn_submit']) && $_POST['btn_submit']=="crt_cat"){
      if( !empty($_POST['category'])){
        $sql=myQuery("SELECT category_id FROM category WHERE category_name=:category_name LIMIT 1",
                      array(':category_name'=>$_POST['category']),$conn);
        if ($sql->rowCount()>0) {
          $data['cat']['one']= 'Sorry! You tried to place a duplicate "Category Name" into the system. Try a new name';
        }else{
          myQuery('INSERT INTO category(category_name) VALUES(:category_name)',
                  array(':category_name'=>$_POST['category']),$conn);
        }
      }
      else $data['cat']['two']="Please put a category name.";
    }

    elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="crt_scat"){
      $value_scat=$_POST['subcategory'];
      if(!empty($_POST['category_subcat']) && $_POST['category_subcat']!="--- select category" && !empty($value_scat) ){

        $csql=myQuery("SELECT category_id FROM category WHERE category_name=:category_name",
                       array(':category_name'=>$_POST['category_subcat']),$conn);
        $category_id=$csql->fetch();

        $sql=myQuery("SELECT category_id FROM subcategory WHERE category_id=:category_id AND subcategory_name=:subcategory_name LIMIT 1",
                      array(':category_id'=>$category_id['category_id'],':subcategory_name'=>$_POST['subcategory']),$conn);
        if ($sql->rowCount()>0) {
          $data['scat']['one']= 'Sorry! You tried to place a duplicate "Subcategory Name" into the system. Try a new name';
        }else{
          $sql=myQuery("SELECT category_id FROM category WHERE category_name=:category_name LIMIT 1",
                                array(':category_name'=>$_POST['category_subcat']),$conn);
          $category_id=$sql->fetch();
          myQuery('INSERT INTO subcategory(category_id,subcategory_name) 
                   VALUES(:category_id,:subcategory_name)',
                  array(':category_id'=>$category_id['category_id'],':subcategory_name'=>$_POST['subcategory']),$conn);
        }
      }
      if($_POST['category_subcat']=="--- select category") $data['scat']['two']="Please select a category.";
      if (empty($value_scat)) { $data['scat']['three']="Please put a subcategory name."; }
    }

    elseif (isset($_POST['btn_submit']) && $_POST['btn_submit']=="slct_cat") {
      $value_pt=$_POST['product_type'];
      if(empty($_POST['category_pt'])||$_POST['category_pt']=="--- select category")
        $data['pt']['four']="Please select a category.";
      else $catpt_value=$_POST['category_pt'];
    }

    elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="crt_pt"){
      $value_pt=$_POST['product_type'];
      if(empty($_POST['subcategory_pt'])||empty($_POST['category_pt'])
        ||$_POST['subcategory_pt']=="--- select subcategory"||$_POST['category_pt']=="--- select category"){
            $data['pt']['one']="Please select a category and a subcategory.";
      }
      else{
        $scsql=myQuery("SELECT subcategory_id 
                        FROM subcategory 
                        WHERE category_id=(SELECT category_id FROM category WHERE category_name=:category_name LIMIT 1)
                        AND subcategory_name=:subcategory_name LIMIT 1",
                       array(':category_name'=>$_POST['category_pt'],':subcategory_name'=>$_POST['subcategory_pt']),$conn);
        $scategory_id=$scsql->fetch();
        $sql=myQuery("SELECT product_type_id FROM product_type WHERE product_type_name=:product_type_name AND subcategory_id=:subcategory_id LIMIT 1",
                      array(':product_type_name'=>$_POST['product_type'],':subcategory_id'=>$scategory_id['subcategory_id']),$conn);
        if ($sql->rowCount()==1) {
          $data['pt']['two'] = 'Sorry! You tried to place a duplicate "Product Type Name" into the system. Try a new name';
        }else{
          myQuery('INSERT INTO product_type(subcategory_id,product_type_name) 
                   VALUES(:subcategory_id,:product_type_name)',
                  array(':subcategory_id'=>$scategory_id['subcategory_id'],':product_type_name'=>$_POST['product_type']),$conn);
        }
      }
      if (empty($value_pt)) { $data['pt']['three']="Please put a subcategory name."; }
    }
  
  include "directory_from_admin.php";
  include "../views/header.view.php";
  include "../views/admin/admin_header.view.php";
  include "../views/admin/create_category.view.php";
  include "../views/admin/admin_footer.view.php";


    
 ?>
