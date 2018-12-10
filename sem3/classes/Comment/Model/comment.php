<?php
namespace Model;

use mysql\mysql;

require_once $_SERVER['DOCUMENT_ROOT']. '/classes/Comment/Integration/mysql.php';

Class comment{
  
    /**
     * Function that stores a specific comment
     * @param com is the text of the post 
     * @param username is the username that posted it.
     * @param receptid is on which page the post was made.
     * 
     * @returns boolean, true if comment was deleted otherwise false.
     */
    public function storeComment($com, $username, $receptId ){
        $mysql = new mysql();
        return $mysql->comment($receptId,$username, $com);
    }
    /**
     * Function that deletes a specific comment
     * @param postid is the Id of the post that gets deleted
     * 
     * @return boolean true if comment was deleted otherwise false.
     */
    public function deleteComment($postid){
        $mysql = new mysql();
        return  $mysql->deleteComment($postid);
        
    }
    /**
     * FUnction that extracts all comments from the database
     * @return array of commentDTO with all comments in it.
     */
    public function showComment(){
        $mysql= new mysql();
        return $mysql->query();     
    }

}


