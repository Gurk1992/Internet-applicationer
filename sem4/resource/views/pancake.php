<?php session_start(); 
header( "Cache-Control: max-age=<350>"); 
$_SESSION['page']=0; 
$xml =simplexml_load_file("../../cookbook.xml") or die("Error: Cannot create object");
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
            <h1 class="main-header" ><?php echo $xml->recipe[1]->title?></h1>
            <p class ="recipe-short"><?php echo $xml->recipe[1]->preptime, $xml->recipe[1]->cooktime, $xml->recipe[1]->totaltime, $xml->recipe[1]->quantity?></p>
            <h3 class ="under-header" >Ingredients</h3> 
            <ul>
                <li><?php echo $xml->recipe[1]->ingredient->li[0] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[1] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[2] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[3] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[4] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[5] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[6] ?></li>
                <li><?php echo $xml->recipe[1]->ingredient->li[7] ?></li>
            </ul>
            <h3 class= "under-header">Instructions</h3>
            <ol>
                <li><?php echo $xml->recipe[1]->recipetext->li[0] ?></li>
                <li><?php echo $xml->recipe[1]->recipetext->li[1] ?></li>
                <li><?php echo $xml->recipe[1]->recipetext->li[2] ?></li>
                <li><?php echo $xml->recipe[1]->recipetext->li[3] ?></li>
            </ol> 
    </div>
    <div class = "column-right">
        <img src = "/images/Pancakes.jpg" alt ="Pancakes" class ="responsive"/>
        <p class= "img-text">Banana pancakes</p>
    </div>
</div>
<div id ="comments-main" class = "comments main">
        <div class ="column-left" id ="column-left">
            <script>
            window.onload = getComment();</script>
        </div>
        <div id = "comment-right" class ="column-right">
            <?php if(isset($_SESSION['user'])){ ?>
                <h3 class = "under-header">Leave a comment!</h3>
                <form id ="comment" class ="comment-area">
                <input id ="comment-receptid" type = "hidden" name="receptid" value= "0">
                <textarea id ="comment-text" class = "comment-field" type ="textarea" name="comment" placeholder="Write your comment here" required></textarea>
                <div>
                <button id = "comment-button"class = "buttons comment-button" type ="submit" name ="comment-submit"> Submit comment</button>
                </div>
                </form>
                <p id = "comment-message" class='errormessage'><p>
            
            <?php } else{?>
                <p id ="comment-outlogged">Login at the top of the page to leave a comment.</p>
            <?php } ?>
        </div>
    </div>
   
</body>
</html>