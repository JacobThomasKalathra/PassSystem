<?Php
include ("session.php");
include("config.php");
//$cat=$_GET['cat'];
//Query to fetch group in the dropdownlist						 
$quer2="SELECT DISTINCT grp FROM base where exists (SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess)";
						
echo "<form method=post name=f1  action='group.php'>";
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
									echo "$item";
										  
										  $cat=$item;
										  $singleRow=1;
										 
										
										 
								}
							}
							
							
							
							
}
							 	
								else 
								{
									
								echo "<select name='cat'  class='form-control' onchange=\"this.form.submit();\"><option value=''>Group</option>";
							$u = OCIParse($conn, $quer2);
							oci_bind_by_name($u, ":sess", $login_session);
										OCIExecute($u, OCI_DEFAULT);
							while ($row = oci_fetch_array($u, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$_POST[cat]){echo "<option selected value='$item'>$_POST[cat]</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
								echo "</select>";
								
								$cat=$_POST[cat];

								}
								oci_close($conn);
				?>