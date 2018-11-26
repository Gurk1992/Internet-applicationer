<?php

/**
 * Login/register class
 */
if(session_id() == '') {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']. '/classes/Comment/Integration/mysql.php';
class login{

    private $username;
    private $password;
   
    /**
     * constructor sets username to private username and password to private password.
     */
    public function __construct($username, $password){
       $this->username = $username;
       $this->password= $password;
    }
   /**
    * Login function, uses Mysql  and checks result from database.
    *
    * returns Boolean True if succesfully logged in otherwise false.
    */
    
    public function loginAttempt(){
        $sql= "SELECT * FROM login WHERE username=?";
        $mysql = new mysql();
        $result= $mysql->login($sql, $this->username);
        $row = $result->fetch_assoc();
        if(password_verify($this->password, $row['password'])){
            return $res = TRUE;
        }
        
        else{
            
            return $res = FALSE;
        }
    }
    /**
     * Registers user, uses mysql and checks result from sql query.
     * 
     * returns boolean true if registered otherwise false
     */
    public function registerAttempt(){
        $sql="SELECT * FROM login WHERE username=?";
        $mysql = new mysql();
        $result= $mysql->login($sql, $this->username);   
        if($result->num_rows==0){
            $sql = "INSERT INTO login (username, password) VALUES(?, ?)";
            $result= $mysql->register($sql, $this->username, $this->password);   
            return $result; 
        }
        else{
            return; 
        }
}  



}

?>