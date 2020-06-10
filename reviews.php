<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache">

    <title>Architech | Дизайны интерьеров</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>


        <header class="header">
            <div class="container">
                <div class="header__body">
                    <a href="index.html" class="header__logo">
                        <img src="img/logo.png" alt="">
                    </a>
                    <div class="header__burger">
                        <span> </span>
                    </div>
                    <nav class="header__menu">
                        <ul class="header__list">
                            <li><a href="works.html" class="header__link"><span>Портфолио</span></a></li>
                            <li><a href="price.php" class="header__link"><span>Цены и услуги</span></a></li>
                            <li><a href="reviews.php" class="header__link"><span>Отзывы</span></a></li>
                            <li><a href="contacts.html" class="header__link"><span>Контакты</span></a></li>
                            <li><a href="about.html" class="header__link"><span>О нас</span></a></li>
                        </ul>    
                    </nav>
                </div>
            </div>
        </header>

        
        <main>
        <div class="container">
          <div class="comm">
              <?php

                  $link = mysqli_connect('localhost','********','********','a67474_db');// Подключается к базе данных



                  if (isset ($_GET['del'])) {
                      $id = $_GET['del'];

                      $query = "DELETE FROM `comments` WHERE id=$id";
                      //echo $query; //Вытаскиваем все комментарии для данной страницы
                      mysqli_query($link, $query) or die( mysqli_error($link));
                      
                  }

                  $query = "SELECT * FROM `comments`"; //Вытаскиваем все комментарии для данной страницы
                  $result = mysqli_query($link, $query) or die( mysqli_error($link));

                  for ($data =[]; $row = mysqli_fetch_assoc($result); $data [] = $row);
                  //var_dump($data);
              ?>


            <?php foreach ($data as $user) { ?>

                    <?= $user['name'] ?><br />
                    
                    <?= $user['text_comment'] ?><br />
                    <?php 
                    include 'validation-forms/checkauth.php';
                    if($_COOKIE['user'] != $user['id'] or $_COOKIE['hash'] != $user['secretkey'] or (($user) == '')):
                    ?>
                      <br />
                    <?php else: ?> 
                    <div class="delet">
                    <?php 

                    ?>  
                    <a href="?del=<?= $user['id'] ?>">Удалить</a><br /><br />
                    </div>  
                    <?php endif;?>
 
            <?php } ?>
            </div>


        <div class="comment">
            <form name="comment" action="comment.php" method="post">

                <p>
                  <label>Имя:</label>
                  <input type="text" name="name" />
                </p>

                <p>
                  <label>Комментарий:</label>
                  <br />
                  <textarea name="text_comment" cols="39" rows="10"></textarea>
                </p>

                <div class="g-recaptcha" data-sitekey="6Ld1QAEVAAAAAHkJsiLhS3ZuPW_wzJgRux1RQ6hR"></div>
                <br />
                <p>
                  <input type="submit" value="Отправить" />
                  <br />
                </p>

            </form>
            <div class="privacy">
                  Нажимая кнопку "Отправить" вы даете согласие на обработку <a href="privacy-policy.html">персональных данных</a>.
                  <br />                  <br />
                  </div>
        </div>
      </div>

        </main>
    
    <footer>

    <footer>

        <div class="social">
            <a href="https://ru-ru.facebook.com/"><img src="img/sn/F.png" alt=""></a>
            <a href="https://vk.com/architech.design"><img src="img/sn/vk.png" alt=""></a>
            <a href="https://twitter.com/"><img src="img/sn/tw.png" alt=""></a>
            <a href="https://www.behance.net/"><img src="img/sn/m.png" alt=""></a>
            <a href="https://aboutme.google.com/"><img src="img/sn/g+.png" alt=""></a>
        </div>
          <p>Architech 2020</p>
          <p>airscoutchannel@gmail.com</p>
            <li><a href="login.php"><img src="img/sn/icons.png" alt=""></a></li>

    </footer>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript" ></script>
        <script src="js/script.js"></script>
        <script>
        $(document).ready(function(){
           $("#loginform").validate({
             rules:{
                login:{
                  required: true,
                  minlength: 4,
                  maxlength: 16,
                },
                pswd:{
                  required: true,
                  minlength: 6,
                  maxlength: 16,
                },
             },
             messages:{
               login:{
                 required: "Это поле обязательно для заполнения",
                 minlength: "Логин должен быть минимум 4 символа",
                 maxlength: "Максимальное число символов - 16",
             },
               pswd:{
               required: "Это поле обязательно для заполнения",
               minlength: "Пароль должен быть минимум 6 символа",
               maxlength: "Пароль должен быть максимум 16 символов",
               },
             }
          });
 
});
        </script>


</body>
</html>
       
        <script>
        $(document).ready(function(){
           $("#loginform").validate({
             rules:{
                login:{
                  required: true,
                  minlength: 4,
                  maxlength: 16,
                },
                pswd:{
                  required: true,
                  minlength: 6,
                  maxlength: 16,
                },
             },
             messages:{
               login:{
                 required: "Это поле обязательно для заполнения",
                 minlength: "Логин должен быть минимум 4 символа",
                 maxlength: "Максимальное число символов - 16",
             },
               pswd:{
               required: "Это поле обязательно для заполнения",
               minlength: "Пароль должен быть минимум 6 символа",
               maxlength: "Пароль должен быть максимум 16 символов",
               },
             }
          });
 
});
        </script>
    </body>
</html> 