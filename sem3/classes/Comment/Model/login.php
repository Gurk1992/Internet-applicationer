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
    private $curpage;

    public function __construct($username, $password, $curpage){
       $this->username = $username;
       $this->password= $password;
       $this->curpage= $curpage;
    }
   /**
    * Login function, uses Mysql  and checks result from database.
    */
    
    public function loginAttempt(){
        $sql= "SELECT * FROM login WHERE username=?";
        $mysql = new mysql();
        $result= $mysql->login($sql, $this->username);
        $row = $result->fetch_assoc();
        if(password_verify($this->password, $row['password'])){
            $_SESSION["user"]= $row['username'];
            header("Location:".$this->curpage."?loginSucessfull" );
            exit();
        }
        
        else{
            
            header("Location: ".$this->curpage."?Loginfailed ");
            $_SESSION['loginError'] = 'Invalid login information, please try again!';
        }
    }
    /**
     * Registers user, uses mysql and checks result from sql query.
     */
    public function registerAttempt(){
        $sql="SELECT * FROM login WHERE username=?";
        $mysql = new mysql();
        $result= $mysql->login($sql, $this->username);   
        if($result->num_rows==0){
            $sql = "INSERT INTO login (username, password) VALUES(?, ?)";
            $result= $mysql->register($sql, $this->username, $this->password);   
            if($result===TRUE){
                $_SESSION['registerError']="Your account has been successfully created!";
                header("Location: index.php?registerSuccess");
            }
            else
            {
            $_SESSION['registerError']="Account has not been successfully created, try again!";
            header("Location:".$this->curpage."?registerUnsucessfull");
            }
        }
        else{
            $_SESSION['registerError'] = 'Username alredy in use, try another one!';
            header("Location:".$this->curpage."?invalidUsername");
        }
}  


/**
 * Attemt att simplified database call.
 */
    private function q($sql){
        $mysql = new mysql();
       $result= $mysql->query($sql);   
        return $result;
    }
}

?>