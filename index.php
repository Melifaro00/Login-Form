<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Форма входа на сайт</title>
  <style>
    .del { display: none; }
    .del:not(:checked) + label + * { display: none; } 
    /* вид CSS кнопки */
    .del:not(:checked) + label,
    .del:checked + label {
    display: inline-block;
    padding: 2px 10px;  
     }
    /*.del:checked + label {}*/
  </style> 
</head>
<body>

<?php 
    session_start(); 
    $login = $_SESSION['login'];
    $auth = $_SESSION['auth'];
    //echo "login="; echo $_SESSION['login'];
    //echo "auth="; echo $_SESSION['auth'];
    if ($_SESSION["auth"] == 0)
    {
?>
  <button><a href="/send.php">Задать вопрос</a></button>
  <button><a href="/login.php">Войти на сайт</a></button>
  <button><a href="/register.php">Зарегистрироваться</a></button>
  <hr>
  <input type="checkbox" id="raz" class="del"> 
  <label for="raz" class="del">1. Как мне установить XAMPP?</label>
  <div> Для простмотра войдите на сайт </div><br>

  <input type="checkbox" id="raz2" class="del"> 
  <label for="raz2" class="del">2. Как мне запустить XAMPP??</label>
  <div> Для простмотра войдите на сайт </div><br>

  <input type="checkbox" id="raz3" class="del"> 
  <label for="raz3" class="del">3. Как я мне остановить XAMPP?</label>
  <div> Для простмотра войдите на сайт </div><br>

  <input type="checkbox" id="raz4" class="del"> 
  <label for="raz4" class="del">
    4. Дан массив из 4х элементов PHP,Java,Ci,Ci++. Написать программу меняющую местами ключи и значения.
  </label>
  <div> Для простмотра войдите на сайт </div><br>

  <input type="checkbox" id="raz5" class="del"> 
    <label for="raz5" class="del">
      5. Даны 2-е строки "Понятие языка программирования" и "Архитектура клиент-сервер".
      Построить 2-а массива в котором ключами являются буквы алфавита, а значения количество букв в строке"
      </label>
  <div> Для простмотра войдите на сайт </div><br>

  <input type="checkbox" id="raz6" class="del"> 
    <label for="raz6" class="del">
      6. Даны 2-а массива из ключей массивов построить массив как результат их пересечения (ключи с нулевым количеством букв не учитывать)
    </label>
  <div> Для простмотра войдите на сайт </div><br>

<?php 
    }
    else
    {
        header ('Location: auth.php');  // перенаправление на нужную страницу
        exit(); 
    }
?>






</body>
</html>