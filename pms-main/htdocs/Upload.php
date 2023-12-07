<?php
include("config.php");
include("session.php");
include("encdec.php");
if(!isset($_SESSION['sadmin_user'])){
	if(!isset($_SESSION['admin_user']))
      header("location:Home.php");
   }

?>

<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
 <!doctype html public "-//w3c//dtd html 3.2//en">   

</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="admin_home.php" class="eLink">
                  <b>Home</b>              </a>&nbsp;
		          <a href="admin_page.php" class="eLink">
                 <font color="gold">Admin</font></a>&nbsp;
		          <a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;
	          
      </td>
    </tr>
	</tbody></table>

<?php

		echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;>
				  <a href="PasswordManagement.php">
                 <font>Password Management</font></a>>&nbsp;
				 <a href="Upload.php">
                 <font>Import via CSV</font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
   
  ?> 

<p>&nbsp;</p>
<center>
<form name="import" method="post" enctype="multipart/form-data" >
<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0">
&nbsp;

<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Select csv file :</font>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input type="file" name="file" required/><br />
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>
			
	


<tr>
</tr>	
			
			

</tr>

<tr>
		<td class="ASOD_TH_25" colspan="2">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
		<td colspan="2">	
		
		<tr> <p>&nbsp;</p>
		
		      <input type="submit" class ="submit" name="submit" value="Submit" />
			 
			 
               
			</tr>
			</tbody></table>
		</td>
		
</tr>

</tr>

</tbody></table>

</center>
&nbsp;


</form>

</div>
</body>
</html>
<?php
$err=0;
$process=0;

 $output = ''; 
            $output .= '  
                <table cellpadding="5" cellspacing="1" border="0" align="center">  
                     <tr>  
                          <th class="ASOD_TH_25">Group</th>  
                          <th class="ASOD_TH_25">Subgroup</th>  
                          <th class="ASOD_TH_25">User ID</th>
						  <th class="ASOD_TH_25">Password</th>
						  <th class="ASOD_TH_25">Component</th>
						  <th class="ASOD_TH_25">Description</th>
						  
                     </tr>  
           '; 

if(isset($_POST["submit"]))
{
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
$d=0;
$process=$process+1;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$userid = $filesop[0];
$password = $filesop[1];
$grp = $filesop[2];
$subgrp = $filesop[3];
$description = $filesop[5];
$comp = $filesop[4];
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
$sql = "INSERT INTO password_list (userid,password,grp,subgrp,component,description) VALUES (:1,:2,:3,:4,:5,:6)";
$v = OCIParse($conn,$sql);
oci_bind_by_name($v, ":1", $userid);
oci_bind_by_name($v, ":2", $Encry);
oci_bind_by_name($v, ":3", $grp);
oci_bind_by_name($v, ":4", $subgrp);
oci_bind_by_name($v, ":5", $comp);
oci_bind_by_name($v, ":6", $description);
$d = $d + 1;
if (OCIExecute($v)) {
$c = $c + 1;}
else {
	$err=$err+1;
//echo "$userid,$grp, $subgrp,$description <br/>" ;
$output .= '  
                     <tr >  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$grp.'</td>  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$subgrp.'</td>  
                          <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$userid.'</td>  
						  <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$password.'</td>
						  <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$comp.'</td> 						  
						  <td style="BACKGROUND-COLOR:#cfe0f1;FONT-SIZE:8pt;FONT-WEIGHT: bold;COLOR: #3c3c3c;">'.$description.'</td>  						  
						   
                     </tr>  
                ';
				

}

}
}

if ($err!=0){
echo "$output";
echo '<div align="center" style="color:Red">
	<p>You have inserted '.$c.' out of '.$d.' records. Non inserted rows are as follows:</p>
	</div>)';
}

else{
	echo '<div align="center" style="color:Green">
	<p>You have inserted '.$c.' out of '.$d.' records.</p>
	</div>)';
	
}


oci_close($conn);


}
?>
<?php
if ($process==0){
echo'<span class="pageTitle"> &nbsp;&nbsp;Steps to create CSV file from excel . </br> </br>&nbsp;&nbsp; 1)Excel file should be in below format: </br>&nbsp;&nbsp;<img src="css/excel.JPG" height="150" width="400"> </br>&nbsp;&nbsp;2)Click save as other formats and select csv format</span> ';}


?>