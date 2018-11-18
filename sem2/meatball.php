<?php session_start(); 
$_SESSION['page']=1;
$xml =simplexml_load_file("cookbook.xml") or die("Error: Cannot create object");
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
                        echo "<h2 class='errormessage'>" .$_SESSION['loginError']."</h2>";
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
        <h1 class="main-header" ><?php echo $xml->recipe[0]->title?></h1>
            <p class ="recipe-short"><?php echo $xml->recipe[0]->preptime, $xml->recipe[0]->cooktime, $xml->recipe[0]->totaltime, $xml->recipe[0]->quantity?></p>
            <h3 class ="under-header" >Ingredients</h3> 
            <ul>
                <li><?php echo $xml->recipe[0]->ingredient->li[0] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[1] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[2] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[3] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[4] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[5] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[6] ?></li>
                <li><?php echo $xml->recipe[0]->ingredient->li[7] ?></li>
               
            </ul>
            <h3 class= "under-header">Instructions</h3>
            <ol>
            <li><?php echo $xml->recipe[0]->recipetext->li[0] ?></li>
            <li><?php echo $xml->recipe[0]->recipetext->li[1] ?></li>
            <li><?php echo $xml->recipe[0]->recipetext->li[2] ?></li>
            <li><?php echo $xml->recipe[0]->recipetext->li[3] ?></li>
      
            </ol> 
        </div>
        <div class = "column-right">
            <img src = "/images/Meatballs.jpg" alt ="Meatballs" class ="responsive"/>
            <p class= "img-text">Swedish meatballs</p>
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
                <input type = "hidden" name="receptid" value= "1">
                <textarea class = "comment-field" type ="textarea" name="comment" placeholder="Write your comment here" required></textarea>
                <div>
                <button class = "buttons comment-button" type ="submit" name ="comment-submit"> Submit comment</button>
                </div>
                </form>
                <?php if(isset($_SESSION['commentMessage'])){
                        echo "<p class='errormessage'>" .$_SESSION['commentMessage']."</p>";
                        unset($_SESSION['commentMessage']);
                    }
            } else{
            ?>
                <p>Login at the top of the page to leave a comment.</p>
                <form class = "login" action="login.php" method ="POST">
            <input type="hidden" name="curpage" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"/>
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


</body>
</html>
