<?php 
include ("session.php");
include("config.php");

?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>PMS(Password Management System)</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">Password Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="http://den01gvr.us.oracle.com/admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
		          <a href="admin.php" class="eLink">
                 <font color="gold">Admin</font></a>&nbsp;
		          <a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;
	          
      </td>
    </tr>
	</tbody></table>

    <table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font class="pageTitle">Add a new user</font>
	      </td>
    </tr>
   </tbody></table>
   
   
   <div class="ASOD_BODY">
<p>&nbsp;</p>
<form name="adduser" method="post" action="add_user.php">
 
<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">User ID :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
			</tr>
			</tbody></table>
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">Group :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><input type="text" name="grp" value="<?php if(isset($_POST['grp'])) echo $_POST['grp']; ?>"></td>
			</tr>
			</tbody></table>
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">Sub Group :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><input type="text" name="subgroup" value="<?php if(isset($_POST['subgroup'])) echo $_POST['subgroup']; ?>"></td>
				
				
			</tr>
			</tbody></table>
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">Admin (Y/N) :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><input type="text"  name="admin" value="<?php if(isset($_POST['admin'])) echo $_POST['admin']; ?>"></td>
				
			
			</tr>
			</tbody></table>
		</td>
</tr>

</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
		<td>	<input type="submit" name="submit" value="Register"></td>
				
				
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				
				<td><?php if ($_POST['subgroup']==""){break;}?></td>
			
			</tr>
			</tbody></table>
		</td>
</tr>

</tr>

</tbody></table>

</center>
</form>
</div>

   

</body>
</html>
