<?php
 $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
 $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


 $pass = md5($pass."sdgfewrts");

 $mysqli = new mysqli('localhost','*******','******','a67474_db');

 $result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
 $user = $result->fetch_assoc();

 if (count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
  }

setcookie ('user', $user ['id'], time() + 3600, "/");
setcookie ('hash', $user ['secretkey'], time() + 3600, "/");




 $mysqli->close();

 header('Location: /login.php');
 
?>