<?php
session_start();
    if(isset($_POST['comment-submit'])){
        $comment=$_POST['comment'];
        $username = $_SESSION['user'];
        $receptId =$_POST['receptid'];

        include "mysql.php";
        $sql = "INSERT INTO comments(receptId, username, text) VALUES('$receptId', '$username', '$comment')";
    
        $query= $conn->query($sql);
        if($query===TRUE){
            $_SESSION['commentMessage']="Comment has been created!";
            if ($_SESSION['page']==0){
                header("Location: pancake.php?commentSucess");
            }
            if($_SESSION['page']== 1){
            header("Location: meatball.php?commentSucess");
            }
        }
        else
        {
            $_SESSION['commentMessage']="Comment has not been posted, try again!";
            if ($_SESSION['page']==0){
                header("Location: pancake.php?commentSucess");
            }
            if($_SESSION['page']== 1){
            header("Location: meatball.php?commentSucess");
            }
        }
        
    }

?>
