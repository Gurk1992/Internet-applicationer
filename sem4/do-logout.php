<?php
/**
 * Logs user out.
 */
require_once 'classes/Comment/Controller/Controller.php';

$contr= new Controller();
$contr -> unsetlogin();
?>