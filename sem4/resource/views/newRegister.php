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
    <script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type = "text/javascript" src =/recipes.js> </script>
</head>
<body>
    <header id = "header" >
        <h1><a class = "menu-links" href="./start.php">Tasty Recipes</a></h1>
        <div id = "login-container" class="login-container">
            <div id = "logout">
                <?php if(isset($_SESSION['user'])){ ?>    
                <button id = "loggedin" class= "buttons"> Sign out <?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?></button>     
                <?php } else{?>   
                <form id = "login">
                    <input id = "login-name" type="text" name="username" placeholder="Username" required>
                    <input id = "login-pass" type ="password" name="password" placeholder="Password" required>
                    <button id ="login-button" type ="submit" class = "buttons"> Login</button>
                    <?php } ?>
                </form>
            </div id ="logout">
            <h2 id ="login-message" class='errormessage'> </h2>
        </div>
        <nav class= "top-nav">
            <a class = "menu-links" href="./calendar.php">Calendar</a>
            <a class = "menu-links" href="./meatball.php">Meatball Recipe</a>
            <a class = "menu-links" href="./pancake.php">Pancakes Recipe</a>
            <a class = "menu-links" href="./newRegister.php"> Register Account</a>
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