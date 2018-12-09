<?php
/**
 * Logs user out.
 */
require_once 'classes/Comment/Controller/Controller.php';

session_start();  
unset($_SESSION['user']);  
session_destroy();  
header("Location:index.php");  
?>