<?php
include ("session.php");
include("config.php");
if(!isset($_SESSION['sadmin_user'])){
      header("location:login.php");
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

    </tr>
 <?php
	if(isset($_SESSION['sadmin_user'])){
echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;
				  <a href="GroupSubManagement.php">
                 <font>Group & Subgroup Management</font></a>>&nbsp;
				 <a href="addgrp.php">
                 <font>Add Group</font></a>>&nbsp;
				<font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
	}

		
   
  ?> 
  

<p>&nbsp;</p>

 <form name="adduser" method="get" action="add_grp.php">
<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>
		
		
</tr>
<tr>
		
		
</tr>

<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Group Name:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input type="text" name="grp" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required>
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>
			
			
	<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Sub Group :</b>
				<br><font color="#4c6d9a" size="1">Please put NA if no subgroup </font>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input type="text" name="subgrp" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required>
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
		
		      <input class='submit' value='ADD' type='submit'>
			 
			 
               
			</tr>
			</tbody></table>
		</td>
		
</tr>

</tr>

</tbody></table>

</center>
</form>




</body></html>
