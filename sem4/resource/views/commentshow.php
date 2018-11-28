<?php
header( "Cache-Control: max-age=<30>"); 
    /**
     * View for user comments.
     * Shows all comments for specific recipes.
     */
    require_once '../../classes/Comment/Controller/Controller.php';
    
    $contr = new Controller();
    $result=$contr->showComment();
       
    while($row = $result->fetch_assoc())
        {  
            if($row['receptId']== $_SESSION['page']){
                echo "<div class = 'comment-box'>";
                if(isset($_SESSION['user']) && $_SESSION['user'] === $row['username']){ 
                echo "<form class ='delete-form' method='POST' action ='../../do-deletecomment.php'>
                <input type='hidden' name='postid' value ='".$row['postid']."'>
                <input type='hidden' name='curpage' value='".htmlspecialchars($_SERVER['PHP_SELF'])."'/>
                <button class = 'buttons' name = 'comment-delete' type = 'submit'>Delete</button>
                </form>";
                }
                echo "<p class ='comment-user'>" .$row['username']." commented: </p> ";
                echo "<p class ='comment-text'>". nl2br($row['text']) ."</p>";
                echo "</div>";
                
            }
        }
    
    
           
    
?>