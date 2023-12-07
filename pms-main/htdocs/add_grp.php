
  <?php
include("config.php");
include("addgrp.php");
include ("session.php");
 
  
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

else {
if ($_GET["grp"]==null || $_GET["subgrp"]==null){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	return;
}else
	$grp=trim($_GET["grp"]);
	$subgrp=trim($_GET["subgrp"]);
$query = "INSERT INTO base (grp,subgrp) VALUES
(:1,:2 )";

$v = OCIParse($conn,$query);
oci_bind_by_name($v, ":1", $grp);
oci_bind_by_name($v, ":2", $subgrp);
OCIExecute($v) or die ("<div align='center' style='color:Red'>".
	"<p>"."Group with same Subgroup already exists."."</p>".
	"</div>");



	echo "<div align='center' style='color:Green'>".
	"<p>"."Group $_GET[grp] is added successfully"."</p>".
	"</div>";
	
	unset($_GET);
	echo '<script>  self.location="addgrp.php"; </script>'; 
	
} 


 oci_close($conn);


?>