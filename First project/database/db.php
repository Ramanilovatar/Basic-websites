<?php
session_start();
function config()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "raman";
    return mysqli_connect($server, $username, $password, $db);
}
