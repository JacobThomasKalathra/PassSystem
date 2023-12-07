<?php
include ("session.php");
include ("encdec.php");


include("config.php");
if(!isset($_SESSION['sadmin_user'])){
	if(!isset($_SESSION['admin_user']))
      header("location:Home.php");
   }
?>
 
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
 <!doctype html public "-//w3c//dtd html 3.2//en">   
 <SCRIPT language=JavaScript>

 
 




</script>
</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
		          <a href="admin_page.php" class="eLink">
                 <font color="gold">Admin</font></a>&nbsp;
		          <a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;
	          
      </td>
    </tr>
	</tbody></table>

<?php
	if(!isset($_SESSION['sadmin_user'])){
echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_home.php">
                  Home</a>>&nbsp;<a href="admin_page.php">
                 <font>Admin</font></a>>&nbsp;
				 <a href="PasswordManagement.php">
                 <font>Password Management</font></a>>&nbsp;
				 <a href="updatepass.php">
                 <font>	Update</font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
	}
	else
		echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;>
				  <a href="PasswordManagement.php">
                 <font>Password Management</font></a>>&nbsp;
				 <a href="updatepass.php">
                 <font>	Update </font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
   
  ?> 

<p>&nbsp;</p>


 <form method="get" action="update_pass.php">
<center>

<table class="ASOD_TABLE" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">Group :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
				<?Php

						@$cat=$_GET['cat']; 
						
						if(isset($sadmin_check)){
						$quer2="SELECT DISTINCT grp FROM base";
						
						}

					else {

							$quer2="SELECT DISTINCT grp FROM base where exists (SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.admin= 'Y' and user_list.email=:sess)"; 
						
						}

								echo "<form method=post name=f1 action='updatepass.php'>";
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
										  $_GET[cat]=$cat;
										  $singleRow=1;
										 
										
										 
								}
								echo '<script> 
									{
                         
                                 
                      
						var val = "'.$cat.'";
						var val2 ="'.$subcat.'";
                      self.location="updatepass.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
							
							}
							
							}
							else {

								echo "<select name='cat' onchange=\"reload(this.form)\" required><option value=''>Select one</option>";
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

                      self.location="updatepass.php?cat=" + val ;

                                 }
					
                             } 
							 </script>';
							}
					
						
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
				
				<td valign="top" width="225"><b class="pageTitle">Sub Group :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><?php
				if(isset($sadmin_check)){
						
						$quer="SELECT subgrp FROM base WHERE grp=:cat";
						}

					else {

							
						if(isset($cat) and strlen($cat) > 0){
							$quer="SELECT subgrp FROM base WHERE grp=:cat and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess and user_list.admin='Y') ";
							 
							}
						}
				
				$subcat=$_GET['subcat'];
				
				echo "<form method=post name=f2 action='updatepass.php'>";
				$v = OCIParse($conn, $quer);
				oci_bind_by_name($v, ":cat", $cat);
				oci_bind_by_name($v, ":sess", $login_session);
				
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
							$numrows = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							if ($numrows==1)
							{$v = OCIParse($conn, $quer);
										oci_bind_by_name($v, ":cat", $cat);
										oci_bind_by_name($v, ":sess", $login_session);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								foreach ($row as $item){
									echo '<td valign="top"><b class="pageTitle">'.$item.'</b>
										  </td>';
								}
							}
								
								$subcat=$item;
								$_GET['subcat']=$item;
								
								echo '<script> 
									{
                         
                                 
                      
						var val = "'.$cat.'";
						var val2 ="'.$subcat.'";
                      self.location="updatepass.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
								
							}
				           
							
							else 
							
							{ 
							echo "<select name='subcat' onchange=\"reload2(this.form)\" required><option value=''>Select one</option>";
							$v = OCIParse($conn, $quer);
											oci_bind_by_name($v, ":cat", $cat);
											oci_bind_by_name($v, ":sess", $login_session);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							if($item==$subcat){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
							echo "</select>";
							}
								
								
                                   
						?></td>
			</tr>
			</tbody></table>
		</td>
</tr>


<script> 
function reload2(form){
						     
							 var val="<?php echo "$cat";?>";
							var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

							self.location='updatepass.php?cat=' + val + '&subcat=' + val2 ;

						

                                 }
					
					
					function reload3(form)
{
var val="<?php echo "$cat"; ?>";
var val2="<?php echo "$subcat"; ?>";
var val3=form.cat3.options[form.cat3.options.selectedIndex].value; 

self.location='updatepass.php?cat=' + val + '&subcat=' + val2 + '&cat3=' +val3;

}
					
					function reload4(form)
{
var val="<?php echo "$cat"; ?>";
var val2="<?php echo "$subcat"; ?>";
var val3=form.cat3.options[form.cat3.options.selectedIndex].value; 
var val4=form.cat6.options[form.cat6.options.selectedIndex].value; 
self.location='updatepass.php?cat=' + val + '&subcat=' + val2 + '&cat3=' +val3 + '&cat6=' +val4;

}
                              
							 </script> 

<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">ID :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				<?php
				
         @$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
         if(isset($subcat) and strlen($subcat) > 0){
			 $rs="SELECT distinct userid FROM password_list WHERE grp=:g and subgrp=:s";
       
}				
				echo "<form method=post name=f3 action='updatepass.php'>";
				echo "<select name='cat3' onchange=\"reload3(this.form)\" required><option value=''>Select one</option>";
				
				
				if(isset($subcat) and strlen($subcat) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							
							$v = OCIParse($conn, $rs);
								  oci_bind_by_name($v, ":g", $cat);
								  oci_bind_by_name($v, ":s", $subcat);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							if($item==$cat3){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
							}
								echo "</select>";
 
						?>
				
				
				
				</td>
				
				
			</tr>
			</tbody></table>
		</td>
</tr>

			
		</td>
</tr>
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">Description :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td class="pageTitle"><?php
				
         @$cat6=$_GET['cat6'];
		  @$cat6=filter_var(@$cat6, FILTER_SANITIZE_STRING);
         if(isset($cat3) and strlen($cat3) > 0){
			 $rs="SELECT description FROM password_list WHERE grp=:c and subgrp=:d and userid=:e";
       
}				
				echo "<form method=post name=f4 action='updatepass.php'>";
				echo "<select name='cat6' onchange=\"reload4(this.form)\" required><option value=''>Select one</option>";
				
				
				
							if(isset($cat3) and strlen($cat3) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							
							$v = OCIParse($conn, $rs);
								  oci_bind_by_name($v, ":c", $cat);
								  oci_bind_by_name($v, ":d", $subcat);
								  oci_bind_by_name($v, ":e", $cat3);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							if($item==$cat6){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
							}
								echo "</select>";
 
						?></td>
				
			
			</tr>
			</tbody></table>
		</td>
</tr>

<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Password :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td class="pageTitle"><?php
				
         @$cat4=$_GET['pswd']; 
		  @$cat4=filter_var(@$cat4, FILTER_SANITIZE_STRING);
         if(isset($cat3) and strlen($cat3) > 0){
			 $rs="SELECT password FROM password_list WHERE grp=:c and subgrp=:d and userid=:e and description=:f";
       
}				
						if(isset($cat6) and strlen($cat6) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							
							$v = OCIParse($conn, $rs);
								  oci_bind_by_name($v, ":c", $cat);
								  oci_bind_by_name($v, ":d", $subcat);
								  oci_bind_by_name($v, ":e", $cat3);
								  oci_bind_by_name($v, ":f", $cat6);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
									$out=mc_decrypt($item, ENCRYPTION_KEY);
									$out1=trim($out);
						
							echo  "<input type='text' name='pswd' value='$out1' required></text>"; 
																		}
							}
							}
								
 
						?></td>
				
			
			</tr>
			</tbody></table>
		</td>
</tr>


<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Component :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td class="pageTitle"><?php
				
         @$cat4=$_GET['pswd']; // This line is added to take care if your global variable is off
         if(isset($cat3) and strlen($cat3) > 0){
			 $rs="SELECT component FROM password_list WHERE grp=:c and subgrp=:d and userid=:e and description=:f";
       
}				
						if(isset($cat6) and strlen($cat6) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							
							$v = OCIParse($conn, $rs);
								  oci_bind_by_name($v, ":c", $cat);
								  oci_bind_by_name($v, ":d", $subcat);
								  oci_bind_by_name($v, ":e", $cat3);
								  oci_bind_by_name($v, ":f", $cat6);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
									
						
							echo  "<input type='text' name='comp' value='$item' required></text>"; 
																		}
							}
							}
								
 
						?></td>
				
			
			</tr>
			</tbody></table>
		</td>
