<?php 
session_start();
header( "Cache-Control: max-age=<350>"); 
?>
<!DOCTYPE html>
<html lang = "en">


<head>
    <meta name ="viewport" content ="width=device-width, initial-scale =1.0">
    <title>Tasty Recipes</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/resource/css/tastyrecipe.css">
    <link rel="stylesheet" type="text/css" href="/resource/css/calendar.css">
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
    
    <div class ="main">
        <div class = "calendar">
            <div class="calendar_header">
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
                <div>Sun</div>
            </div>
            <div class = "calendar_week">
                <div class="day">1<a href="./pancake.html" ><img src="/Images/Pancakes.jpg" alt="pancakes" class="foodpic" /></a></div>
                <div class="day">2</div>
                <div class="day">3</div>
                <div class="day">4</div>
                <div class="day">5</div>
                <div class="day">6</div>
                <div class="day">7</div>
            </div>
            <div class = "calendar_week">
                <div class="day">8</div>
        
                <div class="day">9</div>
                <div class="day">10 <a href="./meatball.html"><img src="/Images/Meatballs.jpg" alt="pancakes" class="foodpic" /></a></div>
                <div class="day">11</div>
                <div class="day">12</div>
                <div class="day">13</div>
                <div class="day">14</div>
            </div>
            <div class = "calendar_week">
                <div class="day">15</div>
                <div class="day">16</div>
                <div class="day">17</div>
                <div class="day">18</div>
                <div class="day">19</div>
                <div class="day">20</div>
                <div class="day">21</div>
            </div>
            <div class = "calendar_week">
                <div class="day">22</div>
                <div class="day">23</div>
                <div class="day">24</div>
                <div class="day">25</div>
                <div class="day">26</div>
                <div class="day">27</div>
                <div class="day">28</div>
            </div>
            <div class = "calendar_week">
                <div class="day">29</div>
                <div class="day">30</div>
                <div class="day">31</div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
            </div>
        </div>
    </div>

   
</body>
</html>
