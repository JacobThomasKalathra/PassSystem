<?php 
include ("session.php");
include("config.php");
include("encdec.php");
$u=$_POST['un'];
$d=$_POST['id'];
$c=$_POST['ct'];
$e=$_POST['sct'];
$rs="SELECT password FROM password_list where id =:v and userid=:u and grp=:w and subgrp=:x and EXISTS ( SELECT email FROM user_list WHERE user_list.subgroup = password_list.subgrp and user_list.grp= password_list.grp and user_list.email=:y )";
			$y = OCIParse($conn, $rs);
			oci_bind_by_name($y, ":u", $u);
			oci_bind_by_name($y, ":v", $d);
			oci_bind_by_name($y, ":w", $c);
			oci_bind_by_name($y, ":x", $e);
			oci_bind_by_name($y, ":y", $login_session);
			OCIExecute($y);
$res = oci_fetch_array($y, OCI_BOTH) ;
	$out=	mc_decrypt($res[0], ENCRYPTION_KEY);
	echo "$out";
	function password () {
		return $out;
	};		


?>