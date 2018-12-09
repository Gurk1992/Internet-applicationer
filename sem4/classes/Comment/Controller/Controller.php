<?php
namespace Controller;

use Model\comment;
use Model\login;
use DTO\commentDTO;
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/comment.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/login.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/DTO/commentDTO.php';

class Controller{
    /**
     * logs user in
     * 
     * returns true if sucessfull otherwise false.
     */
    public function setlogin($username, $password ){
        $login = new login($username, $password );
        $result = $login->loginAttempt();
        return $result; 
    }
   /**
     * logs user out
     * 
     */
    public function unsetlogin(){
        $logout = new logout();
        $logout->logoutAttempt();
    }
    /**
     * Registers new user.
     * 
     * returns true if sucessfull otherwise false.
     */
    public function registeruser($username, $password ){
        $login = new login($username, $password );
        $result= $login->registerAttempt();
        return $result;
    }
    /**
     * stores comment in database
     * 
     * returns true if sucessfull otherwise false.
     */
    public function storeComment($comment, $username, $receptId){
        $c = new comment();
        $result = $c->storeComment($comment, $username, $receptId);
        return $result; 
    }
    /**
     *  shows all stored comments.
     * 
     * returns array with information of the comment.
     */
    public function showComment($receptid){
        $commentGet= new comment();
        return $commentGet->showComment($receptid);
    }
    /**
     * deletes comment
     * 
     * returns true if sucessfull otherwise false.
     */
    public function deleteComment($postid){
        $deleteCom = new comment();
       $result =  $deleteCom->deleteComment($postid);
       return $result; 

    }
}
?>