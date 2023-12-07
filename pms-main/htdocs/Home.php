   <?php
include ("session.php");
include("config.php");
include("encdec.php");
include("queries.php");

include ("header.php");

?>
<head >
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>


</head>

<table class='AEPMS_TABLE'cellspacing='0' width='100%'  <!-- cellspacing='0' is important, must stay -->

	<!-- Table Header -->
	<thead >
	<form method="POST" action="home.php" >
		<tr>
		 
	<th></th>
			<th width="150px"><?php include ("group.php");
								
				
?>

	
</th>
			<th width="150px"><?php include ("subgroup.php"); ?></th>
			<th></th><th width="300px"><input type="text" class="form-control" placeholder="Search" name="search"></th>
		</tr>
		</form>
	</thead>

</table>
<br/>
<div id="div1"></div>
<div align='center' id="div2"></div>

<head>

    <script src="js/jquery.bootpag.min.js"></script>
</head>
<body>

<?php 

$_POST[search]=filter_var($_POST['search'], FILTER_SANITIZE_STRING);
$search =$_POST[search];
if (isset($search) and $search!=null){
$rs= "SELECT count (*) from password_list WHERE  (lower(userid) like :l  or lower(description) like:l)  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e)";

$search = "%$search%";
$search=strtolower($search);
$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":l", $search);
			//oci_bind_by_name($y, ":l2", $search);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$r = oci_fetch_all($y, $res);
	foreach ($res as $row) {
$rownum = htmlspecialchars($row[0], ENT_NOQUOTES, 'UTF-8');

}

$total=$rownum;
$limit=10;
$num_page=ceil($total/$limit);

}
else
{
$s = oci_parse($conn,$row_count);
oci_bind_by_name($s, ":g", $cat);
oci_bind_by_name($s, ":sb", $subcat);
oci_bind_by_name($s, ":em", $login_session);
$r = oci_execute($s);
$r = oci_fetch_all($s, $res);
	foreach ($res as $row) {
$rownum = htmlspecialchars($row[0], ENT_NOQUOTES, 'UTF-8');

}

$total=$rownum;
$limit=10;
$num_page=ceil($total/$limit);
}

    echo '<script>
		var cat="'.$cat.'";
var subcat="'.$subcat.'";
var search ="'.$_POST[search].'";
var num ="'.$num.'";
$(document).ready(function(){
$(function(){
    $.ajax({
      type: "POST",
      url: "pag_test3.php",
      data: {cat:cat,subcat:subcat,search:search,num:num},
      success: function(data) {
        $("#div1").html(data);
      }
    });
  });

});

       


</script>';




	
	  
     echo  '<script>
		var cat="'.$cat.'";
var subcat="'.$subcat.'";
var search ="'.$_POST[search].'";
        // init bootpag
        $("#div2").bootpag({
            total: '.$num_page.',
			maxVisible: 4
        }).on("page", function(event, num){
               $.ajax({
      type: "POST",
      url: "pag_test3.php",
      data: {cat:cat,subcat:subcat,search:search,num:num},
      success: function(data) {
        $("#div1").html(data);
      }
    });
        });
    </script>';
	


   ?> 
</body>
</html>
