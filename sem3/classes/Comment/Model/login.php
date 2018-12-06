<?php
namespace Model;
/**
 * Login/register class
 */
use mysql\mysql;
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
        $mysql = new mysql();
        $result= $mysql->login($this->username);
            if(password_verify($this->password, $result['password'] )){
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
        
        $mysql = new mysql();
        $result= $mysql->login($this->username);   
        if(empty($result)){
            $result= $mysql->register($this->username, $this->password);   
            return $result; 
        }
        else{
            return; 
        }
}  



}

?>