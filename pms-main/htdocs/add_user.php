
  <?php
include("config.php");
include("adduser.php");
include ("session.php");
 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}
else {
	$em=trim($_GET["email"]);
	$email=strtolower($em);
	$subcat=trim($_GET["subcat"]);
	$cat=trim($_GET["cat"]);
	$admin='N';
	

if ($_GET["cat"]==null ||  $_GET["subcat"]==null || $_GET["email"]==null)
{
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
 return;
}else{
	if(isset($sadmin_check)){
$isadmin="select email from user_list where sadmin ='Y' and email=:sess";		
$query = "INSERT INTO user_list (email, grp, subgroup, admin) VALUES
(:em,:cat ,:subcat, :ad)";
}
else
{
	$isadmin="select email from user_list where grp=:c and subgroup=:sc and admin ='Y' and email=:sess";
$query = "INSERT INTO user_list (email, grp, subgroup, admin) VALUES
(:em,:cat ,:subcat, :ad) ";
}
	
}



$s = oci_parse($conn, $isadmin);
oci_bind_by_name($s, ":sess", $login_session);
oci_bind_by_name($s, ":c", $cat);
oci_bind_by_name($s, ":sc", $subcat);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
      
      $v = OCIParse($conn,$query);
oci_bind_by_name($v, ":em", $email);
oci_bind_by_name($v, ":cat", $cat);
oci_bind_by_name($v, ":subcat", $subcat);  
oci_bind_by_name($v, ":ad", $admin);  
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."$email is already granted access to $cat-$subcat"."</br>"."To update role please go to UPDATE ROLE section in User Management."."</p>".
	"</div>");

	$subject = 'Granted access to AE-Password Management System';
	$message = "You have been granted access to AE-Password Management System.\n \n Group: $cat\n Subgroup: $subcat\n Role: $adrole\n Granted by: $login_session";
	$headers = 'From: noreply@aepms.oracle.com' . "\r\n" .
    'Reply-To: noreply@aepms.oracle.com' . "\r\n" .
	'cc: '.$login_session.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
   // mail($email, $subject, $message, $headers);
	echo "<div align='center' style='color:Green'>".
	"<p>"." $email is granted access to $cat-$subcat."."<br>"."To update role please go to UPDATE ROLE section in User Management"."</p>".
	"</div>";   
    
}

else
	die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");




	


	
	
	

} 


 oci_close($conn);


?>