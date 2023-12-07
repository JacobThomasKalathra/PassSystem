
  <?php
include("config.php");
session_start();
if (isset($_POST['admin'])) {
$user=$_POST['admin'];}
else{$user=($_SERVER['OAM_REMOTE_USER']);}
$pass=$_POST['password'];


///////////////////////Logging the current user//////////////////////////
$dir_to_save = "C:\Logs";
  $log  = "User: ".$user.' - '.date("F j, Y, g:i a").PHP_EOL.
            "-------------------------".PHP_EOL;
  
  if (!$conn) {
    echo("Database is down.");
	exit;
}
else {

$sqlb =("SELECT distinct email FROM user_list where email =:em and password =:ps and sadmin='Y' ");
$s = oci_parse($conn, $sqlb);
oci_bind_by_name($s, ":em", $user);
oci_bind_by_name($s, ":ps", $pass);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
      
         $_SESSION['sadmin_user'] = $user;
		 $_SESSION['admin_user'] = null;
		 $_SESSION['login_user'] = null;
		  //$_SESSION['admin_user'] = $user;
		 file_put_contents($dir_to_save.'./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
	     header("location: admin_page.php");
    
}
else {$message= "You are not Super Admin.</br> This action is captured.";
 header("location: SuperAdmin.php");}
 
} 
oci_close($conn);
?>