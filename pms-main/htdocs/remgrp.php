<?php
include ("session.php");
include("config.php");
if(!isset($sadmin_check)){header("location:login.php");}
?>
 
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
 <!doctype html public "-//w3c//dtd html 3.2//en">   
 <SCRIPT language=JavaScript>

 
 
 function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='remgrp.php?cat=' + val ;
}



</script>
</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">AE Password Management System</span></td>
      <td valign="bottom" align="right">
            	<?php if(!isset($_SESSION['sadmin_user'])){ echo '<a href="admin_home.php" class="eLink">
                  <b>Home</b></a>&nbsp;
		          <a href="admin_page.php" class="eLink">
				<font color="gold">Admin</font></a>&nbsp;<a href="logout.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;';}
				else
					echo '<a href="admin_page.php" class="eLink">
				<font color="gold">Home</font></a>&nbsp;
				<a href="exit.php" class="eLink">
                  <font color="coral">Logout</font></a>&nbsp;';

				?>
	          
      </td>
    </tr>
	</tbody></table>

 <?php
	if(isset($_SESSION['sadmin_user'])){
echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_page.php">
                  Home</a>>&nbsp;
				  <a href="GroupSubManagement.php">
                 <font>Group & Subgroup Management</font></a>>&nbsp;
				 <a href="remgrp.php">
                 <font>Remove Group</font></a>&nbsp;
				<font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
	}

		
   
  ?> 

<p>&nbsp;</p>

 <form method=get action="rem_grp.php">
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

							$quer2="SELECT DISTINCT grp FROM base"; 
 
							

								echo "<form method=post name=f1 action='remgrp.php'>";

								echo "<select name='cat' onchange=\"reload(this.form)\" required><option value=''>Select one</option>";
							$u = OCIParse($conn, $quer2);
										OCIExecute($u, OCI_DEFAULT);
							while ($row = oci_fetch_array($u, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							if($item==$cat){echo "<option selected value='$item'>$item</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
								echo "</select>";

								
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
				
				<td valign="top" width="225"><b class="pageTitle">Removing <?php echo "$cat"; ?> Group will delete these Subgroups also:</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td>
				<?Php

						

							$quer3="SELECT DISTINCT subgrp FROM base where grp='$cat'"; 
 
							

								echo "<form method=post name=f2 action='addsbgrp.php'>";

								
							$u = OCIParse($conn, $quer3);
										OCIExecute($u, OCI_DEFAULT);
							while ($row = oci_fetch_array($u, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							echo '<p style="color:red" class="pageTitle" > '.$item.'</p>';
																		}
							}
								echo "</select>";
					
						
				?>
				</td>
			</tr>
			</tbody></table>
		</td>
			
			
			</tr>
<tr>
		
</tr>

			
		</td>

<tr>
		<td class="ASOD_TH_25" colspan="2">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
			
				
		<td colspan="2">	
		
		<tr> <p>&nbsp;</p>
		
		<input class='submit' value='Remove' type='submit'>
               
			</tr>
			</tbody></table>
		</td>
		</td>
		
</tr>

</tr>


</tbody></table>

</center>
</form>




</body></html>
