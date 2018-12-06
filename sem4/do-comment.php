<?php 
/**
 * Saves user comments.
 */

require_once 'classes/Comment/Controller/Controller.php';

if(isset($_POST['commentsubmit'])){
        $comment=$_POST['comment'];
        $username = $_SESSION['user'];
        $receptId =$_POST['receptId'];
       
        if(ctype_print($comment) && ctype_print($username)&&ctype_print($receptId)){

                $Contr = new Controller();
                $result = $Contr->storeComment($comment, $username, $receptId);
                if($result === TRUE){
               echo 'Comment has been created!';

                }
                if($result === FALSE){
                echo 'comment has not been created'; 
                }
        }
        else{
                echo 'Only normal chars are allowed';
        } 
}
?>