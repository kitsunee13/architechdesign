<?php
  require_once "recaptchalib.php";
  /* Принимаем данные из формы */
  $recaptcha = $_REQUEST['********'];
  $secret = '********';
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
  $status = 1;
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $text_request = $_POST["text_request"];
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $email = htmlspecialchars($email);// Преобразуем спецсимволы в HTML-сущности
  $phone = htmlspecialchars($phone);// Преобразуем спецсимволы в HTML-сущности
  $text_request = htmlspecialchars($text_request);// Преобразуем спецсимволы в HTML-сущности
  $mysqli = new mysqli('localhost','********','********','a67474_db');// Подключается к базе данных


  if(!empty($recaptcha)) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    if(!$curl) {
       $status = 2;    
    } else {
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_TIMEOUT, 10);
      curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
      $curlData = curl_exec($curl);
      curl_close($curl);    
      $curlData = json_decode($curlData, true);

      if($curlData['success']) {
        $status = 0;
      }
      if (mb_strlen($name) < 2 || mb_strlen($name) > 30 ) {
        $status = 3;
      }
      if (mb_strlen($email) < 5 || mb_strlen($email) > 32 ) {
        $status = 5;
      }
      if (mb_strlen($phone) < 10 || mb_strlen($phone) > 15 ) {
        $status = 6;
      }
      if (mb_strlen($text_request) < 5 || mb_strlen($text_request) > 199 ) {
        $status = 4;
      } 
    }
} 

if($status === 0) {  
  $mysqli->query("INSERT INTO `requests` (`name`, `email`, `phone`, `text_request`) VALUES ('$name', '$email', '$phone', '$text_request')");// Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
} 
else if($status === 1) {  
    echo "Капча не валидна";
} 
else if($status === 2) {  
    echo "Возникла ошибка";
}
  else if($status === 3) {  
    echo "Введидте настоящее имя.";
}
  else if($status === 4) {  
    echo "Длина описания заявки должна быть от 5 символов и до 200.";
}
  else if($status === 5) {  
    echo "Введидте настоящий Email.";
}
  else if($status === 6) {  
    echo "Введите настоящий телефон.";
}

?>