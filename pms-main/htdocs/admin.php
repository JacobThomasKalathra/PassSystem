<?php
include("config.php");
include ("session.php");

 if(isset($_SESSION['sadmin_user'])){
$sql_admin=("SELECT guid FROM user_list where guid ='$login_session' and sadmin ='Y'");

$v = OCIParse($conn,$sql_admin);
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
                            $result_admin = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							




 

   
    if ($result_admin > 0) {
         
         header("location:admin_page.php");
	     
    
}
 } else {
	  if(isset($_SESSION['admin_user'])){
$sql_admin=("SELECT guid FROM user_list where guid ='$login_session' and admin ='Y'");

$v = OCIParse($conn,$sql_admin);
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
                            $result_admin = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							




 

   
    if ($result_admin > 0) {
         
         header("location:admin_home.php");
	     
    
}
	  } 
	  else
	 
die("You are not an admin!! ");
}  
 
?>