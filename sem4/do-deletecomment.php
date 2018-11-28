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
        $result = $Contr->deleteComment($postid, $curpage);
        if($result === TRUE){
            header("Location: ".$curpage."?Commentdeleted");
            $_SESSION['commentMessage']='Comment has been deleted!';
        }
        if($result === FALSE){
            header("Location: ".$curpage."?Deletefailed ");
            $_SESSION['commentMessage']='Comment has been not been deleted!';
        }
    }
    else{
        header("Location: ".$curpage."?Deletefailed ");
        $_SESSION['commentMessage']="Only normal chars are allowed.";
    }

}
?>