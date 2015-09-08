<?php
	session_start();
	if (empty($_SESSION["customer_email"])) {
	    header("location: customer_signin.php"); 
	    exit();
	}
	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";

    
    $value['customer_name']=$value['phone']=$value['address']=
    $value['postal_code']=$value['city']=$value['country']=NULL;

    $disable_profile="";
    $disable_email=$disable_password="disabled";
    $status=NULL;


    if(isset($_POST['btn_submit']) && $_POST['btn_submit']=="edit_email"){
		$disable_email="";
		$disable_profile="disabled";
	}
	elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="edit_password"){
		$disable_password="";
		$disable_profile=$disable_email="disabled";
	}
    elseif(isset($_POST['btn_submit']) && $_POST['btn_submit']=="save"){
    	if(empty($_POST['disable_profile'])){
	    	$customer_name=$_POST['customer_name'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$postal_code=$_POST['postal_code'];
			$city=$_POST['city'];
			$country=$_POST['country'];

			$sql=myQuery("SELECT * FROM customer WHERE customer_id=:customer_id",
    			  array(':customer_id'=>$_SESSION['customer_id']),$conn);
    
			if($sql->rowCount()==0){
				$sql=myQuery("INSERT INTO customer(customer_name,phone,address,postal_code,city,country) 
							  VALUES(:customer_name,:phone,:address,:postal_code,:city,:country)",
							  array(':customer_name'=>$customer_name,':phone'=>$phone,':address'=>$address,
								  ':postal_code'=>$postal_code,':city'=>$city,':country'=>$country),$conn);
			}else{
				$sql=myQuery("UPDATE customer
							  SET customer_name=:customer_name,phone=:phone,address=:address,
								  postal_code=:postal_code,city=:city,country=:country
							  WHERE customer_id=:customer_id",
							  array(':customer_name'=>$customer_name,':phone'=>$phone,':address'=>$address,
								  ':postal_code'=>$postal_code,':city'=>$city,':country'=>$country,':customer_id'=>$_SESSION['customer_id']),$conn);
			}
		}
		elseif(empty($_POST['disable_email'])){
			$email=$_POST['email'];

			if(!empty($email) && $email!==$_SESSION['customer_email']){
	    		$value=$email;
		        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		          $status['email_err']="Invalid Email.";
		        }else{
		        	$sql=myQuery("UPDATE customer SET email=:email WHERE customer_id=:customer_id",
	    						  array(":email"=>$email,'customer_id'=>$_SESSION['customer_id']),$conn);
	    			//if($sql->rowCount()>0){$status['email_update_success']="You have successfully updated your email!";}
		        	$disable_profile="";
    				$disable_email=$disable_password="disabled";
		        	header('location: customer_signout.php');
		        }
	    	}
		}
		elseif(empty($_POST['disable_password'])){
			$current_password=$_POST['current_password'];
			$new_password=$_POST['new_password'];
			$confirm_new_password=$_POST['confirm_new_password'];

			if(!empty($current_password) && !empty($new_password) && !empty($confirm_new_password)){
	    		if($current_password===$_SESSION['customer_password'] && $new_password===$confirm_new_password){
	    			$sql=myQuery("UPDATE customer SET customer_password=:customer_password WHERE customer_id=:customer_id",
	    						  array(":customer_password"=>$new_password,':customer_id'=>$_SESSION['customer_id']),$conn);
	    			//if($sql->rowCount()>0){$status['password_update_success']="You have successfully updated your password!";}
	    			$disable_profile="";
    				$disable_email=$disable_password="disabled";
		        	header('location: customer_signout.php');
	    		}
	    		else{$status['match_err']="Password didn't match! Try again.";}
	    	}
	    	else{$status['password_empty_err']="Fill up all the fields.";}
		}    	
	}
	
	$sql=myQuery("SELECT * FROM customer WHERE customer_id=:customer_id",
    			  array(':customer_id'=>$_SESSION['customer_id']),$conn);
	if($sql){
    	$res=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $row){ 
			$value['customer_name']=$row['customer_name'];
			$value['phone']=$row['phone'];
			$value['address']=$row['address'];
			$value['postal_code']=$row['postal_code'];
			$value['city']=$row['city'];
			$value['country']=$row['country'];
		}
    }

	include "directory_from_customer.php";
    include "../views/header.view.php";
    include "../views/customer/profile.view.php";
    include "../views/footer.view.php";