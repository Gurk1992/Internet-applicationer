<?php 
namespace View;
/**
 * Saves user comments.
 */
use \Controller\Controller;
require_once 'classes/Comment/Controller/Controller.php';
session_start();
if(isset($_POST['comment-submit'])){
        if(!empty($_POST['comment'])&& !empty($_POST['receptid']) &&!empty($_POST['curpage'])){
                $comment=$_POST['comment'];
                $username = $_SESSION['user'];
                $receptId =$_POST['receptid'];
                $curpage = $_POST['curpage'];
                if(ctype_print($comment) && ctype_print($username)&&ctype_print($receptId)&&ctype_print($curpage)){

                        $Contr = new Controller();
                        $result = $Contr->storeComment($comment, $username, $receptId, $curpage);
                        if($result === TRUE){
                                header("Location: ".$curpage."?CommentCreated ");
                                $_SESSION['commentMessage'] ='Comment has been created!';

                        }
                         if($result === FALSE){
                                header("Location: ".$curpage."?Commentfailed ");
                                $_SESSION['commentMessage'] ='comment has not been created'; 
                        }
                }
                else{
                        header("Location: ".$curpage."?Commentfailed ");
                        $_SESSION['commentMessage'] ='Only normal chars are allowed';
                } 
        }
        else{
                header("Location: ".$curpage."?Commentfailed ");
                $_SESSION['commentMessage'] ='All fields are required';
        }
}
?>