<?php 
	session_start();
	if(isset($_SESSION["customer_email"])){
		header("location: index.php"); 
    exit();
	}
 ?>
<?php 
    include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
 ?>
<?php 
$status=NULL;
$value=NULL;
// Parse the log in form if the user has filled it out and pressed "Log In"
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $email=$_POST["email"];
    $customer_password=$_POST["password"];
    if(empty($email)or empty($customer_password)){
        $status="Please give valid email and password.";
    }
    else{
        $value=$email;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $status="Invalid Email.";
        }else{ 
          // Connect to the MySQL database 
          
          $sql = myQuery("SELECT customer_id FROM customer WHERE email=:email AND customer_password=:customer_password LIMIT 1",
                          array(':email'=>$email,':customer_password'=>$customer_password),$conn
                          ); // query the person
          // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
          if($sql->rowCount()==0){
              $status="Wrong email or password.";
          }elseif ($sql->rowCount() == 1) { // evaluate the count\
             $res=$sql->fetch();
             $_SESSION["customer_id"] = $res["customer_id"];
             $_SESSION["customer_email"] = $email;
             $_SESSION["customer_password"] = $customer_password;
             header("location: index.php");
             exit();
          }
        } 
    }
}
?>

<?php 
    $formheader="Please Signin:";
    $label="Email:";
    $name="email";
    $signup="Sign Up Now";
    $text="Not a member yet ?";
    $link="customer_signup.php";

    include "directory_from_customer.php";
    include "../views/header.view.php";
    include "../views/customer/customer_signin.view.php"; 
    include "../views/footer.view.php";
?>
