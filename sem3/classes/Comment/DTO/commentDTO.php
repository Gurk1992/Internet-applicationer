<?php
namespace DTO;

class commentDTO {
    private $comment_id;
    private $receptid;
    private $username;
    private $text;

    public function __construct($comment_id,$receptid, $username, $text){
        $this->comment_id = $comment_id;
        $this->receptid = $receptid;
        $this->username = $username;
        $this->text = $text;
    }
    public function getcommId(){
        return $this->comment_id;
    }
    public function getReceptid(){
        return $this->receptid;
    }
    public function getUser(){
        return $this->username;
    }
    public function getText(){
        return $this->text;
    }

}
?>