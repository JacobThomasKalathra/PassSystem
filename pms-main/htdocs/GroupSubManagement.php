<?php 
include ("session.php");
include("config.php");
if(!isset($_SESSION['sadmin_user'])){
	if(!isset($_SESSION['admin_user']))
      header("location:Home.php");
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

 <?php
	if(isset($_SESSION['sadmin_user'])){
echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;
				  <a href="GroupSubManagement.php">
                 <font>Group & Subgroup Management</font></a>&nbsp;
				<font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
	}

		
   
  ?> 
  
   
   
   
   
<p>&nbsp;</p>

<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0" id="table">

<tbody>

<tr id="user">
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/addgrp.gif" border="0"></td>
				<td valign="top" width="225"><a href="addgrp.php" >Add Group</a>
				<br><font color="#4c6d9a" size="1">Add Group in AE Password Management System</font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>
<tr>
		<td class="ASOD_TH_25" >
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/sbgrp.gif" border="0"></td>
				<td valign="top" width="225"><a href="addsbgrp.php" >Add Subgroup</a>
				<br><font color="#4c6d9a" size="1">Add Subgroup into an existing Group</font>
				</td>
			</tr>
			</tbody></table>
		</td>
		
</tr>



<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/rmsbgrp.gif" border="0"></td>
				<td valign="top" width="225"><a href="remgrp.php" STYLE="COLOR:#f63b09;" >Remove Group</a>
				<br><font color="#4c6d9a" size="1">Remove an existing Group</font>
				</td>
			</tr> 
			</tbody></table>
		</td>
		
</tr>

<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				<td width="25"><img src="css/rmgrp.gif" border="0"></td>
				<td valign="top" width="225"><a href="remsbgrp.php" STYLE="COLOR:#f63b09;" >Remove Subgroup</a>
				<br><font color="#4c6d9a" size="1">Remove an existing Subgroup</font>
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
