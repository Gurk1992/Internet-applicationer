<?php
namespace DTO;

class commentDTO {
    private $comment_id;
    private $receptid;
    private $username;
    private $text;
    /**
     * Constructor for commentDTO
     * 
     * @param comment_id the id of current comment
     * @param receptid the receptid of which the comment is made
     * @param username of comment creator
     * @param text content of the comment.
     * 
     */
    public function __construct($comment_id,$receptid, $username, $text){
        $this->comment_id = $comment_id;
        $this->receptid = $receptid;
        $this->username = $username;
        $this->text = $text;
    }
    /**
    * @return commentid for current comment
    */
    public function getcommId(){
        return $this->comment_id;
    }
    /**
    * @return receptid for current comment
    */
    public function getReceptid(){
        return $this->receptid;
    }
    /**
    * @return username for current comment
    */
    public function getUser(){
        return $this->username;
    }
    /**
    * @return text for current comment
    */
    public function getText(){
        return $this->text;
    }

}
?>