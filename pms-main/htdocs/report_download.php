<?php  
include("config.php");
include ("session.php");
if (!isset($_GET['export_excel'])){
include ("report.php");	
}

 $output = '';  
 
 
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}
	
	$subcat=$_GET["subcat"];
	$cat=$_GET["cat"];
	$admin=$_GET["admin"];

if ($cat==null){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed. "."</p>".
	"</div>";
	return;
}

if(isset($_SESSION['sadmin_user'])){
if ($subcat==null and $admin==null){
$query = "Select email,grp,subgroup,admin from user_list where grp='" . $_GET["cat"] . "' order by email";
}
else{

	if ($_GET["subcat"]==null){
$query = "select email,grp,subgroup,admin from user_list where grp='" . $_GET["cat"] . "' and admin='" . $_GET["admin"] . "' order by email";
}
else {	
if ($_GET["admin"]==null and $_GET["subcat"]!=null){
$query = "select email,grp,subgroup,admin from user_list where  grp='" . $_GET["cat"] . "'  and subgroup='" . $_GET["subcat"] . "' order by email";
}
else{
$query = "select email,grp,subgroup,admin from user_list  where grp='" . $_GET["cat"] . "' and subgroup='" . $_GET["subcat"] . "'   and admin='" . $_GET["admin"] . "' order by email";
}
}
}
	
	
}
else{


if ($subcat==null and $admin==null){
$query = "select email,grp,subgroup,admin from user_list where subgroup in (select subgroup from user_list where grp='" . $_GET["cat"] . "' and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y')) and grp='" . $_GET["cat"] . "' order by email";
}
else{

	if ($_GET["subcat"]==null){
$query = "select email,grp,subgroup,admin from user_list where subgroup in (select subgroup from user_list where grp='" . $_GET["cat"] . "'  and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y'))  and admin='" . $_GET["admin"] . "' and grp='" . $_GET["cat"] . "' order by email";
}
else {	
if ($_GET["admin"]==null and $_GET["subcat"]!=null){
$query = "select email,grp,subgroup,admin from user_list where subgroup in (select subgroup from user_list where grp='" . $_GET["cat"] . "' and subgroup='" . $_GET["subcat"] . "'  and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y')) and grp='" . $_GET["cat"] . "' order by email";
}
else{
$query = "select email,grp,subgroup,admin from user_list where subgroup in (select subgroup from user_list where grp='" . $_GET["cat"] . "' and subgroup='" . $_GET["subcat"] . "'  and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y'))  and admin='" . $_GET["admin"] . "' and grp='" . $_GET["cat"] . "' order by email";
}
}
}
}
 //if(isset($_GET["export_excel"])) 
 
  
 $u = OCIParse($conn,  $query);
      
   $result =OCIExecute($u, OCI_DEFAULT);
   $results=array();
   $numrows1 = oci_fetch_all($u, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
      if($numrows1 > 0)  
      {  
           $output .= '  
                <table cellpadding="5" cellspacing="1" border="0" align="center">  
                     <tr>  
                          <th class="ASOD_TH_25">EMAIL</th>  
                          <th class="ASOD_TH_25">GROUP</th>  
                          <th class="ASOD_TH_25">SUB GROUP</th>
						  <th class="ASOD_TH_25">ADMIN</th>
						  
                     </tr>  
           '; 
			$y = OCIParse($conn, $query);
			OCIExecute($y);		   
          while (($res = oci_fetch_array($y, OCI_BOTH)) != false)  
           {  
                $output .= '  
                     <tr >  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$res[0].'</td>  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$res[1].'</td>  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$res[2].'</td>  
						  <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$res[3].'</td>  
						   
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=report.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
           echo $output;  
      }  
 

 oci_close($conn);
 ?>  