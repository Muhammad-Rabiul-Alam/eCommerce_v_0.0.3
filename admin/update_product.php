<?php 
  include "../db/config.php";  
  include "../db/connect.php";
  include "check_login.php"; 
  include '../db/db_helper.php';
?>

<?php 
// Parse the form data and add inventory item to the system
  if (isset($_POST['product_name'])) {
    
    $pid = $_POST['thisID'];
    $product_name = $_POST['product_name'];
    $unit_price = $_POST['unit_price'];
    $product_type = $_POST['product_type'];

    $sql=myQuery("SELECT product_type_id FROM product_type WHERE product_type_name=:product_type_name LIMIT 1",
                  array(':product_type_name'=>$product_type),$conn);
    $product_type_id=$sql->fetch();

    $product_description = $_POST['product_description'];
    // See if that product name is an identical match to another product in the system
    myQuery("UPDATE products 
             SET product_name=:product_name, unit_price=:unit_price, product_description=:product_description,product_type_id=:product_type_id
             WHERE product_id=:product_id",
             array(':product_name'=>$product_name,':unit_price'=>$unit_price,':product_description'=>$product_description,
                   ':product_type_id'=>$product_type_id['product_type_id'],':product_id'=>$pid),
             $conn
           );
    if ($_FILES['fileField']['tmp_name'] != "") {
        // Place image in the folder 
        $newname = $pid.".jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../assets/img/".$newname);
    }
    header("location: update_product.php?product_id=$pid"); 
    exit();
  }
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
  $pid_for_img="";
  $pname_for_img="";
  if (isset($_GET['product_id'])) {
    $targetID = $_GET['product_id'];
    $sql = myQuery("SELECT * FROM products WHERE product_id=:product_id LIMIT 1",array(':product_id'=>$targetID),$conn);
    if ($sql->rowCount() > 0) {
      $res=$sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($res as $row){ 
        $pid_for_img=$_GET['product_id'];
        $pname_for_img=$row['product_name'];
        $product_name = $row['product_name'];
        $unit_price = $row['unit_price'];
        $category = find_category_name($row['product_type_id']);
        $subcategory = find_subcategory_name($row['product_type_id']);
        $product_type=find_product_type_name($row['product_type_id']);
        $product_description = $row['product_description'];
        $date_added = strftime("%b %d, %Y", strtotime($row['date_added']));
      }
    } 
    else $data = "Sorry! No such product exists.";
  }


  include "directory_from_admin.php";
  include "../views/header.view.php";
  include "../views/admin/admin_header.view.php";
  include '../views/admin/update_product.view.php';
  include "../views/admin/admin_footer.view.php";
?>





<?php 
//   include "../db/config.php";  
//   include "../db/connect.php";
//   include "check_login.php"; 
//   include '../db/db_helper.php';
// ?>

// <?php 

//     $pid=$pname_for_img=$pid_for_img="";

// // Parse the form data and add inventory item to the system

//   // if(!empty($_POST['btn_submit']) && $_POST['btn_submit']=="slct_cat"){
//   //   $pid = $_POST['thisID'];
//   //   $product_name = $_POST['product_name'];
//   //   $unit_price = $_POST['unit_price'];
//   //   $product_type = $_POST['product_type'];
//   //   $subcategory = $_POST['subcategory'];
//   //   $category = $_POST['category'];
//   //   header("location: update_product.php?product_id=$pid"); 
//   //   exit();
//   // }
//   // elseif(!empty($_POST['btn_submit']) && $_POST['btn_submit']=="slct_scat"){
//   //   $pid = $_POST['thisID'];
//   //   $product_name = $_POST['product_name'];
//   //   $unit_price = $_POST['unit_price'];
//   //   $product_type = $_POST['product_type'];
//   //   $subcategory = $_POST['subcategory'];
//   //   $category = $_POST['category'];
//   //   header("location: update_product.php?product_id=$pid"); 
//   //   exit();
//   // }
//   // else
//     if (!empty($_POST['btn_submit']) && $_POST['btn_submit']=="product_submit") {
    
//     $pid = $_POST['thisID'];
//     $product_name = $_POST['product_name'];
//     $unit_price = $_POST['unit_price'];
//     $product_type = $_POST['product_type'];

//     $sql=myQuery("SELECT product_type_id FROM product_type WHERE product_type_name=:product_type_name LIMIT 1",
//                   array(':product_type_name'=>$product_type),$conn);
//     $product_type_id=$sql->fetch();

//     $product_description = $_POST['product_description'];
//     // See if that product name is an identical match to another product in the system
//     myQuery("UPDATE products 
//              SET product_name=:product_name, unit_price=:unit_price, product_description=:product_description,product_type_id=:product_type_id
//              WHERE product_id=:product_id",
//              array(':product_name'=>$product_name,':unit_price'=>$unit_price,':product_description'=>$product_description,
//                    ':product_type_id'=>$product_type_id['product_type_id'],':product_id'=>$pid),
//              $conn
//            );
//     if ($_FILES['fileField']['tmp_name'] != "") {
//         // Place image in the folder 
//         $newname = $pid.".jpg";
//         move_uploaded_file($_FILES['fileField']['tmp_name'], "../assets/img/".$newname);
//     }
//     header("location: update_product.php?product_id=$pid"); 
//     exit();
//   }
//   elseif (empty($_POST['btn_submit']) && !empty($_GET['product_id'])) {
//     $targetID = $_GET['product_id'];
//     $sql = myQuery("SELECT * FROM products WHERE product_id=:product_id LIMIT 1",array(':product_id'=>$targetID),$conn);
//     if ($sql->rowCount() > 0) {
//       $res=$sql->fetchAll(PDO::FETCH_ASSOC);
//       foreach($res as $row){ 
//         $pid_for_img=$_GET['product_id'];
//         $product_name = $pname_for_img=$row['product_name'];
//         $unit_price = $row['unit_price'];

//         $csql = find_category_name($row['product_type_id']);
//         $category = $csql['category_name'] ; 

//         $scsql = find_subcategory_name($row['product_type_id']);
//         $subcategory = $scsql['subcategory_name'];

//         $ptsql=find_product_type_name($row['product_type_id']);
//         $product_type=$ptsql['product_type_name'];

//         $product_description = $row['product_description'];
//         $date_added = strftime("%b %d, %Y", strtotime($row['date_added']));
//       }
//     } 
//     else {
//         echo "Sorry! No such product exists.";
//         exit();
//     }
//   }


//   include "directory_from_admin.php";
//   include "../views/header.view.php";
//   include "../views/admin/admin_header.view.php";
//   include '../views/admin/update_product.view.php';
//   include "../views/admin/admin_footer.view.php";
// ?>
