<?php 
session_start()
?>
<!DOCTYPE html>
<html lang = "en">


<head>
    <meta name ="viewport" content ="width=device-width, initial-scale =1.0">
    <title>Tasty Recipes</title>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="tastyrecipe.css">
    <link rel="stylesheet" type="text/css" href="calendar.css">
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