</tr>






<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Description :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td class="pageTitle"><?php
				
         @$cat5=$_GET['desc']; // This line is added to take care if your global variable is off
		  @$cat5=filter_var(@$cat5, FILTER_SANITIZE_STRING);
         if(isset($cat6) and strlen($cat6) > 0){
			 $rs="SELECT description FROM password_list WHERE grp=:c and subgrp=:d and userid=:e and description=:f";
       
}				
						if(isset($cat3) and strlen($cat3) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							
							$v = OCIParse($conn, $rs);
								  oci_bind_by_name($v, ":c", $cat);
								  oci_bind_by_name($v, ":d", $subcat);
								  oci_bind_by_name($v, ":e", $cat3);
								  oci_bind_by_name($v, ":f", $cat6);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
						
							echo  "<textarea row='5'  cols='40' required name='desc'>$item</textarea>"; 
																		}
							}
							}
								
   
						?></td>
				
			
			</tr>
			</tbody></table>
		</td>
</tr>






</tr>
<tr>
		<td class="ASOD_TH_25" colspan="2">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
		<td colspan="2">	
		
		<tr> <p>&nbsp;</p>
		
		<input class='submit' value='Update' type='submit'>
               
			</tr>
			</tbody></table>
		</td>
		</td>
		
</tr>

</tr>

</tbody>

</table>
</center>

</form>




</body></html>
