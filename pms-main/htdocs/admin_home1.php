<?php
include ("session.php");
include("config.php");
include("encdec.php");
if(!isset($_SESSION['admin_user'] )){
	header("location:login.php");
   }
include ("header.php");

?>


				
				<?php


				 echo '<form method=GET>
	<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_home.php">
                  </a>';
				  
				  
			
				{echo'<font  color="#4c6d9a" size="1"  style="float:right"><input type="text" name="search"     placeholder="Search"   ></font>'; }
				
				echo '</td>
    </tr>
   </tbody></table></form>';
   	$search = trim($_GET['search']);

				if ($search!=null){
				if ($search=="%"){header("location:admin_home.php");}
				else
			echo "<br />";
		
//////////////////////////////////////	
if (isset($_GET['p']))
{
$p= $_GET['p'];
$page=$_GET['page'];


}

$page=$_REQUEST['p'];

$limit=15;
if($page=='')
{
$page=1;
$start=0;
}
else
{
$start=$limit*($page-1);
}

$rs= "SELECT grp,subgrp,userid,description FROM password_list  WHERE  (upper(userid) like :l  or upper(description) like:l2 or lower(userid) like :l  or lower(description) like:l2)  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e) order by UPPER(userid)".
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
$search = "%$search%";
$search=strtolower($search);

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
			echo "</br></br>";
		ECHO '<script LANGUAGE="JavaScript">


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
      url: "SearchAction.php",
      data: {un:uid, dsc:desc , ct:cat,sct:sc},
      success: function(data) {
       alertify.alert(data);
      }
    });
  });

    });

});


  
</script>';

//echo "$search";	

$rs1= "select count (*)  FROM password_list  WHERE  (upper(userid) like :l  or upper(description) like:l2 or lower(userid) like :l  or lower(description) like:l2)  and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e) order by UPPER(userid)";
$s = oci_parse($conn,$rs1);
			oci_bind_by_name($s, ":l", $search);
			oci_bind_by_name($s, ":l2", $search);
			//oci_bind_by_name($y, ":ad", $adm);
			oci_bind_by_name($s, ":e", $login_session);
$r = oci_execute($s);
$r = oci_fetch_all($s, $res);
	foreach ($res as $row) {
$rownum = htmlspecialchars($row[0], ENT_NOQUOTES, 'UTF-8');

}
$total=$rownum;

$num_page=ceil($total/$limit);

 function pagination($page,$num_page)
  {
	  	$search = $_GET['search'];
	  $search = trim($search);
$search=strtolower($search);
    echo '<h4>';
    echo "<font color='#2b7c92'> Page </font>";
    for($i=1;$i<=$num_page;$i++)
    {
       if($i==$page)
  {

   echo "$i";
  }
  else
  {

   echo'<a href="admin_home.php?search='.$search.'&p='.$i.'"> ' .$i. '  </a>';
  }
    }

    echo '</h4>';
  }
  if($num_page>1)
  {
   pagination($page,$num_page);
 }

			


//////////////////////////////////
				}
				
				
				
				else 
				{
					echo "<span id='content'><form method=post name=f1 action='admin_home.php'>";
				echo'
					      


<center>

<table class="ASOD_TH_25" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>

		<td class="ASOD_TH_25">
			<table class="ASOD_TABLE">
			<tbody><tr>

				<td valign="top" width="80"><b class="pageTitle">Group :</b>

				</td>

			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table>
			<tbody><tr>

				<td>';


//pagination starts here

if (isset($_GET['p']))
{
$p= $_GET['p'];
$page=$_GET['page'];


}

$page=$_REQUEST['p'];

$limit=15;
if($page=='')
{
$page=1;
$start=0;
}
else
{
$start=$limit*($page-1);
}




						
$cat=$_GET['cat'];
//Query to fetch group in the dropdownlist						 
$quer2="SELECT DISTINCT grp FROM base where exists (SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess)";
						

$v = OCIParse($conn, $quer2);
oci_bind_by_name($v, ":sess", $login_session);
							
OCIExecute($v, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if ($numrows==1)
{ 
							$v = OCIParse($conn, $quer2);
							oci_bind_by_name($v, ":sess", $login_session);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								foreach ($row as $item){
									echo '<td valign="top"><b class="pageTitle">'.$item.'</b>
										  </td>';
										  
										  $cat=$item;
										  $singleRow=1;
										 
										
										 
								}
							}
							
							
							
							
}
							 	
								else 
								{
									
								echo "<select name='cat' class='pageTitle' onchange=\"reload(this.form)\"><option value='' >SELECT</option>";
							$u = OCIParse($conn, $quer2);
							oci_bind_by_name($u, ":sess", $login_session);
										OCIExecute($u, OCI_DEFAULT);
							while ($row = oci_fetch_array($u, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$cat){echo "<option selected value='$item' >$item</option>"."<BR>";}
							else{echo  "<option value='$item' >$item</option>";}
																		}
							}
								echo "</select>";
								
								echo '<script> 
									{
                          function reload(form)
                                 {

                      var val=form.cat.options[form.cat.options.selectedIndex].value;

                      self.location="admin_home.php?cat=" + val ;

                                 }
					
                             } 
							 </script>';

								}
								oci_close($conn);
				


	
