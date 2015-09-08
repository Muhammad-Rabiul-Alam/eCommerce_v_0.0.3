<?php 
    session_start();
    if (isset($_SESSION["admin_name"])) {
        header("location: index.php"); 
        exit();
    }
    include "../db/config.php";  
    include "../db/connect.php";
    include "../db/db_helper.php";
?>
<?php 
$status=NULL;
$value=NULL;
// Parse the log in form if the user has filled it out and pressed "Log In"
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $admin_name=$_POST["admin_name"];
    $admin_password=$_POST["password"];
    if(empty($admin_name)or empty($admin_password)){
        $status="Please give valid admin name and password.";
    }
    else{
        $value=$admin_name;
        $admin_name = preg_replace('#[^A-Za-z0-9]#i', '', $admin_name); // filter everything but numbers and letters
        // Connect to the MySQL database 
        
        $sql = myQuery("SELECT admin_id FROM admin WHERE admin_name=:admin_name AND admin_password=:admin_password LIMIT 1",
                        array(":admin_name"=>$admin_name,":admin_password"=>$admin_password),$conn
                        ); // query the person
        // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
        if($sql->rowCount()==0){
            $status="Wrong admin name or password.";
        }
        elseif ($sql->rowCount() == 1) { // evaluate the count\
          $res=$sql->fetchAll(PDO::FETCH_ASSOC);
           foreach($res as $row){ 
              $admin_id = $row["admin_id"];
           }
         $_SESSION["admin_id"] = $admin_id;
         $_SESSION["admin_name"] = $admin_name;
         $_SESSION["admin_password"] = $admin_password;
         header("location: index.php");
         exit();
        } 
    }
}
?>

<?php 
    
    $formheader="Please Signin:";
    $label="Admin Name:";
    $name="admin_name";

    include "directory_from_admin.php";
    include "../views/header.view.php";
    include "../views/signin_form.view.php";
    include "../views/footer.view.php";
?>