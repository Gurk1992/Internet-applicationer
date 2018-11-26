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
            $result= $contr -> setlogin($username, $password, $curpage);
            if($result === TRUE){
                $_SESSION["user"]= $username;
                header("Location:".$curpage."?loginSucessfull" );
            }
            else if($result === FALSE){
                $_SESSION['loginError'] = 'Invalid login information, please try again!';
                header("Location: ".$curpage."?Loginfailed ");
            }
        }
        else{
            header("Location: ".$curpage."?Loginfailed ");
            $_SESSION['loginError'] ='Only normal chars are allowed.';
        }
    }
    else{
        header("Location: ".$curpage."?Loginfailed ");
        $_SESSION['loginError'] ='All frields are required!';
    }
}
?>