<?php
namespace mysql;

use DTO\commentDTO;
require_once $_SERVER['DOCUMENT_ROOT']. '/classes/Comment/DTO/commentDTO.php';

class mysql{
 private $conn = null;

 /**
  * constructor creates a connection to the database.
  */
public function __construct(){
     $this->conn= new \mysqli("localhost","root","cjopg123","myDB");

if($this->conn->connect_error){
    die("Connection failed: " . $this->conn->connect_error);
}
 }
/**
 * querys database and returns result.
 * @return commentDTO with user information
 */

 public function query(){
    $comments = array();
    $sql = "SELECT * FROM comments";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($postid, $receptid, $username, $text);
    while($stmt->fetch()){
        $comments[] = new commentDTO($postid,$receptid, $username, $text);
    }
        
    return $comments;
   
}
 /**
  * fetches user details
  * @param username of login attempt
  * @return array of user details (password, accountname etc)
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
  * @param username of login attempt
  * @param password of register attempt
  * @return True /False depending on if database statement was successfull or not.
  */
 
 public function register($username, $password){
    $sql = "INSERT INTO login (username, password) VALUES(?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('ss', $username, $password);
    return $stmt->execute();
    
 }
 /**
  * Inserts comment text, username, and what recept id into db
  * @param receptid of currentd comment made
  * @param username of user that made the comment
  * @param com the text of the sent in comment
  * @return boolean True /False depending on if database statement was successfull or not.
  */
 public function comment($receptId, $username,$com){
    $sql = "INSERT INTO comments(receptId, username, text) VALUES(?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
     $stmt-> bind_param('sss', $receptId, $username, $com);
     return $stmt->execute();
    
 }
 /**
  * Deletes comment that matches postid in db.
  * @param postid the postid of the comment to delete.
  * @return boolean True /False depending on if statement was successfull or not.
  */
 public function deleteComment ($postid){
    $sql = "DELETE FROM comments WHERE postid=?";
    $stmt = $this->conn->prepare($sql);
    $stmt-> bind_param('s', $postid);
    return $stmt->execute();
}
}
?>
