<?php 
/**
 * deletes user comment
 */
require_once 'classes/Comment/Controller/Controller.php';

if(isset($_POST['commentdelete'])){
    $postid = $_POST['postid'];
    
    if(ctype_print($postid)){
        $Contr = new Controller();
        $result = $Contr->deleteComment($postid);
        if($result === TRUE){
            echo'Comment has been deleted!';
        }
        if($result === FALSE){
            
            echo 'Comment has been not been deleted!';
        }
    }
    else{
        
       echo "Only normal chars are allowed.";
    }

}
?>