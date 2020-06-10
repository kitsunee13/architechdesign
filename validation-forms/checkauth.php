<?php     
    $mysql = new mysqli('localhost','********','********','a67474_db');
    $uservar = $_COOKIE['user'];
    $result = $mysql->query("SELECT * FROM `users` WHERE `id` = '$uservar'");
    $user = $result->fetch_assoc();
    $mysql->close();    
?>