<?php session_start();  ?>
<!DOCTYPE html>

<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content ="width=device-width, initial-scale =1.0">
    <title>Tasty Recipes</title>
    <link rel="stylesheet" type="text/css" href="./reset.css">
    <link rel="stylesheet" type="text/css" href="./tastyrecipe.css">
</head>
<body>
    <header> 
        <h1><a class = "menu-links" href="./index.php">Tasty Recipes</a></h1>
        <div class="login-container">
            <form class = "login" action="login.php" method ="POST">
                <?php if(isset($_SESSION['user'])){
                ?>
                <a class= "menu-links" href="logout.php"> Sign out <?php echo $_SESSION['user']; ?></a>
                <?php }else{ ?>
                <input type="hidden" name="curpage" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"/>
                <input type="text" name="username" placeholder="Username" required>
                <input type ="password" name="password" placeholder="Password" required>
                <button type ="submit" name ="login" class = "buttons"> Login</button>
                <?php } ?>
            </form>
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
                <h1 class="main-header" >Welcome </h1>
                <?php if(isset($_SESSION['registerError'])){
                        echo "<h2 class='errormessage'>" .$_SESSION['registerError']."</h2>";
                        unset($_SESSION['registerError']);
                    }
                    ?>
                <p> Welcome to the best recipe site!
                    Our own chef will provide you with his best recipes linked in the menu above.
                <p>All our meals are prepared with the finest quality ingredients and cooked with love!</p>

                  <p>Dont forget to check out the <a href="./calendar.html"> calendar</a> page for our chefs monthly dinner 
                    suggestions.</p> 
               
                
            </div>
            <div class = "column-right">
                <img src = "/images/pumpkin.jpg" alt ="food picture" class ="responsive"/>
            </div>
        </div>
        
</body>
</html>