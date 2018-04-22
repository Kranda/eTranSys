<?php 
session_start();

session_unset(); 
session_destroy(); 

  header("Location: http://localhost/etransys/schools/college/student/login.php");
?>

