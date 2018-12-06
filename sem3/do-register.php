<?php
namespace View;
/**
 * registers user, nickname and password
 */
use \Controller\Controller;
session_start();
require_once 'classes/Comment/Controller/Controller.php';
if(isset($_POST['register']))
{
    if(!empty($_POST['username'])&& !empty($_POST['password']))
    {
        $username=$_POST['username'];
        $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $curpage =$_POST['curpage'];
        if(ctype_print($password) && ctype_print($username) && ctype_print($curpage)){
        $Contr = new Controller();
        $result=$Contr->registeruser($username, $password, $curpage);
        if($result===TRUE){
            $_SESSION['registerError']="Your account has been successfully created!";
            header("Location: index.php?registerSuccess");
        }
        else{
            $_SESSION['registerError']="Account has not been successfully created, try again!";
            header("Location:".$curpage."?registerUnsucessfull");
        }
       
    }
    else{
        $_SESSION['registerError']= "Only normal chars are allowed.";
        header("Location: newRegister.php");
    }
    }
    else{
        $_SESSION['registerError']= "All fields required.";
        header("Location: newRegister.php");
    }
}
?>