<?php  
include("config.php");
include ("session.php");
include("encdec.php");

 $output = '';  
 
 
if (!$conn) {
    echo "<div align='center' style='color:red'>".
	"<p>"."Database is down"."</p>".
	"</div>";
}

if ($_GET["cat"]==null){
	echo "<div align='center' style='color:red'>".
	"<p>"."Empty rows are not allowed."."</p>".
	"</div>";
	  header("location:Password_Report.php");
	return;
}
	if(isset($sadmin_check)){
$isadmin="select email from user_list where sadmin ='Y' and email='$login_session'";
if ($_GET["subcat"]==null) {
$query = "Select userid,password,grp,subgrp,component,description from password_list order by subgrp";
}

else {

$query = "Select userid,password,grp,subgrp,component,description from password_list where grp='" . $_GET["cat"] . "' and subgrp='" . $_GET["subcat"] . "'";
}		

}
else
{
	$isadmin="select email from user_list where grp='" . $_GET["cat"] . "' and admin ='Y' and email='$login_session' and subgroup in (select subgroup from user_list where grp='" . $_GET["cat"] . "' and admin='Y' and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y'))";
if ($_GET["subcat"]==null) {
$query = "Select userid,password,grp,subgrp,component,description from password_list where grp='" . $_GET["cat"] . "' and subgrp in (select subgroup from user_list where grp='" . $_GET["cat"] . "'  and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y'))order by subgrp";
}
else {

$query = "Select userid,password,grp,subgrp,component,description from password_list where subgrp in (select subgroup from user_list where grp='" . $_GET["cat"] . "'  and admin='Y' and exists (select subgrp from base where user_list.subgroup=base.subgrp and user_list.grp=base.grp and user_list.email='$login_session' and user_list.admin='Y') and password_list.grp='" . $_GET["cat"] . "' and password_list.subgrp='" . $_GET["subcat"] . "')";

}
}

$s = oci_parse($conn, $isadmin);
oci_execute($s, OCI_DEFAULT);
$results=array();
$numrows1 = oci_fetch_all($s, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 
if ($numrows1 >0) {
      
     {  
           $output .= '  
                <table class="table" bordered="1">  
                     <tr>  
                          <th>USERID</th>  
                          <th>PASSWORD</th>  
                          <th>GROUP</th>
						  <th>SUBGROUP</th>
						  <th>COMPONENT</th>
						  <th>DESCRIPTION</th>
						  
                     </tr>  
           '; 
			$y = OCIParse($conn, $query);
			OCIExecute($y);		   
          while (($res = oci_fetch_array($y, OCI_BOTH)) != false) 
             			  
           {  
                //$out=	Decrypt($pass, $res[1]);
			$out=	mc_decrypt($res[1], ENCRYPTION_KEY);
				$output .= '  
                     <tr>  
                          <td>'.$res[0].'</td>  
                          <td>'.$out.'</td>  
                          <td>'.$res[2].'</td>  
						  <td>'.$res[3].'</td>  
						  <td>'.$res[4].'</td>
						  <td>'.$res[5].'</td> 
						   
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
			
			header("Content-Type: application/XLS");
			header("Content-Disposition: attachment; filename=report.xls"); 
			header("Pragma: no-cache"); 
			header("Expires: 0");
            echo $output; 
			//mail('bhavesh.kumar@oracle.com', $subject, $message, $headers);
	
      } 
	

}

else {die ("<div align='center' style='color:Red'>".
	"<p>"."You are not admin of this subgroup"."</p>".
	"</div>");}


 

 oci_close($conn);
 ?>  