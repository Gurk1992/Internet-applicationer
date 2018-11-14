<?php 
    session_start();
    if(isset($_POST['comment-delete'])){
    $postid = $_POST['postid'];

    include "mysql.php";
    $sql = "DELETE FROM comments WHERE postid='$postid'";

    $result= $conn->query($sql);
    $_SESSION['commentMessage']="Comment has been deleted!";
            if ($_SESSION['page']==0){
                header("Location: pancake.php?commentSucess");
            }
            if($_SESSION['page']== 1){
            header("Location: meatball.php?commentSucess");
            }
}
?>