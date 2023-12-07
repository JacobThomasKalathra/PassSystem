<?php
include ("session.php");
include("config.php");

if(isset($cat) and strlen($cat) > 0){
$quer="SELECT subgrp FROM base WHERE grp=:cat and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email=:sess) ";

							}

							

				echo "<form method=post name=f2 action='home.php'>";
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
									echo "$item";
									  $subcat=$item;
									 
									  
								}
							}
								
							}
							else
							{
				
				
				echo "<select name='subcat' class='form-control' onchange=\"this.form.submit();\"><option value=''>Subgroup</option>";
							if(isset($cat) and strlen($cat) > 0){
							//$quer="SELECT DISTINCT subgrp FROM base WHERE grp='$cat' and EXISTS ( SELECT email FROM user_list WHERE base.subgrp = user_list.subgroup and base.grp= user_list.grp and user_list.email='$login_session') ";


							$v = OCIParse($conn, $quer);
							oci_bind_by_name($v, ":sess", $login_session);
							oci_bind_by_name($v, ":cat", $cat);
							OCIExecute($v, OCI_DEFAULT);
							while ($row = oci_fetch_array($v, OCI_RETURN_NULLS+OCI_ASSOC)) {

								foreach ($row as $item){
							if($item==$_POST[subcat]){echo "<option selected value='$item'>$_POST[subcat]</option>"."<BR>";}
							else{echo  "<option value='$item'>$item</option>";}
																		}
							}
							
							}
						
							echo "</select>";
							$subcat=$_POST[subcat];
							
							
							
							 
							
							}
							oci_close($conn);
						?>