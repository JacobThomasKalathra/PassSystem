 <?php

require "config.php"; // Your Database details 
?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>

<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='aw.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='aw.php?cat=' + val + '&cat3=' + val2 ;
}

</script>
</head>

<body>
<?php

///////// Getting the data from Mysql table for first list box//////////
$quer2=mysql_query("SELECT DISTINCT grp from base"); 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer=mysql_query("SELECT DISTINCT subgrp from base WHERE grp='$cat'"); 
}//else{$quer=mysql_query("SELECT DISTINCT GSCode,GStudNo,GSem,GYear,Grade FROM grade order by GSCode"); } 
////////// end of query for second subcategory drop down list box ///////////////////////////
//$quer2=mysql_query("SELECT DISTINCT GSCode,GStudNo,GSem,GYear,Grade FROM grade"); 

/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3) and strlen($cat3) > 0){
$quer3=mysql_query("SELECT userid FROM password_list where subgrp='$cat3'"); 
}//else{$quer3=mysql_query("SELECT DISTINCT GSem,GYear,Grade FROM grade"); } 
////////// end of query for third subcategory drop down list box ///////////////////////////


echo "<form method=post name=f1 action='Test.php'>";
//////////        Starting of first drop downlist /////////
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
while($noticia2 = mysql_fetch_array($quer2)) { 
if($noticia2['grp']==@$cat){echo "<option selected value='$noticia2[grp]'>$noticia2[grp]</option>"."<BR>";}
else{echo  "<option value='$noticia2[grp]'>$noticia2[grp]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat' onchange=\"reload3(this.form)\"><option value=''>Select one</option>";
while($noticia = mysql_fetch_array($quer)) { 
if(empty($noticia['subgrp']) AND $noticia['subgrp']==@$cat3){echo "<option selected value='$noticia[subgrp]'>$noticia[subgrp]</option>"."<BR>";}
else{echo  "<option value='$noticia[subgrp]'>$noticia[subgrp]</option>";}
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////
echo "<select name='subcat3' ><option value=''>Select one</option>";
while($noticia = mysql_fetch_array($quer3)) { 
echo  "<option value='$noticia[userid]'>$noticia[userid]</option>";
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////


echo "<input type=submit value='Submit the form data'></form>";
?>

</body>

</html