<?php 
	session_start();
	if (isset($_SESSION["customer_email"])) {
	    header("location: index.php"); 
	    exit();
	}

	include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
	        
	$status[]=NULL;
	$value="";
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$email=$_POST['email'];
		$customer_password=$_POST['password'];
		$value=$email;
		$confirm_customer_password=$_POST['confirm_password'];
		if(empty($email)or empty($customer_password)or empty($confirm_customer_password)){
        	$status['empty_err']="Please fill up all the fields.";
    	}
    	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    		$status['email_err']="Invalid email format.";
   		}
    	elseif($confirm_customer_password!==$customer_password){
    		$status['customer_password_err']="Password didn't match!";
    	}
        else{
	    	
	        $sql=myQuery("SELECT customer_id FROM customer WHERE email=:email",array(':email'=>$email),$conn);
	        if($sql->rowCount()==1){
	        	$status['duplicate_err']="Sorry! There's an account with this email ! ";
	        }else{
		        $sql=myQuery("INSERT INTO customer(email,customer_password) VALUES(:email,:customer_password)",
		        			 array(':email'=>$email,':customer_password'=>$customer_password),$conn);
		        if($sql->rowCount()==1){
		        	$status['success']="Congratulations! You have successfully signed up!";
		        	$value="";
		        	$_SESSION['customer_email']=$email;
		        	$_SESSION['customer_id']=$conn->lastInsertId();
		        	$_SESSION['customer_password']=$customer_password;
		            header("location: profile.php");
		        }
		    }
	    }
	}

	include "directory_from_customer.php";
    include "../views/header.view.php";
    include "../views/customer/customer_signup.view.php"; 
    include "../views/footer.view.php";