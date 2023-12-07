<?php
include ("session.php");
include("config.php");
  // session_start();
   session_destroy();
   header("Location: https://login.oracle.com/oam/server/logout");
   //if(session_destroy()) {
     // header("Location: index.html");
   //}
?>