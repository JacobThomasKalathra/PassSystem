
  <?php
include("config.php");
include("remove_user.php");
include ("session.php");

if(!isset($_SESSION['sadmin_user'])){
	if(!isset($_SESSION['admin_user']))
      header("location:Home.php");
   }



if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else{

			

  
	
	
		$email=$_GET["cat3"];
	$subcat=$_GET["subcat"];
	$cat=$_GET["cat"];
	$admin=$_GET["admin"];
	
	
if ($_GET["cat3"]==null ||$_GET["cat"]==null ||  $_GET["subcat"]==null ){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed"."</p>".
	"</div>";
return;
}else{
	
	
	if ($_GET[cat3]==$login_session){
		echo "<div align='center' style='color:red'>".
	"<p>"."You can't remove yourself!"."</p>".
	"</div>";
	return;
	}
	else {
		
		if(isset($sadmin_check)){
$isadmin="select email from user_list where sadmin ='Y' and email=:e";		
$quer = "delete from user_list where email =:emid1 and grp=:gr1 and subgroup =:sb1";
}
else
{
	$isadmin="select email from user_list where grp=:g and subgroup=:s and admin ='Y' and email=:e";
$quer = "delete from user_list where email =:emid1 and grp=:gr1 and subgroup =:sb1";
}
	
$s = oci_parse($conn, $isadmin);
oci_bind_by_name($s, ":s", $subcat);
oci_bind_by_name($s, ":g", $cat);
oci_bind_by_name($s, ":e", $login_session);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
$t = OCIParse($conn,$quer);
oci_bind_by_name($t, ":sb1", $subcat);
oci_bind_by_name($t, ":gr1", $cat);
oci_bind_by_name($t, ":emid1", $email);
OCIExecute($t) or die ("<div align='center' style='color:Red'>".
	"<p>"."Something went wrong."."</p>".
	"</div>");


	$subject = "Revoked access from AE-Password Management System";
	$message = "Your access from AE-Password Management System is revoked by $login_session\n";
	$headers = 'From: noreply@aepms.oracle.com' . "\r\n" .
    'Reply-To: noreply@aepms.oracle.com' . "\r\n" .
	'cc: '.$login_session.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$email=$_GET[cat3];
	//mail($email, $subject, $message, $headers);
	//echo "<div align='center' style='color:Green'>".
	//"<p>"."$_GET[cat3]'s access from $cat-$subcat is revoked successfully"."</p>".
	//"</div>";
	echo '<script> window.alert("'.$_GET[cat3].' access from '.$cat.'-'.$subcat.' is revoked successfully"); </script>';	
	
	echo '<script>  self.location="remove_user.php"; </script>'; 	
	}
	else 
	
die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");
	
	
	
	
	
	





	

	
}
}
}

 oci_close($conn);



?>