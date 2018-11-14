<?php session_start(); 
$_SESSION['page']=1;
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
            <h1 class="main-header" >Meatballs</h1>
            <p class ="recipe-short">prep:30min cooking time: 30 min Yields 10 servings </p>   
            <h3 class ="under-header" >Ingredients</h3> 
            <ul>
                <li>lb lean (at least 80%) ground beef</li>
                <li>1/2 cup fine, dry breadcrumbs</li>
                <li>1/4 cup milk</li>
                <li>1/2 cup grated Parmesan cheese</li>
                <li>1/4 cup finely chopped fresh parsley leaves</li>
                <li>2 teaspoons kosher salt</li>
                <li>Freshly ground black pepper</li>
                <li>1/2 cup finely chopped onion (or grated on a coarse grater)</li>
                <li>1 clove garlic, minced</li>
                <li>1 egg</li>
            </ul>
            <h3 class= "under-header">Instructions</h3>
            <ol>
                <li>Heat oven to 400°F. Line 13x9-inch pan with foil; spray with cooking spray.</li>
                <li>In large bowl, mix all ingredients. Shape mixture into 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.</li>
                <li>Bake uncovered 18 to 22 minutes or until temperature reaches 160°F and no longer pink in center.</li>
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
            <?php 
            } 
            ?>
        </div>
    </div>
   
</body>
</html>


</body>
</html>
