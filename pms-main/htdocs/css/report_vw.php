
  <?php
include("config.php");
include("report.php");
include ("session.php");
 $output = 'HELLO';  

 
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_GET["cat"]==null  ){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Empty rows not allowed!')
    window.location.href='report.php';
    </SCRIPT>");
	break;
}

if ($_GET["subcat"]==null and $_GET["admin"]==null){
$query = "Select guid,grp,subgroup,admin from `user_list` where `grp`='" . $_GET["cat"] . "'";
}

else {
if ($_GET["admin"]==null){
$query = "Select guid,grp,subgroup,admin from `user_list` where `grp`='" . $_GET["cat"] . "' and `subgroup`='" . $_GET["subcat"] . "'";
}


else
$query = "Select guid,grp,subgroup,admin from `user_list` where `admin`='" . $_GET["admin"] . "' and `grp`='" . $_GET["cat"] . "' and `subgroup`='" . $_GET["subcat"] . "'";
}
if ($conn->query($query) == TRUE) {
	
	echo "<center>";
    echo ("<table class='ASOD_TABLE' border='1'>"."<tr class='ASOD_TH_25'>".
    	"<th>"."GUID"."</th>".
		"<th>"."Group"."</th>".
		"<th>"."Sub Group"."</th>".
		"<th>"."Admin"."</th>".
"</tr>");
	
    foreach ($conn->query($query) as $noticia2) {
		
		{echo "<tr class='ASOD_TH_25'>"."<td>"."$noticia2[guid]"."&nbsp"."</td>".
							"<td>"."$noticia2[grp]"."&nbsp"."</td>".
							"<td>"."$noticia2[subgroup]"."&nbsp"."</td>".
							"<td>"."$noticia2[admin]"."&nbsp"."</td>"."</tr>"."<BR>";}
							
	unset($_GET);
}


	echo "</center>";
	echo ("</table>");
	header("Content-Type: application/xls");   
    header("Content-Disposition: attachment; filename=download.xls");
	echo $output;

}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


 mysqli_close($conn);


?>