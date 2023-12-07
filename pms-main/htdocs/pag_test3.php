<?php 
include ("session.php");
include("config.php");
include("encdec.php");
include("queries.php");
/* if(!isset($_SESSION['admin_user'] )){
	header("location:login.php");
   } */
$cat=$_POST['cat'];
$subcat=$_POST['subcat'];
$search=filter_var($_POST['search'], FILTER_SANITIZE_STRING);

$limit=10;
if(isset($_POST['num']) and $_POST['num']!=null){
$num=$_POST['num'];
$start=$limit*($num-1);
}else{
$num=1;
$start=$limit*($num-1);
}


//*******************************if seach is performed****************************************************//
if (isset($search) and $search!=null){
	if ($search=='%' or $search=='%%' )
		{

			echo "Please Enter minimum 3 letters to perform search.";
			
		}
		else
		{
			
$rs= "SELECT grp,subgrp,userid,component,description FROM password_list  WHERE  (lower(userid) like :l  or lower(description) like:l)  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e) order by subgrp,userid "."OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";

$search = "%$search%";
$search=strtolower($search);
$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":l", $search);
			//oci_bind_by_name($y, ":l2", $search);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$id=1;

	
echo "<center>"."<table class='OUTPUT_HEADER'   width='80%'

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody >"."<tr>".

"<th  width='80px'>"."Group"."</th>".
"<th  width='80px'>"."Subroup"."</th>".
"<th  width='80px'>"."User ID"."</th>".
"<th  width='80px'>"."Component"."</th>".
"<th  width='600px'>"."Description"."</th>".
"<th  width='80px'>"."Password"."</th>".




"</tr>".
"<div style='color:gray'>Showing results for the keyword $_POST[search]  &nbsp; &nbsp; <a href='admin_home.php'>Reset Search</a></div>";


			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[2], ENCRYPTION_KEY);
echo "<table class='OUTPUT_TABLE' width='80%' 

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>".
 				"<td   width='80px'  id='group$id' >"."$res[0]"."</b>".

				"</td>".
				
				"<td   width='80px' id='subgroup$id' >"."$res[1]"."</b>".

				"</td>".

				"<td   width='80px' word-wrap='break-word' id='username$id' >"."$res[2]"."</b>".

				"</td>".
			
				"<td width='80px'  id='component$id'  >"."$res[3]"."</b>".

				"</td>".
			
				"<td width='600px'  align='left' id='desc$id'  >"."$res[4]"."</b>".

				"</td>".
			


			

				"<td width='80px'>".

				
				"<input id='$id' class='submit' value='GET' type='submit'>".

 


				"</td>".
			

			"</tr>"."</table>";



			}
			
			
			
ECHO '<script LANGUAGE="JavaScript">


$(document).ready(function(){


 $(".submit").click(function(){
var divname= this.id;
var comp= $("#component"+divname).text();
var desc= $("#desc"+divname).text();
var uid= $("#username"+divname).text();
var cat=$("#group"+divname).text();
var sc=$("#subgroup"+divname).text();
$(function(){
    $.ajax({
      type: "POST",
      url: "SearchAction.php",
      data: {un:uid, dsc:desc ,comp:comp, ct:cat,sct:sc},
      success: function(data) {
       alertify.alert(data);
      }
    });
  });

    });

});


  
</script>';


}
}	
	

//*********************************if search is not performed*********************************************//
else
{
if ($cat and $subcat !=null){
	
	//$start=$num;
	//$rs="SELECT userid,description FROM password_list  WHERE grp=:c and subgrp=:s and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e ) order by UPPER(userid)"."OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";
	$rs="SELECT id,userid,component,description FROM password_list  WHERE grp=:c and subgrp=:s and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e ) order by UPPER(userid)"."OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";
//$rs="SELECT * FROM password_list";
$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":c", $cat);
			oci_bind_by_name($y, ":s", $subcat);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$id=1;


echo "<center>"."<table class='OUTPUT_HEADER' width='80%'

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody >".
"<th width='80px'  >"."User ID"."</th>".
"<th  width='80px'>"."Component"."</th>".
"<th width='600px'>"."Description"."</th>".
"<th  width='60px'>"."Password"."</th>"	;
			


			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[2], ENCRYPTION_KEY);
echo "<table class='OUTPUT_TABLE' width='80%'  

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>".
 
 
				"<td style='display:none;' id='id$id' >"."$res[0]"."</b>".

				"</td>".

				"<td   width='80px' id='username$id' >"."$res[1]"."</b>".

				"</td>".
			
				"<td width='80px'  id='component$id'  >"."$res[2]"."</b>".

				"</td>".
			
				"<td width='600px'  align='left' id='desc$id'  >"."$res[3]"."</b>".

				"</td>".
			


			

				"<td width='60px'>".

				
				"<input id='$id' class='submit' value='GET' type='submit'>".

 


				"</td>".
			

			"</tr>"."</table>";



			}
			
			
			
			echo '<script LANGUAGE="JavaScript">


$(document).ready(function(){

 
 $(".submit").click(function(){
var divname= this.id;
var value= $("#divs"+divname).text();
var id= $("#id"+divname).text();
var uid= $("#username"+divname).text();
var cat="'.$cat.'";
var sc="'.$subcat.'";
$(function(){
    $.ajax({
      type: "POST",
      url: "action.php",
      data: {un:uid, id:id ,ct:cat,sct:sc},
      success: function(password) {
       alertify.alert(password);
      }
    });
  });

    });

});


  
</script>';


}
else
{

	echo '<div class="container" style="color:#666"> Hi ! Welcome to Password Management System. You can get userid & passwords of all those groups and subgroups in which you are mapped. Please select a group and a related subgroup to get a detailed list of existing userid and their passwords. For a quick search  please use search option. This search will perform universal search method in all groups and subgroups in which you are mapped to find result as per provided input.</div>';
}

}
?>