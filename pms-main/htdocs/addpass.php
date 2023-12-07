<?php
include ("session.php");
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

 
 
 function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='addpass.php?cat=' + val ;
}

function reload2(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='addpass.php?cat=' + val + '&subcat=' + val2 ;

}

function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 
var val3=form.cat3.options[form.cat3.options.selectedIndex].value; 

self.location='addpass.php?cat=' + val + '&subcat=' + val2 + '&cat3=' +val3;

}

</script>
</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="admin_home.php" class="eLink">
                  <b>Home</b>              </a>&nbsp;
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
				 <a href="addpass.php">
                 <font>Add User-ID & Password</font></a>&nbsp;
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
				 <a href="addpass.php">
                 <font>Add User-ID & Password</font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
   
  ?> 

<p>&nbsp;</p>

 <form name="addpass" method="get" action="add_pass.php">
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

								echo "<form method=post name=f1 action='addpass.php'>";
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
                      self.location="addpass.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
							
							}
							
							}
							else {

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

                      self.location="addpass.php?cat=" + val ;

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
				
				echo "<form method=post name=f2 action='addpass.php'>";
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
                      self.location="addpass.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
								
							}
				           
							
							else 
							
							{ 
							echo "<select name='subcat' onchange=\"reload2(this.form)\"><option value=''>Select one</option>";
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

							self.location='addpass.php?cat=' + val + '&subcat=' + val2 ;

						

                                 }
					
                              
							 </script> 



<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* User ID:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input type="text" name="id" value="<?php if(isset($_POST["id"])) echo "$_POST[id]"; ?>" maxlength="16" required>
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>
			
			
	<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Password:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
				<input type="password" placeholder="Password" name ="pass" class="masked"  maxlength="16" id="pass"  required>

				
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>	
			
			
			
			
			
			
			<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Re-Type Password:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input type="password" name="pass2" id="pass2" placeholder="Re-type Password" maxlength="16" required>
				
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>
<script src="js/jquery.min.js"></script>			
<script src="js/hideShowPassword.js"></script> 
<script src="js/modernizr.custom.js"></script>
<script>

$('#pass').hideShowPassword({
innerToggle: true

});

</script>
			
			
<script>
var pass =document.getElementById("pass");
var pass2 =document.getElementById("pass2");

function validatePassword(){
  if(pass.value != pass2.value) {
	  
    pass2.setCustomValidity("Passwords Don't Match");
	
	
	
  } else {
    pass2.setCustomValidity('');
  }
}

pass.onchange = validatePassword;
pass2.onkeyup = validatePassword;
				</script>			


				
				
				
				
<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Component:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input pattern =".{4,}" type="text" name="comp" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required title="Minimum 4 characters required">
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>	

			
<tr>
			
			
			<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">* Description:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				
			
				<input pattern =".{16,}" type="text" name="desc" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required title="Minimum 16 characters required">
				</td>
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
		
		       <input class='submit' value='SAVE' type='submit'>
			 
			 
               
			</tr>
			</tbody></table>
		</td>
		
</tr>

</tr>

</tbody></table>

</center>
</form>




</body></html>
