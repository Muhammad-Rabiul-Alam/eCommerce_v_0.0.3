<?php 
  include "../db/config.php";  
  include "../db/connect.php";
  include "check_login.php"; 
  include '../db/db_helper.php';
  $data['status']=NULL;
?>

<!-- Create New Product -->
<?php 
  $product_description = $product_name = $unit_price =  "";
  $product_type =  "--- select product type";
  $category= "--- select category";
  $subcategory= "--- select subcategory";

  if (isset($_POST['btn_submit']) && $_POST['btn_submit']=="product_submit") {
    $product_name = $_POST['product_name'];
    $unit_price = $_POST['unit_price'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $product_type = $_POST['product_type'];
    $product_description = $_POST['product_description']; 

    if(empty($product_name)||empty($unit_price)||empty($category)||empty($subcategory)
      ||empty($product_type)||empty($product_description)){
      $data['empty_status']="Please Fill up all the fields.";
    }
    else{
      $sql=myQuery("SELECT product_id FROM products WHERE product_name=:product_name LIMIT 1",
                    array(':product_name'=>$product_name),$conn);
      if ($sql->rowCount()>0) {
        $data['duplicate_status']= 'Sorry! You tried to place a duplicate "Product Name" into the system. Try a new name';
      }else{
        $sql=myQuery("SELECT product_type_id FROM product_type WHERE product_type_name=:product_type_name LIMIT 1",
                                array(':product_type_name'=>$product_type),$conn);
        $res=$sql->fetch();
        $product_type_id=$res['product_type_id'];
               myQuery("INSERT INTO products (product_name,product_description,unit_price,product_type_id, date_added) 
                        VALUES(:product_name,:product_description,:unit_price,:product_type_id,now())",
                        array(':product_name'=>$product_name,':product_description'=>$product_description,':unit_price'=>$unit_price,':product_type_id'=>$product_type_id),$conn) or die (error());
        $product_id = $conn->lastInsertId();
        $newname = $product_id.".jpg";
        move_uploaded_file( $_FILES['fileField']['tmp_name'], "../assets/img/".$newname);
        $data['created_status']="Product Created Successfully!";
        header("location: update_product.php?product_id=$product_id"); 
      }
    }
  }
  elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="slct_cat"){
    if(isset($_POST['product_name'])) $product_name = $_POST['product_name'];
    if(isset($_POST['unit_price'])) $unit_price = $_POST['unit_price'];
    if(isset($_POST['product_description'])) $product_description = $_POST['product_description'];
    if(isset($_POST['product_type'])) $product_type = $_POST['product_type'];
    $subcategory= "--- select subcategory";
    $category=$_POST['category'];
  }
  elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="slct_scat"){
    if(isset($_POST['product_name'])) $product_name = $_POST['product_name'];
    if(isset($_POST['unit_price'])) $unit_price = $_POST['unit_price'];
    if(isset($_POST['product_description'])) $product_description = $_POST['product_description'];
    if(isset($_POST['product_type'])) $product_type = $_POST['product_type'];
    if(isset($_POST['category'])) $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
  }

  include "directory_from_admin.php";
  include "../views/header.view.php";
  include "../views/admin/admin_header.view.php";
  include "../views/admin/create_product.view.php";
  include "../views/admin/admin_footer.view.php";


?>
