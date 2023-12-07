<?php 
include ("session.php");
include("config.php");
if(!isset($_SESSION['admin_user'])){
      header("location:login.php");
   }
   

?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>

<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <meta charset="utf-8">

</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
		          <a href="admin_page.php" class="eLink">
                 <font color="gold">Admin</font></a>&nbsp;
		          <a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;
	          
      </td>
    </tr>
	</tbody></table>
<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_home.php">
                  Home</a>>&nbsp;<a href="admin_page.php">
                 <font>Admin</font></a>>&nbsp;
				 <a href="PasswordManagement.php">
                 <font>Password Management</font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right"><?php echo " You are logged in as: $login_session";?></font>
	      </td>
    </tr>
   </tbody></table>
   
   
   
   
<p>&nbsp;</p>

<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0" id="table">

<tbody>

<tr id="user">
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/add.png" border="0"></td>
				<td valign="top" width="225"><a href="addpass.php" >ADD</a>
				<br><font color="#4c6d9a" size="1">Add new user-id and password</font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>

<tr id="user">
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/csv.png" border="0"></td>
				<td valign="top" width="225"><a href="Upload.php" >Import via CSV</a>
				<br><font color="#4c6d9a" size="1">Import user-id and password via CSV file</font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>

<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/admin_PRCS_HOME.gif" border="0"></td>
				<td valign="top" width="225"><a href="updatepass.php" >Update</a>
				<br><font color="#4c6d9a" size="1">Update values for existing user-id </font>
				</td>
			</tr> 
			</tbody></table>
		</td>
		
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/delete.png" border="0"></td>
				<td valign="top" width="225"><a href="removepass.php" STYLE="COLOR:#f63b09;" >Remove</a>
				<br><font color="#4c6d9a" size="1">Remove existing user-id and password</font>
				</td>
			</tr> 
			</tbody></table>
		</td>
		
</tr>



<tr>
		<td class="ASOD_TH_25" >
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/export.png" border="0"></td>
				<td valign="top" width="225"><a href="Password_Report.php" STYLE="text-decoration: none">View Reports</a>
				<br><font color="#4c6d9a" size="1">Export Excel </font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>







</tr>


 

</tbody>

</table>

</center>


  
   

</body></html>
