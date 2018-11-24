<?php 
/**
 * Saves user comments.
 */

require_once 'classes/Comment/Controller/Controller.php';

if(isset($_POST['comment-submit'])){
        $comment=$_POST['comment'];
        $username = $_SESSION['user'];
        $receptId =$_POST['receptid'];
        $curpage = $_POST['curpage'];
        if(ctype_print($comment) && ctype_print($username)&&ctype_print($receptId)&&ctype_print($curpage)){

        $Contr = new Controller();
        $Contr->storeComment($comment, $username, $receptId, $curpage);
        }
        else{
                $_SESSION['commentMessage'] ='Only normal chars are allowed';
        } 
}
?>