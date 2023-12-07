
  <?php
include("config.php");
include("remgrp.php");
include ("session.php");
 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else {
if ($_GET["cat"]==null){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}else
	$grp=trim($_GET["cat"]);
$query = "delete from base where grp=:1";
$query1 = "delete from user_list where grp=:1";
$query2 = "delete from password_list where grp=:1";

$v = OCIParse($conn,$query);
$v1 = OCIParse($conn,$query1);
$v2 = OCIParse($conn,$query2);
oci_bind_by_name($v, ":1", $grp);
oci_bind_by_name($v1, ":1", $grp);
oci_bind_by_name($v2, ":1", $grp);
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."Group does'nt exist."."</p>".
	"</div>");

OCIExecute($v1);
OCIExecute($v2);


	echo "<div align='center' style='color:Green'>".
	"<p>"."Group $_GET[cat] is removed successfully"."</p>".
	"</div>";
	
	unset($_GET);
	echo '<script>  self.location="remgrp.php"; </script>'; 
} 

 oci_close($conn);



?>