<?php
include("config.php");
include("session.php");
include("encdec.php");
//include("Upload.php");


if(isset($_POST["submit"]))
{
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
$d=0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$userid = $filesop[0];
$password = $filesop[1];
$grp = $filesop[2];
$subgrp = $filesop[3];
$description = $filesop[4];
$Encry= mc_encrypt($password, ENCRYPTION_KEY);
$isadmin="select email from user_list where admin ='Y' and email=:sess and grp=:cat and subgroup=:subcat";
$s = oci_parse($conn, $isadmin);
oci_bind_by_name($s, ":cat", $grp);
oci_bind_by_name($s, ":subcat", $subgrp);
oci_bind_by_name($s, ":sess", $login_session);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 if ($numrows1 >0) {
$sql = "INSERT INTO password_list (userid,password,grp,subgrp,description) VALUES (:1,:2,:3,:4,:5)";
$v = OCIParse($conn,$sql);
oci_bind_by_name($v, ":1", $userid);
oci_bind_by_name($v, ":2", $Encry);
oci_bind_by_name($v, ":3", $grp);
oci_bind_by_name($v, ":4", $subgrp);
oci_bind_by_name($v, ":5", $description);
$d = $d + 1;
if (OCIExecute($v)) {
$c = $c + 1;}
else {
echo "$userid,$grp, $subgrp,$description <br/>" ;


}

}
}

echo "You have inserted ". $c ." out of ".$d."records ";

oci_close($conn);


}
?>
