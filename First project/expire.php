<?php
session_start();
setcookie('user_remember', $_SESSION['username'], time() - 1, '/');
setcookie('pass_remember', $_SESSION['password'], time() - 1, '/');
session_destroy();
header("location:index.php");