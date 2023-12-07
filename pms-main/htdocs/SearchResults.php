<?php
include ("session.php");
include("config.php");
include("encdec.php");
if(!isset($_SESSION['admin_user'] )){
	if(!isset($_SESSION['login_user'] )){
	header("location:login.php");
   }
}
$search = "%{$_POST['search']}%";
if ($search=='%%' or $search=='%%%'){
header("location:admin_home.php");	
}
$search=strtolower($search);
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" href="css/alertify.core.css" />
<link rel="stylesheet" href="css/alertify.default.css" id="toggleCSS" />
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/alertify.js"></script>
<script src="js/jquery.redirect.js"></script>
</head>
<body >


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
	  <td valign="bottom" align="right">
	  <font  color="#4c6d9a" size="1"  style="float:right;color:white"><?php echo " You are logged in as :$login_session";?></font></br>
            	<a href="admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
				  <?PHP 
				  if (isset($_SESSION['admin_user'])){
				 echo ' <a href="admin_page.php" class="eLink">
                  <font color="gold">Admin</font></a>&nbsp;';
				  }
				  ?>

		          <a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;
				  <a href="https://confluence.oraclecorp.com/confluence/x/gl7pE" target="_blank" class="eLink">
                  <font>Help</font></a>&nbsp;

      </td>
    </tr>
	</tbody></table>

	<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_home.php">
                  Home</a>&nbsp;&nbsp;
				
	      </td>
    </tr>
   </tbody></table>


&nbsp;


<script LANGUAGE='JavaScript'>


$(document).ready(function(){

 $("div").hide();
 $(".submit").click(function(){
var divname= this.id;
var value= $("#divs"+divname).text();
var desc= $("#desc"+divname).text();
var uid= $("#username"+divname).text();
var cat=$("#grp"+divname).text();
var sc=$("#sbgrp"+divname).text();
$(function(){
    $.ajax({
      type: "POST",
      url: 'SearchAction.php',
      data: {un:uid, dsc:desc , ct:cat,sct:sc},
      success: function(data) {
       alertify.alert(data);
      }
    });
  });

    });

});


  
</script>

<?php
if (isset($_GET['p']))
{
$p= $_GET['p'];
$page=$_GET['page'];


}

$page=$_REQUEST['p'];

$limit=500;
if($page=='')
{
$page=1;
$start=0;
}
else
{
$start=$limit*($page-1);
}


$rs="SELECT grp,subgrp,userid,description FROM password_list  WHERE  (upper(userid) like :l  or upper(description) like:l2 or lower(userid) like :l  or lower(description) like:l2)  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e) order by UPPER(userid)".
				"OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";


				

echo "<center>"."<table class='ASOD_TABL' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody>"."<tr>".

"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='80' class='pageTitle' >"."<b>"."Group"."</b>".
				"</td>".
			"</tr>".
        "</tbody>"."</table>".
		"</td>".
		
		"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='80' class='pageTitle' >"."<b>"."Subgroup"."</b>".
				"</td>".
			"</tr>".
        "</tbody>"."</table>".
		"</td>".
		

"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='140' class='pageTitle' >"."<b>"."ID"."</b>".
				"</td>".
			"</tr>".
        "</tbody>"."</table>".
		"</td>".


"<td class='ASOD_TH_25'>".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='600' class='pageTitle' >"."<b>"."Description"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".


			"<td class='ASOD_TH_25'>".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>".
			"<tr>".

				"<td valign='top' width='80' class='pageTitle' >".
				"<b>"."Password"."</b>".
				"</td>".
			"</tr>".
			"</tbody>"."</table>".
			"</td>".





			"</tr>"	;
$adm='Y';
			$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":l", $search);
			oci_bind_by_name($y, ":l2", $search);
			//oci_bind_by_name($y, ":ad", $adm);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$id=1;




			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[4], ENCRYPTION_KEY);
echo "<table class='pms' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>".
 
 		"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='80' id='grp$id' style='color:#535659;font-size:9pt'>"."$res[0]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".
 
 
			"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='80'  id='sbgrp$id' style='color:#535659;font-size:9pt'>"."$res[1]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".
		
			"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='140' id='username$id' style='color:#535659;font-size:9pt'>"."$res[2]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".



		"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='600'  id='desc$id' style='color:#535659;font-size:9pt'>"."$res[3]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".



		"<td class='ASOD_TH_25' style='display:none'>".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>".
			"<tr>".

				"<td valign='top' width='80'  style='color:#535659;font-size:9pt'>".

				"<div id='divs$id'>"."$out"."</div>"."</td>".




				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".




		"<td class='ASOD_TH_25'>".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>".
			"<tr>".

				"<td valign='top' width='80' style='color:green'>".


				"<input id='$id' class='submit' value='GET' type='submit'>".




				"</td>".
			"</tr>".
			"</tbody>"."</table>".

		"</td>".
		

"</tr>"."</table>";




			}
		ECHO "&nbsp";	

$s = oci_parse($conn,"select count (*) FROM password_list WHERE  userid like :l  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:em ) order by UPPER(userid) ");
oci_bind_by_name($s, ":l", $search);
oci_bind_by_name($s, ":em", $login_session);
$r = oci_execute($s);
$r = oci_fetch_all($s, $res);
	foreach ($res as $row) {
$rownum = htmlspecialchars($row[0], ENT_NOQUOTES, 'UTF-8');

}
$total=$rownum;

$num_page=ceil($total/$limit);

 function pagination($page,$num_page)
  {
    echo '<h4>';
    echo "<font color='#2b7c92'> Page </font>";
    $search=$_GET['search1'];
    $cat=$_GET['cat'];
    for($i=1;$i<=$num_page;$i++)
    {
       if($i==$page)
  {

   echo "$i";
  }
  else
  {
   echo'<a href="SearchResults.php?search='.$search.'&p='.$i.'"> ' .$i. ' </a>';
  }
    }
echo "hi";
    echo '</h4>';
  }
  if($num_page>1)
  {
   pagination($page,$num_page);
 }

?>


</html>



</body></html>
