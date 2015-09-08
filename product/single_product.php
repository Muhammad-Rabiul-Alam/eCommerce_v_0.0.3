<?php 
session_start();
include "../db/config.php";  
include "../db/connect.php";
include "../db/db_helper.php";
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['product_id'])) {
	// Connect to the MySQL database  
	
  $id = preg_replace('#[^0-9]#i', '', $_GET['product_id']); 
	$sql = myQuery("SELECT * FROM products WHERE product_id=:product_id LIMIT 1",array(':product_id'=>$id),$conn);
  if ($sql->rowCount() > 0) {
    $res=$sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($res as $row){ 
      $product_name = $row['product_name'];
      $price = $row['unit_price'];
      $sql= find_category_name($row['product_type_id']);
      $category=$sql['category_name'];
      $sql= find_subcategory_name($row['product_type_id']);
      $subcategory=$sql['subcategory_name'];
      $sql=find_product_type_name($row['product_type_id']);
      $product_type=$sql['product_type_name'];
      $details = $row['product_description'];
      $date_added = strftime("%b %d, %Y", strtotime($row['date_added']));
    }
  } 
  else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
};

    include "directory_from_product.php";
    include "../views/header.view.php";
    include "../views/product/single_product.view.php"; 
    include "../views/footer.view.php";
?>