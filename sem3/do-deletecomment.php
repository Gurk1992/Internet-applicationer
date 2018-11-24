<?php 
/**
 * deletes user comment
 */
require_once 'classes/Comment/Controller/Controller.php';

if(isset($_POST['comment-delete'])){
    $postid = $_POST['postid'];
    $curpage =$_POST['curpage'];
    if(ctype_print($postid) && ctype_print($curpage)){
        $Contr = new Controller();
        $Contr->deleteComment($postid, $curpage);
    }
    else{
        $_SESSION['commentMessage']="Only normal chars are allowed.";
    }

}
?>