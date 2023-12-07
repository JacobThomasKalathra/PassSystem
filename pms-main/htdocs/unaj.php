<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>

		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>

				<td valign="top" width="80"><b class="pageTitle">Group :</b>

				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>

				<td>

<?Php
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
						
echo "<form method=post name=f1 action='admin_home.php'>";
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
									
								echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
							$u = OCIParse($conn, $quer2);
							oci_bind_by_name($u, ":sess", $login_session);
										OCIExecute($u, OCI_DEFAULT);
							while ($row = oci_fetch_array($u, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$cat){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
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
				?>


	


			</td>
			</tr>
			</tbody></table>
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>

				<td valign="top" width="80"><b class="pageTitle">Subgroup :</b>

				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>

				<td><?php

				$subcat=$_GET['subcat'];


							
						if(isset($cat) and strlen($cat) > 0){
							$quer="SELECT subgrp FROM base WHERE grp=:cat and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess) ";

							}

							

				echo "<form method=post name=f2 action='admin_home.php'>";
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
				
				
				echo "<select name='subcat' onchange=\"reload2(this.form)\"><option value=''>Select one</option>";
							if(isset($cat) and strlen($cat) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email='$login_session') ";


							$v = OCIParse($conn, $quer);
							oci_bind_by_name($v, ":sess", $login_session);
							oci_bind_by_name($v, ":cat", $cat);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$subcat){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
							
							}
						
							echo "</select>";
								
							
							
							
							 
							
							}
							oci_close($conn);
						?></td>
			</tr>
			</tbody></table>
		</td>
</tr>

<script> 
function reload2(form){
						
var val="<?php echo "$cat";?>";
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='admin_home.php?cat=' + val + '&subcat=' + val2;
}
</script> 

</tr>

</tbody></table>

</center>
</form>

<script LANGUAGE='JavaScript'>


$(document).ready(function(){

 $("div").hide();
 $(".submit").click(function(){
var divname= this.id;
var value= $("#divs"+divname).text();
var desc= $("#desc"+divname).text();
var uid= $("#username"+divname).text();
var cat="<?php echo $cat?>";
var sc="<?php echo $subcat?>";
$(function(){
    $.ajax({
      type: "POST",
      url: 'action.php',
      data: {un:uid, dsc:desc ,ct:cat,sct:sc},
      success: function(password) {
       alertify.alert(password);
      }
    });
  });

    });

});


  
</script>





<?php

$rs="SELECT userid,description FROM password_list  WHERE grp=:c and subgrp=:s and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:e ) order by UPPER(userid)".
				"OFFSET $start ROWS FETCH NEXT $limit ROWS ONLY ";

			if (isset($subcat)) {
				

echo "<center>"."<table class='ASOD_TABL' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>".
"<tbody>"."<tr>".

"<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='200' class='pageTitle' >"."<b>"."ID"."</b>".
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
echo "<table class='pms' cellpadding='0' cellspacing='0' border='0' oncontextmenu='return false;'  style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;'
 unselectable='on'
 onselectstart='return false;'
 onmousedown='return false;'>"."<tr>"."<td class='ASOD_TH_25' >".
			"<table cellpadding='5' cellspacing='5' border='0'>".
			"<tbody>"."<tr>".

				"<td valign='top' width='200' id='username$id' style='color:#535659;font-size:9pt'>"."$res[0]"."</b>".

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

"</tr>"."</table>";



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

 function pagination($page,$num_page)
  {
    echo '<h4>';
    echo "<font color='#2b7c92'> Page </font>";
    $subcat=$_GET['subcat'];
    $cat=$_GET['cat'];
    for($i=1;$i<=$num_page;$i++)
    {
       if($i==$page)
  {

   echo "$i";
  }
  else
  {
   echo'<a href="admin_home.php?cat='.$cat.'&subcat='.$subcat.'&p='.$i.'"> ' .$i. '      </a>';
  }
    }

    echo '</h4>';
  }
  if($num_page>1)
  {
   pagination($page,$num_page);
 }
oci_close($conn);
?>


</html>



</body></html>
