<?php session_start(); 
$_SESSION['page']=0; 
?>
<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content ="width=device-width, initial-scale =1.0">
    <title>Tasty Recipes</title>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="tastyrecipe.css">
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
                    <?php if(isset($_SESSION['loginError'])){
                        echo "<h3 class='errormessage'>" .$_SESSION['loginError']."</h3>";
                        unset($_SESSION['loginError']);
                    }
                    ?>
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
            <h1 class="main-header">Banana Panncakes</h1>
            <p class = "recipe-short">prep:10min cooking time: 5 min Yields 10pancakes </p>   
            <h3 class= "under-header">Ingredients</h3> 
            <ul>
                <li>2 cups oats</li>
                <li>3 ripe bananas</li>
                <li>3 dates</li>
                <li>2 teaspoons of ground flax</li>
                <li>1/2 teaspoon of baking soda and baking powder</li>
                <li>juice of half a lemon</li>
                <li>1 cup of milk or plant-milk</li>
                <li>frozen berry mix</li>
            </ul>
            <h3 class= "under-header" >Instructions</h3>
            <ol>
                <li>mix the oats to oat flour</li>
                <li>add all the rest of the Ingredients except the forzen berries</li>
                <li>heat up a pan to meadium heat and fry the pancakes</li>
                <li>gently heat up the frozen berries and pour them over the newly fried pancakes</li>
            </ol>
        </div>
        <div class = "column-right">
            <img src = "/images/Pancakes.jpg" alt ="Pancakes" class ="responsive"/>
            <p class= "img-text">Banana pancakes</p>
        </div>
    </div>
    <div class = "comments main">
        <div class ="column-left">
            <?php include "commentshow.php" ?>
        </div>
        <div class ="column-right">
            <?php
            if(isset($_SESSION['user'])){
                ?>
                <h3 class = "under-header">Leave a comment!</h3>
                <form class ="comment-area" action = "comment.php" method="post">
                <input type = "hidden" name="receptid" value= "0">
                <textarea class = "comment-field" type ="textarea" name="comment" placeholder="Write your comment here" required></textarea>
                <div>
                <button class = "buttons comment-button" type ="submit" name ="comment-submit"> Submit comment</button>
                </div>
                </form>
                <?php if(isset($_SESSION['commentMessage'])){
                        echo "<p class='errormessage'>" .$_SESSION['commentMessage']."</p>";
                        unset($_SESSION['commentMessage']);
                    }
                    ?>
            <?php 
            } else{
            ?>
            <p>Login at the top of the page to leave a comment.</p>
            <form class = "login" action="login.php" method ="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type ="password" name="password" placeholder="Password" required>
                <button type ="submit" name ="login" class = "buttons"> Login</button>
            </form>
            <?php 
            } 
            ?>
        </div>
    </div>
   
</body>
</html>
