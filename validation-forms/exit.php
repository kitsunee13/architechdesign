<?php
 setcookie ('user', $user ['login'], time() - 3600, "/");
 setcookie ('hash', $user ['secretkey'], time() - 3600, "/");
 header('Location: /');
?>