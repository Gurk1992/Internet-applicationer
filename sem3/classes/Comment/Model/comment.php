<?php

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
        $sql = "INSERT INTO comments(receptId, username, text) VALUES(?, ?, ?)";
        $mysql = new mysql();
        return $mysql->comment($sql, $receptId,$username, $com);
    }
    /**
     * Function that deletes a specific comment
     * postid is the Id of the post that gets deleted
     * 
     * returns boolean true if comment was deleted otherwise false.
     */
    public function deleteComment($postid){
        $sql = "DELETE FROM comments WHERE postid=?";
        $mysql = new mysql();
        return  $mysql->deleteComment($sql, $postid);
        
    }
    /**
     * FUnction that extracts all comments from the database
     */
    public function showComment(){
        $sql = "SELECT postid,receptId, username, text FROM comments";
        $mysql= new mysql();
        return $mysql->query($sql);     
    }

}


