<?php
/**
 * registers user, nickname and password
 */
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
        $Contr->registeruser($username, $password, $curpage);
       
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