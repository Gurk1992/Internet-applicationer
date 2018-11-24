<?php 
session_start();
header( "Cache-Control: max-age=<350>"); 

?>
<!DOCTYPE html>

<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content ="width=device-width, initial-scale =1.0">
    <title>Tasty Recipes</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/resource/css/tastyrecipe.css">
</head>
<body>
<header> 
        <h1><a class = "menu-links" href="/index.php">Tasty Recipes</a></h1>
        <div class="login-container">
            <form class = "login" action="../../do-login.php" method ="POST">
                <?php if(isset($_SESSION['user'])){
                ?>
                <a class= "menu-links" href="../../do-logout.php"> Sign out <?php echo $_SESSION['user']; ?></a>
                <?php }else{ ?>
                <input type="hidden" name="curpage" value="index.php"/>
                <input type="text" name="username" placeholder="Username" required>
                <input type ="password" name="password" placeholder="Password" required>
                <button type ="submit" name ="login" class = "buttons"> Login</button>
                <?php } ?>
            </form>
            <?php if(isset($_SESSION['loginError'])){
                        echo "<h2 class='errormessage'>" .$_SESSION['loginError']."</h2>";
                        unset($_SESSION['loginError']);
                    }
                    ?>
        </div>
    <nav class= "top-nav">
        <a class = "menu-links" href="calendar.php">Calendar</a>
        <a class = "menu-links" href="meatball.php">Meatball Recipe</a>
        <a class = "menu-links" href="pancake.php">Pancakes Recipe</a>
        <a class = "menu-links" href="newRegister.php"> Register Account</a>
    </nav>
    </header>
        <div class = "main">
            <div class = "column-left">
                <h1 class="main-header" >Register</h1>
                <p> Please fill in this form to create an account!
                <form class = "register" action="../../do-register.php" method ="POST">
                <div class ="forms">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="hidden" name="curpage" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"/>
                    <input type ="password" name="password" placeholder="Password" required>
                </div>
                    <button type ="submit" name ="register" class = "buttons register-button">Register</button>
                </form>  
            <div class = "registerError">
            <?php if(isset($_SESSION['registerError'])){
                        echo "<p class='errormessage'>" .$_SESSION['registerError']."</p>";
                        unset($_SESSION['registerError']);
                    }
                    ?>
            </div>
            </div>
            <div class = "column-right">
                <img src = "/images/pumpkin.jpg" alt ="food picture" class ="responsive"/>
            </div>
        </div>
        
</body>
</html>