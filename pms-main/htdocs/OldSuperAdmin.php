<html><head>
<?php

include("config.php");
session_start();
$_POST['admin'];
$_POST['password'];
/*if(!isset($_SESSION['sadmin_user'])){
	if(isset($_SESSION['admin_user'])){
	header("location:admin_page.php");}
	else
		header("location:Home.php");
   }
*/
?>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
	<title>AE Password Management System</title>
   	<style type="text/css">
		TABLE.clsList { 
			font-size: 10pt;
			font-family: Arial;
			}
	</style>

<script>



  


</script>
<link rel="stylesheet" type="text/css" href="index_files/DEP.css">
</head>
<body onload="f1.guid.focus()" link="blue" vlink="blue" alink="blue" background="index_files/blue_bg.jpg">

<table cellpadding="0" cellspacing="0" height="100%" width="100%" background="index_files/headerBg.jpg" border="0">
    <tbody><tr height="50">
      <td valign="center">&nbsp;<img src="index_files/logo.gif"></td>
      <td valign="center" width="90%">&nbsp;<span class="appName">AE Password Management System</span></td>
    </tr>
    <tr>
      <td colspan="2" height="175" valign="bottom" width="100%" align="center" background="index_files/blue_bg.jpg">
		<form name="f1" method="post" action="SuperUser.php" >
			<table cellpadding="0" cellspacing="0" border="0">
				
				<tbody><tr>
				    <td colspan="2" height="45" valign="center"><span class="loginHeader">LOGIN, using your credentials.</span></td>
				</tr>
				<tr>
				    <td align="right"><span class="loginLabel">Login:&nbsp;</span></td>
				    <td><input name="admin" size="40" tabindex="1" type="text" required></td>
				</tr><tr>
				</tr><tr><td colspan="2" height="1"></td></tr>
				<tr>
				    <td align="right"><span class="loginLabel">Password:&nbsp;</span></td>
				    <td><input name="password" size="40" tabindex="2" type="password" required></td>
				</tr>
				<tr><td colspan="2" height="5"></td></tr>
				<tr>
				    <td>&nbsp;</td>
				       
					   <td><input class="image" onclick="fn_Submit()" src="index_files/btn_login.gif" tabindex="3" type="image" border="0"></td>
				</tr>
				<tr><td colspan="2">&nbsp; <br/></td></tr>
				
				<td colspan="2"  valign="center"><span style="color:red;font-size:12px;"><?php if( $_SERVER['HTTP_REFERER'] =='http://aepms.us.oracle.com/SuperAdmin.php') echo 'Wrong userid & password combination.';?></span></td>
								
			</tbody></table>
		</form>
	</td>
  </tr>
  <tr height="100%" valign="bottom" bgcolor="#ffffff"><td colspan="2">
 
			</td>
	</tr>
	
	<tr height="40" valign="center"><td colspan="2" align="right" background="index_files/footerBg.htm">
		&nbsp;<span class="copyright">© 2012 Oracle Corporation. All rights reserved.</span>&nbsp;
		</td>
	</tr>
	
</tbody></table>



</body></html>
