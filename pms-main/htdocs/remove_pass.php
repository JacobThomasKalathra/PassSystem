
  <?php
include("config.php");
include("removepass.php");
include ("session.php");

 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}


	$id=$_GET["cat3"];
	$cat=$_GET["cat"];
	$subcat=$_GET["subcat"];
	$desc=$_GET["cat4"];


if ($id==null ||$cat==null ||  $subcat==null || $desc==null ){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}else
	
	{
		if(isset($sadmin_check)){
$isadmin="select email from user_list where sadmin ='Y' and email=:sess";		
$query = "delete from password_list where userid=:id and grp=:cat and subgrp=:subcat and description=:descr";
}
else
{
	$isadmin="select email from user_list where grp=:cat and subgroup=:subcat and admin ='Y' and email=:sess";
$query = "delete from password_list where userid=:id and grp=:cat and subgrp=:subcat and description=:descr";
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
	  oci_bind_by_name($v, ":id", $id);
	  oci_bind_by_name($v, ":cat", $cat);
	  oci_bind_by_name($v, ":subcat", $subcat);
	  oci_bind_by_name($v, ":descr", $desc);
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."Some thing went wrong."."</p>".
	"</div>");

	
	//echo "<div align='center' style='color:Green'>".
	//"<p>"."Password removed successfully"."</p>".
	//"</div>";   
	echo '<script> window.alert("USERID - '.$id.' has been removed from '.$cat.'-'.$subcat.'"); </script>';	
echo '<script>  self.location="removepass.php"; </script>'; 
    
}
else
	die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");
	
	

 oci_close($conn);


?>