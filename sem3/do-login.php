<?php
/**
 * logs in user.
 */

require_once 'classes/Comment/Controller/Controller.php';
if(isset($_POST['login'])){
    if(!empty($_POST['username'])&& !empty($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $curpage = $_POST['curpage'];
        if(ctype_print($password) && ctype_print($username)&&ctype_print($curpage)){
            $contr= new Controller();
            $contr -> setlogin($username, $password, $curpage);
        }
        else{
            $_SESSION['loginError'] ='Only normal chars are allowed.';
        }
    }
    else{
        $_SESSION['loginError'] ='All frields are required!';
    }
}
?>