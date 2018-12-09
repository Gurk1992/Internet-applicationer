<?php
header( "Cache-Control: max-age=<30> Content-type: application/json"); 
    /**
     * header( "Cache-Control: max-age=<30> Content-type: application/json"); 
     * View for user comments.
     * Shows all comments for specific recipes.
     */
     use \Controller\Controller;
    require_once '../../classes/Comment/Controller/Controller.php';
    
    $contr = new Controller();

    echo json_encode($contr->showComment($_POST['receptid']));


?>

