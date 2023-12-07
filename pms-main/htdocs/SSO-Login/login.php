
  <?php
include("config.php");
session_start();
$pas =filter_input(INPUT_POST, 'password');
#$ora_user=filter_input(INPUT_SERVER, 'OAM_REMOTE_USER');
$ora_user='jacob.thomas@oracle.com'; //!!!! important !!!! comment this line while moving the code to Production
if (isset($pas)) {
$user=filter_input(INPUT_POST, 'admin');}
else{$user=($ora_user);}
$pass=filter_input(INPUT_POST, 'password');
$_SESSION['login_time'] = time();


///////////////////////Logging the current user//////////////////////////
$dir_to_save = "C:\Logs";
 //jacob $log  = "User: ".$user.' - '.date("F j, Y, g:i a").PHP_EOL.
  //jacob          "-------------------------".PHP_EOL;
  
  if (!$conn) {
	 header("location: DownDB.html");
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
		//jacob file_put_contents($dir_to_save.'./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
	     header("location: admin_page.php");
		 oci_free_statement($s);
		 oci_close($conn);
          
}

else {

$sqlc =("SELECT distinct email FROM user_list where email =:em and admin='Y'");
$t = OCIParse($conn, $sqlc);
oci_bind_by_name($t, ":em", $user);
OCIExecute($t, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($t, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if ($numrows >0) {
	 
         $_SESSION['admin_user'] = $user;
		 $_SESSION['sadmin_user'] = null;
		 $_SESSION['login_user'] = null;
	//jacob	 file_put_contents($dir_to_save.'./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND); 
	     header("location: admin_home.php");
		 //

		 //
		 oci_close($conn);
		   oci_free_statement($t);
   
} else {
    
$sql =("SELECT distinct email FROM user_list where email =:em and admin='N'");
$u = OCIParse($conn, $sql);
oci_bind_by_name($u, ":em", $user);
OCIExecute($u, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($u, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if ($numrows >0) {
	  
         
    $_SESSION['login_user'] = $user;
	$_SESSION['admin_user'] = null;
	$_SESSION['sadmin_user'] = null;
	//jacob file_put_contents($dir_to_save.'./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
	     header("location: Home.php");
		
		  oci_free_statement($u); 
          oci_close($conn);
} 

else {
	
         
	$errlog  = "User: ".$user.' - '.date("F j, Y, g:i a").PHP_EOL.
	"Attempt failed ".PHP_EOL.
            "-------------------------".PHP_EOL;
	file_put_contents($dir_to_save.'./log_'.date("j.n.Y").'.txt', $errlog, FILE_APPEND);
	$n=oci_num_rows($s);
    die( header("location: error.html"));
	oci_close($conn);
	
}  
 }
} 
} 
oci_close($conn);
?>