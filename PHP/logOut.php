<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../PHP/layout.php");
      exit();
   }
?>