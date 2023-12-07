<?php
include ("session.php");
include("config.php");
?>
 
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>(PDIT PDS Management System)</title>
<link rel="stylesheet" type="text/css" href="home_files/ASOD.css">
 <!doctype html public "-//w3c//dtd html 3.2//en">   
 <SCRIPT language=JavaScript>

 
 
 function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='Home.php?cat=' + val ;
}

function reload2(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='Home.php?cat=' + val + '&subcat=' + val2 ;

}

function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 
var val3=form.cat3.options[form.cat3.options.selectedIndex].value; 

self.location='Home.php?cat=' + val + '&subcat=' + val2 + '&cat3=' +val3;

}

</script>
</head>
<body>


    <table cellpadding="0" cellspacing="10" width="100%" background="home_files/headerBg.jpg" border="0">
    <tbody><tr height="25">
      <td valign="center" width="100"><img src="home_files/logo.gif"></td>
      <td valign="center"><span class="appName">PDIT PDS Management System</span></td>
      <td valign="bottom" align="right">
            	<a href="http://den01gvr.us.oracle.com/home.php" class="eLink">
                  <b>Home</b>              </a>&nbsp;
		          
		          <a href="logout.php" class="eLink">
                  Logout             </a>&nbsp;
	          
      </td>
    </tr>
	</tbody></table>

    <table cellpadding="1" cellspacing="0" width="100%" border="0">
    <tbody><tr bgcolor="#eaeff5">
	      <td valign="center">&nbsp;&nbsp;
	        
	      </td>
    </tr>
   </tbody></table>

<p>&nbsp;</p>

 <form method=post action="Home.php">
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

							$quer2="SELECT DISTINCT grp FROM base where exists (SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session')";  
 
							if(isset($cat) and strlen($cat) > 0){
							$quer="SELECT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT guid FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.guid='$login_session') ";
							 
							}

								echo "<form method=post name=f1 action='Home.php'>";

								echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
							foreach ($dbo->query($quer2) as $noticia2) {
							if($noticia2['grp']==@$cat){echo "<option selected value='$noticia2[grp]'>$noticia2[grp]</option>"."<BR>";}
							else{echo  "<option value='$noticia2[grp]'>$noticia2[grp]</option>";}
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
				
				<td valign="top" width="225"><b class="pageTitle">Sub Group :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td><?php
				
				$subcat=$_GET['subcat'];
				
				echo "<form method=post name=f2 action='Home.php'>";
				echo "<select name='subcat' onchange=\"reload2(this.form)\"><option value=''>Select one</option>";
							foreach ($dbo->query($quer) as $noticia) {
								if ($noticia['subgrp']==@$subcat){echo "<option selected value='$noticia[subgrp]'>$noticia[subgrp]</option>"."<BR>";}
						        else echo  "<option value='$noticia[subgrp]'>$noticia[subgrp]</option>";
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
			 $rs="SELECT userid FROM password_list WHERE grp='$cat' and subgrp='$subcat' and EXISTS ( SELECT guid FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.guid='$login_session')";
       
}				
				echo "<form method=post name=f3 action='Home.php'>";
				echo "<select name='cat3' onchange=\"reload3(this.form)\"><option value=''>Select one</option>";
				
				
				
							foreach ($dbo->query($rs) as $ans) {
								if ($ans['userid']==@$cat3){echo "<option selected value='$ans[userid]'>$ans[userid]</option>"."<BR>";}
						        else echo  "<option value='$ans[userid]'>$ans[userid]</option>";
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
				
				<td valign="top" width="225"><b class="pageTitle">Description :</b>
				
				</td>
			</tr>
			</tbody></table>
		</td>
		<td class="ASOD_TH_25">
			<table cellpadding="5" cellspacing="5" border="0">
			<tbody><tr>
				
				<td class="pageTitle"><?php 
				
			$ans[password]="Please select all values!"	;
			$rs="SELECT userid,password,description FROM password_list WHERE grp='$cat' and subgrp='$subcat'and userid='$cat3' and EXISTS ( SELECT guid FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.guid='$login_session')";
            foreach ($dbo->query($rs) as $ans) {
			echo "$ans[description]"; }
			$_POST['userid']=$ans[userid]; 
				$_POST['password']=$ans[password]; ?></td>
				
			
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
		<script>
		function show_alert()
 {
	 
 alert('<?php echo "$ans[password]" ; ?>');
	 
 }
</script>
		
			 <input type=submit onclick="show_alert();" value="Submit">
               
			</tr>
			</tbody></table>
		</td>
		
</tr>

</tr>

</tbody></table>

</center>
</form>




</body></html>
