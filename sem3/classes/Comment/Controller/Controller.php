<?php
namespace Controller;

use Model\comment;
use Model\login;
use DTO\commentDTO;

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/comment.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/Model/login.php';


class Controller{
    /**
     * logs user in
     * @param username of login attempt
     * @param password of login attempt
     * @return boolean true if sucessfull otherwise false.
     */
    public function setlogin($username, $password ){
        $login = new login($username, $password );
        $result = $login->loginAttempt();
        return $result; 
    }
   
    /**
     * attempts to register user
     * @param username of register attempt
     * @param password of register attempt
     * @return boolean true if sucessfull otherwise false.
     */
    public function registeruser($username, $password ){
        $login = new login($username, $password );
        $result= $login->registerAttempt();
        return $result;
    }
   /**
     * stores comment in database
     * @param comment of posted comment
     * @param username of user
     * @param receptid for current page
     * @return boolean true if sucessfull otherwise false.
     */
    public function storeComment($comment, $username, $receptId){
        $c = new comment();
        $result = $c->storeComment($comment, $username, $receptId);
        return $result; 
    }
   /**
     * Gets all comment from database.
     * @return array of commentDTO with all comments.
     */
    public function showComment(){
        $commentGet= new comment();
        return $commentGet->showComment();
         
    }
    /**
     * deletes comment
     * @param postid the post id of the comment that is being delted
     * @return boolean true if sucessfull otherwise false.
     */
    public function deleteComment($postid){
        $deleteCom = new comment();
       $result =  $deleteCom->deleteComment($postid);
       return $result; 

    }
}
?>