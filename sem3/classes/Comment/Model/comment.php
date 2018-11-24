<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/classes/Comment/Integration/mysql.php';
Class comment{
   
    
    public function storeComment($com, $username, $receptId, $curpage){
        

        $sql = "INSERT INTO comments(receptId, username, text) VALUES(?, ?, ?)";
        $mysql = new mysql(); 
        $result = $mysql->comment($sql, $receptId,$username, $com);
        if ($result===TRUE){
            $_SESSION['commentMessage']="Comment has been created!";
            header("Location: ".$curpage."?CommentCreated ");
            
        }
        else
        {
            $_SESSION['commentMessage']="Comment has not been posted, try again!";
            header("Location: ".$curpage."?Commentfailed ");
        }
        
    }
    public function deleteComment($postid, $curpage){
        $sql = "DELETE FROM comments WHERE postid=?";
        $mysql = new mysql();
        $mysql->deleteComment($sql, $postid);
        $_SESSION['commentMessage']="Comment has been deleted!";
        header("Location: ".$curpage."?Loginfailed ");
    }
    public function showComment(){
        $sql = "SELECT postid,receptId, username, text FROM comments";
        $mysql= new mysql();
        return $mysql->query($sql);     
    }
}


/*


public function storeComment($com, $username, $receptId, $curpage){
        

        $sql = "INSERT INTO comments(receptId, username, text) VALUES('$receptId', '$username', '$com')";
        $mysql = new mysql();
        $query = $mysql->query($sql);
        if ($query===TRUE){
            $_SESSION['commentMessage']="Comment has been created!";
            header("Location: ".$curpage."?CommentCreated ");
            
        }
        else
        {
            $_SESSION['commentMessage']="Comment has not been posted, try again!";
            header("Location: ".$curpage."?Commentfailed ");
        }
        
    }




<?php
require_once 'E:\xampp\htdocs\classes\Comment\Integration\mysql.php';
Class comment{
    private $comment;
    private $username;
    private $receptId;
    private $curpage;
    

    public function __construct($comment, $username, $receptId, $curpage){
        $this->comment = $comment;
        $this->username =$username;
        $this->receptId = $receptId;
        $this->curpage = $curpage;
    }
    public function storeComment(){
        $sql = "INSERT INTO comments(receptId, username, text) VALUES('$this->receptId', '$this->username', '$this->comment')";
        $mysql = new mysql();
        $query = $mysql->query($sql);
        if ($query===TRUE){
            $_SESSION['commentMessage']="Comment has been created!";
            header("Location: ".$this->curpage."?CommentCreated ");
            
        }
        else
        {
            $_SESSION['commentMessage']="Comment has not been posted, try again!";
            header("Location: ".$this->curpage."?Commentfailed ");
        }
        
    }
}
 */