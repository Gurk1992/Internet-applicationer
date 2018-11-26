<?php
class mysql{

 private $conn = null;

public function __construct(){
     $this->conn= new mysqli("localhost","root","123","myDB");
// check connection
if($this->conn->connect_error){
    die("Connection failed: " . $this->conn->connect_error);
}
 }
/**
 * querys database and returns result.
 * return array of info
 */
 public function query($sql){
    $query= $this->conn->query($sql);
    return $query;
   
 }
 /**
  * Checks if username is in db,
  * returns true / false, true when info matches correctly otherwise no.
  */
 public function login($sql, $username){
     $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('s', $username);
     $stmt->execute();
     return $stmt->get_result();
   
 }
 /**
  * Inserts account name and password in db
  * returns true / false, true when info is saved correctly otherwise no.
  */
 
 public function register($sql, $username, $password){
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('ss', $username, $password);
    return $stmt->execute();
    
 }
 /**
  * Inserts comment text, username, and what recept id into db
  * returns true / false, true when info is saved correctly otherwise no.
  */
 public function comment($sql, $receptId, $username,$com){
    $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('sss', $receptId, $username, $com);
     return $stmt->execute();
    
 }
 /**
  * Deletes comment that matches postid in db.
  * returns true / false, true when comment is deleted correctly otherwise no.
  */
 public function deleteComment ($sql, $postid){
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('s', $postid);
    return $stmt->execute();
}
}
?>
