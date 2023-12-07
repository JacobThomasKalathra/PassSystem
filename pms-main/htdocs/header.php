<?php 
include ("session.php");

if(isset($_SESSION['admin_user'] )){
	echo '<head >
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" href="css/alertify.core.css" />
<link rel="stylesheet" href="css/alertify.default.css" id="toggleCSS" />
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="css/OutputTable.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/alertify.js"></script>
<script src="js/jquery.redirect.js"></script>
<script src="js/jquery.bootpag.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   
        
</head>
<body>


<table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
<tbody><tr height="25">
<td valign="center" width="100"><img src="home_files/logo.gif"></td>
<td valign="center"><span class="appName">AE Password Management System</span></td>
<td valign="bottom" align="right">
<font  color="#4c6d9a" size="1"  style="float:right;color:white">Welcome '.$login_session.'</font></br>
<a href="admin_home.php" class="eLink">
<b>Home</b></a>&nbsp;
<a href="admin_page.php" class="eLink">
<font color="gold">Admin</font></a>&nbsp;
<a href="logout.php" class="eLink">
<font color="coral">Logout</font></a>&nbsp;
<a href="https://confluence.oraclecorp.com/confluence/x/gl7pE" target="_blank" class="eLink">
<font>Help</font></a>&nbsp;
</td>
</tr>
</tbody></table>
</body>';
   }
   
   else
   {
	echo '<head >
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" href="css/alertify.core.css" />
<link rel="stylesheet" href="css/alertify.default.css" id="toggleCSS" />
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="css/OutputTable.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/alertify.js"></script>
<script src="js/jquery.redirect.js"></script>
<script src="js/jquery.bootpag.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   
        
</head>
<body>


<table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
<tbody><tr height="25">
<td valign="center" width="100"><img src="home_files/logo.gif"></td>
<td valign="center"><span class="appName">AE Password Management System</span></td>
<td valign="bottom" align="right">
<font  color="#4c6d9a" size="1"  style="float:right;color:white">Welcome '.$login_session.' Test</font></br>
<a href="admin_home.php" class="eLink">
<b>Home</b></a>&nbsp;
<a href="logout.php" class="eLink">
<font color="coral">Logout</font></a>&nbsp;
<a href="https://confluence.oraclecorp.com/confluence/x/gl7pE" target="_blank" class="eLink">
<font>Help</font></a>&nbsp;
</td>
</tr>
</tbody></table>
</body>';   
   }


?>