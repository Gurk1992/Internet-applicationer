<?php
namespace mysql;
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
 public function query(){
    $sql = "SELECT postid,receptId, username, text FROM comments";
    $query= $this->conn->query($sql);
    return $query;
   
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
