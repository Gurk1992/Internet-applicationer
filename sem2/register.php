<?php
session_start();
if(isset($_POST['register']))
{
    if(!empty($_POST['username'])&& !empty($_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        include "mysql.php";
        $sql="SELECT * FROM login WHERE username='".$username."'";
        $query= $conn->query($sql);
        if($query->num_rows==0){

            $sql = "INSERT INTO login (username, password) VALUES('$username', '$password')";
            $query = $conn->query($sql);
            if($query===TRUE){
                $_SESSION['registerError']="Your account has been successfully created!";
                header("Location: index.php?registerSuccess");
            }
            else
            {
            $_SESSION['registerError']="Account has not been successfully created, try again!";
            header("Location: newRegister.php?registerUnsucessfull");
            }
        }
        else{
            $_SESSION['registerError'] = 'Username alredy in use, try another one!';
            header("Location: newRegister.php?invalidUsername");
        }
    }
    else{
        $_SESSION['registerError']= "All fields required.";
        header("Location: newRegister.php");
    }
}
?>