<?php   
/**
 * Class that handles logout of user.
 */
class logout{
    /**
     * function that logs out the user.
     */
    public function logoutAttempt(){
        session_start();  
        unset($_SESSION['user']);  
        session_destroy();  
        header("Location:index.php");  

    }
}
?>  