echo '

			</td>
			</tr>
			</tbody></table>
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table>
			<tbody><tr>

				<td valign="top" width="80" ><b class="pageTitle">Subgroup :</b>

				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table>
			<tbody><tr>

				<td>';

				$subcat=$_GET['subcat'];


							
						if(isset($cat) and strlen($cat) > 0){
							$quer="SELECT subgrp FROM base WHERE grp=:cat and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess) ";

							}

							

				//echo "<form method=post name=f2 action='admin_home.php'>";
				$v = OCIParse($conn, $quer);
				oci_bind_by_name($v, ":sess", $login_session);
				oci_bind_by_name($v, ":cat", $cat);
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
							$numrows = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							if ($numrows==1)
			    		   {$v = OCIParse($conn, $quer);
					   oci_bind_by_name($v, ":sess", $login_session);
				       oci_bind_by_name($v, ":cat", $cat);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								foreach ($row as $item){
									echo '<td valign="top"><b class="pageTitle">'.$item.'</b>
										  </td>';
									  $subcat=$item;
									 
									  
								}
							}
								
							}
							else
							{
				
				
				echo "<select name='subcat'  class='pageTitle' onchange=\"reload2(this.form)\"><option value='' >SELECT</option>";
							if(isset($cat) and strlen($cat) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email='$login_session') ";


							$v = OCIParse($conn, $quer);
							oci_bind_by_name($v, ":sess", $login_session);
							oci_bind_by_name($v, ":cat", $cat);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$subcat){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item' >$item</option>";}
																		}
							}
							
							}
						
							echo "</select>";
								
							
							
							
							 
							
							}
							oci_close($conn);
						echo '</td>
			</tr>
			</tbody></table>
		</td>
</tr>';

echo '<script> 
									{
                          function reload2(form)
                                 {

                      var val=form.subcat.options[form.subcat.options.selectedIndex].value;
					  var val2="'.$cat.'";
                      self.location="admin_home.php?cat=" + val2 + "&subcat=" + val;

                                 }
					
                             } 
							 </script>';

echo '</tr>

</tbody></table>

</center></form>';

echo '<script LANGUAGE="JavaScript">


$(document).ready(function(){

 $("div").hide();
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








$rs="SELECT userid,description FROM password_list  WHERE grp=:c and subgrp=:s and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e ) order by UPPER(userid)".
				"OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";

			if (isset($subcat)) {
				

echo "<center>"."<table class='ASOD_BODY' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody >"."<tr>".

"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='150' class='pageTitle' >"."<b>"."ID"."</b>".
				"</td>".
			"</tr>".
        "</tbody>"."</table>".
		"</td>".
		
		
		"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='150' class='pageTitle' >"."<b>"."Component"."</b>".
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
			oci_close($conn);}
			
			
else {
echo '<p align="center" >Select Group and Subgroup to get password list. </p>';
}
			$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":c", $cat);
			oci_bind_by_name($y, ":s", $subcat);
			oci_bind_by_name($y, ":e", $login_session);
			OCIExecute($y);
			$id=1;




			while (($res = oci_fetch_array($y, OCI_BOTH)) != false) {

			$id++;
			//$out=	Decrypt($pass, $res[2]);
				$out=	mc_decrypt($res[2], ENCRYPTION_KEY);
echo "<table class='ASOD_BODY' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>"."<td class='ASOD_TH_25'  >".
			"<table>".
			"<tbody>"."<tr>".

				"<td valign='top' width='150'  id='username$id' style='color:#535659;font-size:9pt'>"."$res[0]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".
		
		
				"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='150' id='component$id'  style='color:#535659;font-size:9pt'>"."$res[6]"."</b>".

				"</td>".
			"</tr>".
			"</tbody>"."</table>".
		"</td>".


		"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='600' id='desc$id'  style='color:#535659;font-size:9pt'>"."$res[1]"."</b>".

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

"</tr>"."</table></span>";



			}
			

$s = oci_parse($conn,"select count (*) from password_list where grp=:g and subgrp=:sb and exists  ( select grp,subgrp from base where password_list.grp=base.grp and password_list.subgrp=base.subgrp and exists (select subgroup from user_list where grp=:g and subgroup=:sb and email=:em) )");
oci_bind_by_name($s, ":g", $cat);
oci_bind_by_name($s, ":sb", $subcat);
oci_bind_by_name($s, ":em", $login_session);
$r = oci_execute($s);
$r = oci_fetch_all($s, $res);
	foreach ($res as $row) {
$rownum = htmlspecialchars($row[0], ENT_NOQUOTES, 'UTF-8');

}
$total=$rownum;

$num_page=ceil($total/$limit);


oci_close($conn);

echo '

</body></html>	
					
				';
				}
				
				?>


