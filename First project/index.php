<?php
include_once "database/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon_ico/home.ico">
</head>
<body>
<div class="full-page">
    <div class="navbar">
        <a href="index.php" class="logo"></a>
        <nav>
            <ul class="menuitems">
                <li><img src="images/icons/icons8-male-user-48.png" class="icons"><a href="about_me.html">درباره من</a>
                </li>
                <?php if (isset($_SESSION['login'])) {
                    echo "<li><img src = 'images/icons/icons8-map-64.png' class='icons' ><a href = 'iran/iran.html' > نقشه
                        ایران </a ></li >";
                } ?>

                <li><img src="images/icons/icons8-picture-64.png" class="icons"><a href="gallery.html">گالری
                        تصاویر</a></li>

                <?php if (!isset($_SESSION['login'])) {
                    echo "<li><a href = 'login.php' target = '_blank' > ورود / ثبت نام </a ><img src = 'images/icons/icons8-login-48.png'
                                                                             class='icons' ></li >";
                } else {
                    echo "<li><a href='expire.php' target='_self'>خروج</a><img src='images/icons/icons8-login-48.png' class='icons'></li>";
                }
                ?>

            </ul>
        </nav>

    </div>
    <div class="clock-raman">
        <div class="display-clock">
            <div id="clock">00:00:00</div>
        </div>
    </div>
</div>
<script src="js/clock.js"></script>
</body>
</html>