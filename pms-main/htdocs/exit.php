<?php
   session_start();
  unset ($_SESSION['sadmin_user']);
   if(session_destroy()) {
      header("Location: logout.php");
   }
?>