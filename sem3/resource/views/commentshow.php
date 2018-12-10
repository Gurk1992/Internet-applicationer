<?php
header( "Cache-Control: max-age=<30>"); 
    /**
     * View for user comments.
     * Shows all comments for specific recipes.
     */
    use \Controller\Controller;
    use \DTO\commentDTO;
    require_once '../../classes/Comment/Controller/Controller.php';
  
    require_once $_SERVER['DOCUMENT_ROOT'].'/classes/Comment/DTO/commentDTO.php';

    $contr = new Controller();
    $comments=$contr->showComment();
    
    foreach($comments as $comment){
        
         if($comment->getReceptid() == $_SESSION['page']){
             echo '<div class = "comment-box">';
             if(isset($_SESSION['user'])&& $_SESSION['user']=== $comment->getUser()){
                 echo '<form class = "delete-form" method = "POST" action = "../../do-deletecomment.php">';
                 echo '<input type = "hidden" name = "postid" value = "'.$comment->getcommId().'" >';
                 echo '<input type = "hidden" name = "curpage" value = "'.htmlspecialchars($_SERVER['PHP_SELF']).'" >';
                 echo '<button class = "buttons" name = "comment-delete" type = "submit" >Delete</button>';
                 echo '</form>';
             }
             echo '<p class ="comment-user">'.$comment->getUser().' commented:</p>';
             echo '<p class ="comment-text">'.nl2br($comment->getText()).':</p>';
             echo '</div>';
         }
     }
              
   
    
?>