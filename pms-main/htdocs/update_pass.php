
  <?php
include("config.php");
include ("updatepass.php");
include ("session.php");
//include ("encdec.php");
    
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else {
	

	
	$subcat=$_GET["subcat"];
	$subcat=filter_var($subcat, FILTER_SANITIZE_STRING);
	$desc=$cat5;
	$desc=filter_var($desc, FILTER_SANITIZE_STRING);
	$ps=$cat4;
	$ps=filter_var($ps, FILTER_SANITIZE_STRING);
	$olddesc=$_GET["cat6"];
	$olddesc=filter_var($olddesc, FILTER_SANITIZE_STRING);
	$comp=$_GET["comp"];
	
	


if ($_GET["cat6"]==null ||$_GET["pswd"]==null ||  $_GET["cat"]==null || $_GET["subcat"]==null || $_GET["desc"]==null || $_GET["comp"]==null ){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}
else{
$secured= mc_encrypt($ps,ENCRYPTION_KEY);


	$isadmin="select email from user_list where grp=:cat and subgroup=:subcat and admin ='Y' and email=:sess";
$query = "update password_list set password=:1, description=:2 , component=:7 where grp=:3 and subgrp=:4 and userid=:5 and description=:6 ";
}
	
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
	  oci_bind_by_name($v, ":5", $cat3);
	  oci_bind_by_name($v, ":2", $desc);
	  oci_bind_by_name($v, ":1", $secured);
	  oci_bind_by_name($v, ":3", $cat);
	  oci_bind_by_name($v, ":4", $subcat);
	  oci_bind_by_name($v, ":6", $olddesc);
	  oci_bind_by_name($v, ":7", $comp);
	  
	  
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."UserID with same description already exists."."</p>".
	"</div>");



	echo "<div align='center' style='color:Green'>".
	"<p>"."Updation successfull"."</p>".
	"</div>"; 
echo '<script>  self.location="updatepass.php?cat='.$cat.'&subcat='.$subcat.'&cat3='.$cat3.'&cat6='.$desc.'"; </script>'; 

  
	
}
else {die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");}






 oci_close($conn);


?>