<?php
include 'mysql.php';
session_start();
if(isset($_POST['login'])){
if(!empty($_POST['username'])&& !empty($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];


include "mysql.php";
//Fråga om kombo finns.

$sql="SELECT * FROM login WHERE username='".$username."' AND password ='".$password."'";
$query= $conn->query($sql);
//kollar om det fanns ett resultat
if($query->num_rows >0){
    // tar ut resultatet i en array
    if($row = $query->fetch_assoc()){
        $_SESSION["user"]= $row['username'];
        header("Location: {$_POST['curpage']}?loginSucess }");
        exit();
        }
    }
    else{
        
        header("Location: {$_POST['curpage']}?loginSucess }");
        $_SESSION['loginError'] = 'Invalid login information, please try again!';
    }
}
else{
    $_SESSION['loginError'] ='All frields are required!';
}
}
?>