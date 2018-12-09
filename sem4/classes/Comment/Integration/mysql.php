<?php
namespace mysql;
use DTO\commentDTO;

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/DTO/commentDTO.php';

class mysql{

 private $conn = null;

public function __construct(){
     $this->conn= new \mysqli("localhost","root","cjopg123","myDB");
// check connection
if($this->conn->connect_error){
    die("Connection failed: " . $this->conn->connect_error);
}
 }
/**
 * querys database and returns result.
 * return array of info
 */
/*
 public function query($receptid){
    $sql = "SELECT postid, username, text FROM comments WHERE receptid =?";
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('i', $receptid);
    $stmt->execute();
    $stmt->bind_result($postid, $username, $text);
    
    while($stmt->fetch()){
        
        $comments[] = new commentDTO($postid, $username, $text);
    }
        
    return $comments;
   
 }*/
 
 public function query($receptid){
    $sql = "SELECT * FROM comments WHERE receptid =$receptid";
    $query= $this->conn->query($sql);
    $comments = array();
    while($row = $query->fetch_assoc()){
        array_push($comments, $row);
    }
        
    return $comments;
   
 }
 /**
  * fetches user details
  * Returns array of user details (password, accountname etc)
  */
 public function login($username){
     $sql= "SELECT * FROM login WHERE username=?";
     $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('s', $username);
     $stmt->execute();
     return $stmt->get_result()->fetch_assoc();
     
   
 }
 
 /**
  * Inserts account name and password in db
  * returns True /False depending on if statement was successfull or not.
  */
 
 public function register($username, $password){
    $sql = "INSERT INTO login (username, password) VALUES(?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('ss', $username, $password);
    return $stmt->execute();
    
 }
 /**
  * Inserts comment text, username, and what recept id into db
  * returns True /False depending on if statement was successfull or not.
  */
 public function comment($receptId, $username,$com){
    $sql = "INSERT INTO comments(receptId, username, text) VALUES(?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('sss', $receptId, $username, $com);
     return $stmt->execute();
    
 }
 /**
  * Deletes comment that matches postid in db.
  * returns True /False depending on if statement was successfull or not.
  */
 public function deleteComment ($postid){
    $sql = "DELETE FROM comments WHERE postid=?";
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('s', $postid);
    return $stmt->execute();
}
}
?>
