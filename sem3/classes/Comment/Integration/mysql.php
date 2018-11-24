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

 public function query($sql){
    $query= $this->conn->query($sql);
    return $query;
   
 }
 public function login($sql, $username){
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
    $stmt->execute();
}
}


/*class mysql{
 private $local = "localhost";
 private $acc = "root";
 private $pw = "cjopg123";
 private $db = "mydb";
 private $conn = null;

public function __construct(){
     $this->conn= new mysqli("localhost","root","cjopg123","myDB");
// check connection
if($this->conn->connect_error){
    die("Connection failed: " . $this->conn->connect_error);
}
 }

 public function query($sql){
    $query= $this->conn->query($sql);
    return $query;
   
 }
}*/
?>
