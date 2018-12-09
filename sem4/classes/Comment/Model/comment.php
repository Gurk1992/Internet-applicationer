<?php
namespace Model;
use DTO\commentDTO;

use mysql\mysql;
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/DTO/commentDTO.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/classes/Comment/Integration/mysql.php';
Class comment{
  
    /**
     * Function that stores a specific comment
     * com is the text of the post 
     * username is the username that posted it.
     * receptid is on which page the post was made.
     * 
     * returns boolean, true if comment was deleted otherwise false.
     */
    public function storeComment($com, $username, $receptId ){
        $mysql = new mysql();
        return $mysql->comment($receptId,$username, $com);
    }
    /**
     * Function that deletes a specific comment
     * postid is the Id of the post that gets deleted
     * 
     * returns boolean true if comment was deleted otherwise false.
     */
    public function deleteComment($postid){
        $mysql = new mysql();
        return  $mysql->deleteComment($postid);
        
    }
    /**
     * FUnction that extracts all comments from the database
     */
    public function showComment($receptid){
        $mysql= new mysql();
        return $mysql->query($receptid);     
    }

}


