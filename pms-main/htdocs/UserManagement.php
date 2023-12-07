<?php 
include ("session.php");
include("config.php");
if(!isset($_SESSION['sadmin_user'])){
	if(!isset($_SESSION['admin_user']))
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
            	<?php if(!isset($_SESSION['sadmin_user'])){ echo '<a href="admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
		          <a href="admin_page.php" class="eLink">
				<font color="gold">Admin</font></a>&nbsp;<a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;';}
				else
					echo '<a href="admin_page.php" class="eLink">
				<font color="gold">Home</font></a>&nbsp;
				<a href="exit.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;';

				?>
	          
      </td>
    </tr>
	</tbody></table>
<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
		  <?php if(!isset($_SESSION['sadmin_user'])){ echo '<font color="#4c6d9a" size="1"><a href="admin_home.php">
                  Home</a>>&nbsp;<a href="admin_page.php">
                 <font>Admin</font></a>>&nbsp;<a href="UserManagement.php">
                 <font>User Management</font></a></font>
				 <font  color="#4c6d9a" size="1"  style="float:right">';
		  }
		  else
			  { echo '<font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;&nbsp;<a href="UserManagement.php">
                 <font>User Management</font></a></font>
				 <font  color="#4c6d9a" size="1"  style="float:right">';
		  }
				?>
	        <?php echo " You are logged in as: $login_session";?></font>
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
				<td width="25"><img src="css/admin_DOMAIN_COUNT.gif" border="0"></td>
				<td valign="top" width="225"><a href="adduser.php" >Grant Access</a>
				<br><font color="#4c6d9a" size="1">users who can access AE Password Management System</font>
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
				<td valign="top" width="225"><a href="update_user.php" >Update Role</a>
				<br><font color="#4c6d9a" size="1">change admin to non-admin and vice-versa</font>
				</td>
			</tr> 
			</tbody></table>
		</td>
		
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/admin_FIX_CRASHES.gif" border="0"></td>
				<td valign="top" width="225"><a href="remove_user.php" STYLE="COLOR:#f63b09;">Revoke Access</a>
				<br><font color="#4c6d9a" size="1">Remove access from AE Password Management System</font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>


<tr>
		<td class="ASOD_TH_25" >
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/admin_DAILY_USAGE.gif" border="0"></td>
				<td valign="top" width="225"><a href="report.php" >Export</a>
				<br><font color="#4c6d9a" size="1">Get a detailed Report of existing users</font>
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
