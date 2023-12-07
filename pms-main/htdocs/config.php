<?php
error_reporting(0);
   $dbhost = 'psdbs067.appsdev1.fusionappsdphx1.oraclevcn.com';
   $dbpass = 'emdbo';
   $db = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=psdbs067.appsdev1.fusionappsdphx1.oraclevcn.com)(PORT=1521))(CONNECT_DATA=(SID=aepmsmst)))' ;
   $conn = oci_connect('EMDBO', $dbpass, $db);
?>