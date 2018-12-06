<?php
namespace View;
/**
 * Logs user out.
 */
session_start();  
unset($_SESSION['user']);  
session_destroy();  
header("Location:index.php");  
?>