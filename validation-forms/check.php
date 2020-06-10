<?php
   $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
   $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

   
   $mysql = new mysqli('localhost','********','********','a67474_db');
   $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
   $user = $result->fetch_assoc();
  
    if (count($user) != 0) {
        echo "Такой логин уже существует!";
        exit();
   }else if(mb_strlen($login) < 5 || mb_strlen($login) > 20 ) {
       echo "Недопустимая длина логина";
       exit();
   } else if(mb_strlen($pass) < 6 || mb_strlen($login) > 30 ) {
     echo "Недопустимая длина пароля (от 6 до 30 символов)";
     exit();
   } 

   $pass = md5($pass."sdgfewrts");
   $secretkey = md5($login."324gfd3242");

   $mysql->query("INSERT INTO `users` (`login`, `pass`, `secretkey`) VALUES ('$login', '$pass', '$secretkey')");

   $mysql->close();

   header('Location: /login.php');
?>