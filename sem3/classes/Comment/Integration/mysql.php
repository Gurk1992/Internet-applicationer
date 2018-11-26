<?php
class mysql{

 private $conn = null;

public function __construct(){
     $this->conn= new mysqli("localhost","root","cjopg123","myDB");
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
 public function login($sql, $username){
    // $stmt = $this->conn->prepare($sql);
     $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('s', $username);
     $stmt->execute();
     return $stmt->get_result();
   
 }
 public function register($sql, $username, $password){
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('ss', $username, $password);
    return $stmt->execute();
    
 }
 public function comment($sql, $receptId, $username,$com){
    $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('sss', $receptId, $username, $com);
     return $stmt->execute();
    
 }
 public function deleteComment ($sql, $postid){
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('s', $postid);
    return $stmt->execute();
}
}
?>
