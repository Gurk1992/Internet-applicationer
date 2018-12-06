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
            if(isset($_SESSION['user'])){
                $same = strcasecmp($_SESSION['user'], $row['username']);
            }
            if($row['receptId']== $_SESSION['page']){
                echo "<div class = 'comment-box'>";
                if(isset($_SESSION['user']) && $same==0){ 
                echo "<form id = 'delete' class ='delete-form'>
                <input id='postid' type='hidden' name='postid' value ='".$row['postid']."'>
                <button id = 'delete' class = 'buttons' name = 'comment-delete' type = 'submit'>Delete</button>
                </form>";
                }
                echo "<p class ='comment-user'>" .$row['username']." commented: </p> ";
                echo "<p class ='comment-text'>". nl2br($row['text']) ."</p>";
                echo "</div>";
                
            }
        }
    
    
           
//// if(isset($_SESSION['user']) && $_SESSION['user'] === $row['username']){     
?>

