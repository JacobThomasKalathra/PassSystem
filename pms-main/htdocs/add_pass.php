
  <?php
include("config.php");
include ("addpass.php");
include ("session.php");
//include ("encryption.php");
include ("encdec.php");
 if(!isset($_SESSION['admin_user'] )){
	header("location:login.php");
   }
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else {
	
	$pass1=$_GET["pass"];
	$pass2=$_GET["pass2"];
	$id=$_GET["id"];
	$cat=$_GET["cat"];
	$subcat=$_GET["subcat"];
	$desc=$_GET["desc"];
	$comp=$_GET["comp"];
	
	
	
if ($_GET["pass"]==$_GET["pass2"]){

if ($_GET["id"]==null ||$_GET["pass"]==null ||  $_GET["cat"]==null || $_GET["subcat"]==null || $_GET["desc"]==null || $_GET["comp"]==null){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}
else{
	//$encrypted=	Encrypt($pass, $pass1);
	$Encry= mc_encrypt($pass1, ENCRYPTION_KEY);

	$isadmin="select email from user_list where grp=:cat and subgroup=:subcat and admin ='Y' and email=:sess";
$query = "INSERT INTO password_list (userid,password,grp,subgrp,component,description) VALUES
(:id,:encry,:cat,:subcat,:comp,:descr)";

	
}

$s = oci_parse($conn, $isadmin);
oci_bind_by_name($s, ":cat", $cat);
oci_bind_by_name($s, ":subcat", $subcat);
oci_bind_by_name($s, ":sess", $login_session);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
      
      $v = OCIParse($conn,$query);
	  oci_bind_by_name($v, ":id", $id);
	  oci_bind_by_name($v, ":encry", $Encry);
	  oci_bind_by_name($v, ":cat", $cat);
	  oci_bind_by_name($v, ":subcat", $subcat);
	  oci_bind_by_name($v, ":descr", $desc);
	  oci_bind_by_name($v, ":comp", $comp);
	  
	  
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."Password already exists with same description."."</p>".
	"</div>");

	
	echo "<div align='center' style='color:Green'>".
	"<p>"."Password added successfully"."</p>".
	"</div>";  
    
}
else {die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");}

}
else{
	echo "<div align='center' style='color:Red'>".
	"<p>"."Passwords not matched."."</p>".
	"</div>";
	return;
}
}


 oci_close($conn);


?>