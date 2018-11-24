<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/comment.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/login.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/logout.php';
class Controller{

    public function setlogin($username, $password, $curpage){
        $login = new login($username, $password, $curpage);
        $login->loginAttempt();
    }
    public function unsetlogin(){
        $logout = new logout();
        $logout->logoutAttempt();
    }
    public function registeruser($username, $password, $curpage){
        $login = new login($username, $password, $curpage);
        $login->registerAttempt();
    }
    public function storeComment($comment, $username, $receptId, $curpage){
        $c = new comment();
        $c->storeComment($comment, $username, $receptId, $curpage);
    }
    public function showComment(){
        $commentGet= new comment();
        $result= $commentGet->showComment();
        return $result;
    }
    public function deleteComment($postid, $curpage){
        $deleteCom = new comment();
        $deleteCom->deleteComment($postid, $curpage);

    }
}
?>