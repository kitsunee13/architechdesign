<?php     
    $mysql = new mysqli('localhost','********','********','a67474_db');
    $result = $mysql->query("SELECT * FROM `comments`");
    $com = $result->fetch_assoc();
    $mysql->close();    
?>