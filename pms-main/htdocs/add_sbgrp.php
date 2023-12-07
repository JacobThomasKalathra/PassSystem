
  <?php
include("config.php");
include("addsbgrp.php");
include ("session.php");
 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else {

if ($_GET["cat"]==null ||  $_GET["subgrp"]==null ){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}else
	$grp=trim($_GET["cat"]);
	$subgrp=trim($_GET["subgrp"]);
$query = "INSERT INTO base (grp, subgrp) VALUES
(:1,:2)";


$v = OCIParse($conn,$query);
oci_bind_by_name($v, ":1", $grp);
oci_bind_by_name($v, ":2", $subgrp);
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."SubGroup exist already."."</p>".
	"</div>");



	echo "<div align='center' style='color:Green'>".
	"<p>"."SubGroup is added successfully"."</p>".
	"</div>";
	
	
	unset($_GET);
	echo '<script>  self.location="addsbgrp.php?cat='.$cat.'"; </script>'; 
} 


oci_close($conn);

?>