<?php
    include "mysql.php";
    $sql = "SELECT postid,receptId, username, text FROM comments";
    
    $result= $conn->query($sql);
        while($row = $result->fetch_assoc())
        {  
            if($row['receptId']== $_SESSION['page']){

            echo "<div class = 'comment-box'>";
            
            if(isset($_SESSION['user']) && $_SESSION['user'] === $row['username']){ 
            echo "<form class ='delete-form' method='POST' action ='deletecomment.php'>
            <input type='hidden' name='postid' value ='".$row['postid']."'>
            <button class = 'buttons' name = 'comment-delete' type = 'submit'>Delete</button>
            </form>";
            }
            echo "<p class ='comment-user'>" .$row['username']." commented: </p> ";
            echo "<p class ='comment-text'>". nl2br($row['text']) ."</p>";
            echo "</div>";
            }
        }

    
?>