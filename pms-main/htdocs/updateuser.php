
  <?php
include("config.php");
include("update_user.php");
include ("session.php");
	

 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}



else{
	
	if($_GET[admin]=='Y'){
$role='admin';}
else{if($_GET[admin]=='N')
	$role='non admin';}
	
	if($Current_role==$_GET[admin]){
		echo "<div align='center' style='color:red'>".
	"<p>"."No change in current  role of $_GET[cat3] as user already $role"."</p>".
	"</div>";
	return;
		
	}
	else {
	
	
if ($_GET["cat3"]==null ||$_GET["cat"]==null ||  $_GET["subcat"]==null ){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed"."</p>".
	"</div>";
	return;
}else{
	if ($_GET[cat3]==$login_session){
		echo "<div align='center' style='color:red'>".
	"<p>"."You can't update your role by your own!"."</p>".
	"</div>";
	return;
	}
		else {
			$admin=$_GET["admin"];
			$email=$_GET["cat3"];
			$grp=$_GET["cat"];
			$subgrp=$_GET["subcat"];
			
	
	//////////////////////////////////
		if(isset($sadmin_check)){
$isadmin="select email from user_list where sadmin ='Y' and email=:sess";		
$query = "UPDATE user_list SET admin=:a WHERE email=:e and grp=:g and subgroup=:sg";
}
else
{
	$isadmin="select email from user_list where grp=:ca and subgroup=:sub and admin ='Y' and email=:sess";
$query = "UPDATE user_list SET admin=:a WHERE email=:e and grp=:g and subgroup=:sg";
}
	
	
	////////////////////////////////

$s = oci_parse($conn, $isadmin);
oci_bind_by_name($s, ":sess", $login_session);
oci_bind_by_name($s, ":ca", $cat);
oci_bind_by_name($s, ":sub", $subcat);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
	
$w = OCIParse($conn,$query);
oci_bind_by_name($w, ":a", $admin);
oci_bind_by_name($w, ":e", $email);
oci_bind_by_name($w, ":g", $cat);
oci_bind_by_name($w, ":sg", $subcat);
OCIExecute($w) or die ("<div align='center' style='color:Red'>".
	"<p>"."Something went wrong."."</p>".
	"</div>");



	$subject = "Role has been updated in AE-Password Management System";
	$message = "Your role has been updated by $login_session in echo AE-Password Management System. \n \n Group: $cat\n Subgroup: $subcat\n New Role: $role\n";
	
	$headers = 'From: noreply@aepms.oracle.com' . "\r\n" .
    'Reply-To: noreply@aepms.oracle.com' . "\r\n" .
	'cc: '.$login_session.'' . "\r\n" .
	"Content-Type: text/html; charset=ISO-8859-1\r\n".
    'X-Mailer: PHP/' . phpversion();
	$email=$_GET[cat3];
	//mail($email, $subject, $message, $headers);
	//echo "<div align='center' style='color:Green'>".
	//"<p>"." $_GET[cat3] is now $role for the subgroup $_GET[subcat] . "."</p>".
	//"</div>";
	
	echo '<script> window.alert("'.$_GET[cat3].' is now '.$role.' for  '.$_GET[cat].' - '.$_GET[subcat].'"); </script>';	
	echo '<script>  self.location="update_user.php?cat='.$cat.'&subcat='.$subcat.'&cat3='.$cat3.'"; </script>'; 
	
	
	
}


else 
	
die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");


	
}
}
}
}
 oci_close($conn);


?>