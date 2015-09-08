<?php 
	 session_start(); 
	 if(!isset($_SESSION['customer_email'])){ 
	 	header('location:../customer/customer_signin.php');
	 	exit();
	 }
	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
?>

<?php
	function toMoney($val,$symbol='$',$r=2)
	{
	    $n = $val; 
	    $c = is_float($n) ? 1 : number_format($n,$r);
	    $d = '.';
	    $t = ',';
	    $sign = ($n < 0) ? '-' : '';
	    $i = $n=number_format(abs($n),$r); 
	    $j = (($j = strlen($i)) > 3) ? $j % 3 : 0; 

	   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
	}

?>

<?php 

	if(isset($_POST['pid'])){
		$pid=$_POST['pid'];
		$wasFound=false;
		$i=0;
		if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
			$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
		} else {
			foreach ($_SESSION['cart_array'] as $each_item) {
				$i++;
				while(list($key,$cartOutput)=each($each_item)){
					if($key=="item_id"&&$cartOutput==$pid){
					  if($each_item['quantity']<'99')///////////////////////////******** ORDER LIMIT 99 *********///////////////////////
						array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
					}
				}
			}
			if ($wasFound == false) {
			  array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		    }
		}
		header("location: cart.php");
		exit();
	}

?>

<?php 
	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
	    unset($_SESSION["cart_array"]);
	}
?>

<?php 

	if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
	    // execute some code
		$item_to_adjust = $_POST['item_to_adjust'];
		$quantity = $_POST['quantity'];
		$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
		if ($quantity >= 100) { $quantity = 99; }
		if ($quantity < 1) { $quantity = 1; }
		if ($quantity == "") { $quantity = 1; }
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) { 
			      $i++;
			      while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $item_to_adjust) {
						  // That item is in cart already so let's adjust its quantity using array_splice()
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
					  } // close if condition
			      } // close while loop
		} // close foreach loop
	}

?>

<?php 
	if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
	    // Access the array and run code to remove that array index
	 	$key_to_remove = $_POST['index_to_remove'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$key_to_remove"]);
			sort($_SESSION["cart_array"]);
		}
	}
?>

<?php 

	$cartOutput = "";
	$cartTotal = "";
	$cartOutput=array();
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
	    $status['cart_empty_err'] = "Your shopping cart is empty";
	} else {
		// Start the For Each loop
		$i = 0; 
	    foreach ($_SESSION["cart_array"] as $each_item) { 
			$item_id = $each_item['item_id'];
			$sql = myQuery("SELECT * FROM products WHERE product_id=:product_id LIMIT 1",array(':product_id'=>$item_id),$conn);
			$res = $sql->fetchAll(PDO::FETCH_ASSOC);

			foreach ($res as $row) {
				$product_name = $row["product_name"];
				$price = $row["unit_price"];
				$details = $row["product_description"];
			}

			$pricetotal = $price * $each_item['quantity'];
			toMoney($pricetotal);
			$cartTotal = $pricetotal + $cartTotal;
			toMoney($price);	

			$singleItem=array(
					'item_id'=>$item_id,
					'product_name'=>$product_name,
					'details'=>$details,
					'price'=>$price,
					'item_index'=>$i,
					'quantity'=>$each_item['quantity'],
					'pricetotal'=>$pricetotal,
					'cartTotal'=>$cartTotal
				);
			array_push($cartOutput, $singleItem);
			$i++;		
	    } 

	    toMoney($cartTotal);
	}
?>

<?php include "directory_from_customer.php"; ?>
<?php include "../views/header.view.php"; ?>
<?php include "../views/customer/cart.view.php"; ?>
<?php include "../views/footer.view.php"; ?>