<html><head>
<?php
include ("session.php");
$current_time=time();
$diff = ($current_time)-($_SESSION[login_time]);

$time=610;

 if ($current_time-$_SESSION[login_time] >$time)
{
header("location:logout.php");
}
echo '<script>
setTimeout(function () {
   window.location.href= "logout.php"; // the redirect goes here

},60000); // 1 minute
</script>';
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
		<form name="f1" method="post" action="login.php" >
			<table cellpadding="0" cellspacing="0" border="0">
				
				<tbody><tr>
				    <td colspan="2" height="45" valign="center"><span class="loginHeader">Your Session is about to expire!</span></td>
				</tr>
				<tr>
				 <td align="center"><span ><a href="login.php">Yes! keep me signed in</a>&nbsp;&nbsp;&nbsp; <a href="logout.php">No! Sign me out</a></span></td> 
				   <!-- <td><input name="user" size="40" tabindex="1" type="text" ></td >  -->
				</tr><tr>
				</tr><tr><td colspan="2" height="1"></td></tr>
				<tr>
				    <td align="right"><span class="loginLabel">&nbsp;</span></td>
				    <!-- <td><input name="password" size="40" tabindex="2" type="password"></td> -->
				</tr>
				<tr><td colspan="2" height="5"></td></tr> 
				<tr>
				    <td>&nbsp;</td>
				       
					   <td>  <!--   <input class="image" onclick="fn_Submit()" src="index_files/btn_login.gif" tabindex="3" type="image" border="0"--> </td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				
				<tr><td>&nbsp;</td><td>  <!-- <span class="loginLabel"><font color="red"></font></span> --> </td></tr>
			</tbody></table>
		</form> 
	</td>
  </tr>
  <tr height="100%" valign="bottom" bgcolor="#ffffff"><td colspan="2">
 
			</td>
	</tr>
	
	<tr height="40" valign="center"><td colspan="2" align="right" background="index_files/footerBg.htm">
		&nbsp;<span class="copyright">� 2016 Oracle Corporation. All rights reserved.</span>&nbsp;
		</td>
	</tr>
	
</tbody></table>



</body></html>
