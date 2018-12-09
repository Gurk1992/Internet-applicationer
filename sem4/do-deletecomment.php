<?php 
/**
 * deletes user comment
 */
namespace view;
use \Controller\Controller;
require_once 'classes/Comment/Controller/Controller.php';



    $postid = $_POST['postid'];
  
    
    if(ctype_print($postid)){
        $Contr = new Controller();
        $result = $Contr->deleteComment($postid);
        if($result === TRUE){
            echo json_encode('Comment has been deleted!');
        }
        if($result === FALSE){
            
            echo json_encode('Comment has been not been deleted!');
        }
    }
    else{
        
       echo json_encode('Only normal chars are allowed.');
    }

?>