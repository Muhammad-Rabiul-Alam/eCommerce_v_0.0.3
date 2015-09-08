 <?php
session_start();
if (!isset($_SESSION["admin_name"])) {
    header("location: login.php"); 
    exit();
}
$admin_id = preg_replace('#[^0-9]#i', '', $_SESSION["admin_id"]); // filter everything but numbers and letters
$admin_name = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["admin_name"]); // filter everything but numbers and letters
$admin_password = $_SESSION["admin_password"];
$arr=array("admin_id"=>$admin_id ,"admin_name"=>$admin_name,"admin_password"=>$admin_password);
// Run mySQL query to be sure that this person is an admin and that their admin_password session var equals the database information
 // Connect to the MySQL database 
    $sql = $conn->prepare("SELECT * FROM admin WHERE admin_id=:admin_id AND admin_name=:admin_name AND admin_password=:admin_password LIMIT 1"); // query the person
    $sql->execute($arr);
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
if ($sql->rowCount() == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
