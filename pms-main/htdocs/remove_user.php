 <?php
include ("session.php");
include("config.php");
?>
 
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>AE Password Management System</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
<link rel="stylesheet" href="js/alert/css/alertify.min.css" id="toggleCSS" />
<script src="js/alert/alertify.js"></script>
<link rel="stylesheet" href="ja/alert/css/alertify.css" />
 <!doctype html public "-//w3c//dtd html 3.2//en">   
 <SCRIPT language=JavaScript>

 
 
 function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='remove_user.php?cat=' + val ;
}



function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 
var val3=form.cat3.options[form.cat3.options.selectedIndex].value; 

self.location='remove_user.php?cat=' + val + '&subcat=' + val2 + '&cat3=' +val3;

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
	if(!isset($_SESSION['sadmin_user'])){
echo '<table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody>
	
	 <tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        <font color="#4c6d9a" size="1"><a href="admin_home.php">
                  Home</a>>&nbsp;<a href="admin_page.php">
                 <font>Admin</font></a>>&nbsp;
				 <a href="UserManagement.php">
                 <font>User Management</font></a>>&nbsp;
				 <a href="remove_user.php">
                 <font>Revoke Access</font></a>&nbsp;
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
				  <a href="UserManagement.php">
                 <font>User Management</font></a>>&nbsp;
				 <a href="remove_user.php">
                 <font>Revoke Access</font></a>&nbsp;
				 <font  color="#4c6d9a" size="1"  style="float:right">You are logged in as: '.$login_session.'</font>
	      </td>
    </tr>
	
   </tbody></table>';
   
  ?> 

<p>&nbsp;</p>

 <form method='get' id="remove" action="rm_user.php">
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

							$quer2="SELECT DISTINCT grp FROM base where exists (SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.admin= 'Y' and user_list.email='$login_session')"; 
						
						}

								echo "<form method=post name=f1 action='remove_user.php'>";
								$v = OCIParse($conn, $quer2);
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
							$numrows = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							if ($numrows==1)
							{ 
							$v = OCIParse($conn, $quer2);
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
                      self.location="remove_user.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
							}
							
							
							
							
							}
							else {

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
								echo '<script> 
									{
                          function reload(form)
                                 {

                      var val=form.cat.options[form.cat.options.selectedIndex].value;

                      self.location="remove_user.php?cat=" + val ;

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
						
						$quer="SELECT subgrp FROM base WHERE grp='$cat'";
						}

					else {

							
						if(isset($cat) and strlen($cat) > 0){
							$quer="SELECT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email='$login_session' and user_list.admin='Y') ";
							 
							}
						}
				
				
				$subcat=$_GET['subcat'];
				
				echo "<form method=post name=f2 action='remove_user.php'>";
				$v = OCIParse($conn, $quer);
				
							OCIExecute($v, OCI_DEFAULT);
							$results=array();
							$numrows = oci_fetch_all($v, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
							if ($numrows==1)
							{$v = OCIParse($conn, $quer);
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
                      self.location="remove_user.php?cat=" +  val "&subcat="+ val2;

                                 
					
                             } 
							 </script>';
								
							}
				           
							
							else 
							
							{ 
				echo "<select name='subcat' onchange=\"reload2(this.form)\" required><option value=''>Select one</option>";
							if(isset($cat) and strlen($cat) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email='$login_session') ";
							 
							
							$v = OCIParse($conn, $quer);
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
 
						?></td>
			</tr>
			</tbody></table>
		</td>
</tr>
<script> 
function reload2(form){
						     
							 var val="<?php echo "$cat";?>";
							var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

							self.location='remove_user.php?cat=' + val + '&subcat=' + val2 ;

						

                                 }
					
                              
							 </script> 
<tr>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td valign="top" width="225"><b class="pageTitle">User's email :</b>
				
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
			 $rs="SELECT email FROM user_list WHERE grp='$cat' and subgroup='$subcat'";
       
}				
				echo "<form method=post name=f3 action='remove_user.php'>";
				echo "<select name='cat3' id='cat3' onchange=\"reload3(this.form)\" required><option value=''>Select one</option>";
				
				
				
				$v = OCIParse($conn, $rs);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {
								
								foreach ($row as $item){
							if($item==$cat3){echo "<option selected value='$item'>$item</option>"."<BR>";}
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

			
		</td>
</tr>

</tr>
<tr>
		<td class="ASOD_TH_25" colspan="2">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
		<td colspan="2">	
		
		<tr> <p>&nbsp;</p>
		
              <input  type='button' id='button' value='Revoke Access' onclick="clicked();"/> 
			</tr>
			</tbody></table>
		</td>
		</td>
		
</tr>

</tr>
<script>
function clicked(){
	if(document.getElementById('cat3').value!='')
	alertify.confirm('Are you sure? ', function(){ document.getElementById('remove').submit(); }, function(){ return void(0);});
else
	alertify.alert('Please select users mail first! ');
}
</script>

</tbody></table>



</center>
</form>




</body></html>
