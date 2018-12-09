<?php
namespace DTO;
class commentDTO implements \JsonSerializable{

private $comment_id;

private $username;
private $text;

public function construct($comment_id, $username, $text){
    $this->comment_id = $comment_id;
    $this->username = $username;
    $this->text = $text;
}
public function getcommId(){
    return $this->comment_id;
}
public function getUser(){
    return $this->username;
}
public function getText(){
    return $this->text;
}
public function jsonSerialize() {
    $json_obj = new \stdClass;
    $json_obj->comment_id = \json_encode($this->comment_id);
    $json_obj->username = \json_encode($this->username);
    $json_obj->text = \json_encode($this->text, JSON_UNESCAPED_UNICODE);
    
    return $json_obj;
}
}
?>