<?php 
include ("session.php");
include("config.php");
include("encdec.php");
include("queries.php");
if(!isset($_SESSION['admin_user'] )){
	header("location:login.php");
   }
$cat=$_POST['cat'];
$subcat=$_POST['subcat'];
$search=$_POST['search'];
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

	
echo "<center>"."<table class='OUTPUT_TABLE' table-laout='fixed' width='80%'  

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody >"."<tr>".

"<td  width='80px' >"."Group"."</td>".
"<td  width='80px'>"."Subroup"."</td>".
"<td  width='80px'>"."User ID"."</td>".
"<td  width='80px'>"."Component"."</td>".
"<td  width='600px'>"."Description"."</td>".
"<td  width='60px'>"."Password"."</td>".




"</tr>"	;


			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[2], ENCRYPTION_KEY);
echo "<table class='OUTPUT_TABLE' width='80%' table-layout='fixed' 

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>".
 				"<td   width='80px' table-laout='fixed' id='group$id' >"."$res[0]"."</b>".

				"</td>".
				
				"<td   width='80px' table-laout='fixed' id='subgroup$id' >"."$res[1]"."</b>".

				"</td>".

				"<td   width='80px' table-laout='fixed' id='username$id' >"."$res[2]"."</b>".

				"</td>".
			
				"<td width='80px' table-laout='fixed' id='component$id'  >"."$res[3]"."</b>".

				"</td>".
			
				"<td width='600px' table-laout='fixed' align='left' id='desc$id'  >"."$res[4]"."</b>".

				"</td>".
			


			

				"<td width='60px'>".

				
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
	$rs="SELECT userid,component,description FROM password_list  WHERE grp=:c and subgrp=:s and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e ) order by UPPER(userid)"."OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";

$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":c", $cat);
			oci_bind_by_name($y, ":s", $subcat);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$id=1;


echo "<center>"."<table class='OUTPUT_TABLE' table-laout='fixed' width='80%'  

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody >"."<tr>".

"<td  width='80px'>"."User ID"."</td>".
"<td  width='80px'>"."Component"."</td>".
"<td  width='600px'>"."Description"."</td>".
"<td  width='60px'>"."Password"."</td>".




			"</tr>"	;
			


			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[2], ENCRYPTION_KEY);
echo "<table class='OUTPUT_TABLE' width='80%' table-layout='fixed' 

oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: 

none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>".

				"<td   width='80px' table-laout='fixed' id='username$id' >"."$res[0]"."</b>".

				"</td>".
			
				"<td width='80px' table-laout='fixed' id='component$id'  >"."$res[1]"."</b>".

				"</td>".
			
				"<td width='600px' table-laout='fixed' align='left' id='desc$id'  >"."$res[2]"."</b>".

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
var desc= $("#desc"+divname).text();
var uid= $("#username"+divname).text();
var cat="'.$cat.'";
var sc="'.$subcat.'";
$(function(){
    $.ajax({
      type: "POST",
      url: "action.php",
      data: {un:uid, dsc:desc ,ct:cat,sct:sc},
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

	echo $user_name;
}

}
?>