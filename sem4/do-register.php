<?php
/**
 * registers user, nickname and password
 */
namespace view;
use \Controller\Controller;

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
        else if($result ===FALSE){
            $_SESSION['registerError']="Account has not been successfully created, try again!";
            header("Location:".$curpage."?registerUnsucessfull");
        }
        else{
            $_SESSION['registerError'] = 'Username alredy in use, try another one!';
            header("Location:".$curpage."?invalidUsername");
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