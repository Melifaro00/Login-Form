<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Untitled Document</title>
    <style>
        .del { display: none; }
        .del:not(:checked) + label + * { display: none; } 
        /* вид CSS кнопки */
        .del:not(:checked) + label,
        .del:checked + label {
        display: inline-block;
        padding: 2px 10px; 
        }
        /*.del:checked + label */
    </style> 
</head>
<body>
<?php 
    session_start(); 
    $login = $_SESSION['login'];
    $auth = $_SESSION['auth'];
    //echo "login="; echo $_SESSION['login'];
    //echo "auth="; echo $_SESSION['auth'];
    if ($_SESSION["auth"] == 1)
    {
?>
    <h2>Вход выполнен</h2>
    <?php echo "Привет, $login" ?> <br><br>
    <button><a href="/send3.php">Задать вопрос</a></button>
    <form method="POST">        
        <input name="exit" type="submit" value="Выйти"></p>  
    </form>
    <?php // Если кнопка нажата
        if( isset( $_POST['exit'] ) )
        {   session_destroy();
        $auth = 0;   
        echo $auth;
        header ('Location: index.php');  // перенаправление на нужную страницу
        exit();      
    }
    ?>    
    <hr>
    <input type="checkbox" id="raz" class="del"> 
    <label for="raz" class="del">
        1. Как мне установить XAMPP?
    </label>
    <div>
        <p>Выберите ващу операционную систему и 32 или 64 битную версию.</p>
        <p>Измените разрешения для установщика</p>        
        <p>chmod 755 xampp-linux-*-installer.run</p>        
        <p>Запустите установщик</p>        
        <p>sudo ./xampp-linux-*-installer.run</p>        
        <p>Вот и всё. XAMPP теперь установлен под каталогом /opt/lampp.</p>    
    </div><br>

    <input type="checkbox" id="raz2" class="del"> 
        <label for="raz2" class="del">
            2. Как мне запустить XAMPP??
        </label>
    <div>
        <p>Starting XAMPP 1.8.2...</p>
        <p>LAMPP: Starting Apache...</p>
        <p>LAMPP: Starting MySQL...</p>
        <p>LAMPP started.</p>
        <p>Ready. Apache and MySQL are running.</p>
        <p>Если вы получили сообщение об ошибке посетите страницы нашего сообщества для помощи.</p>
        <p>Кстати, заметьте что есть графический инструмент который вы можете использовать чтобы легко управлятся с вашими серверами. Вы можете запустить этот инструмент с помощью следующих команд:</p>
        <p>cd /opt/lampp</p>
        <p>sudo ./manager-linux.run (or manager-linux-x64.run)</p>
    </div><br>

    <input type="checkbox" id="raz3" class="del"> 
        <label for="raz3" class="del">
            3. Как я мне остановить XAMPP?
        </label>
    <div>
        <p> Для остановки XAMPP просто вызовите команду:</p>
        <p>sudo /opt/lampp/lampp stop            </p>
        <p>Теперь вы должны видить чтото вроде этого на вашем экране:</p>
        <p>Stopping XAMPP 1.8.2...</p>
        <p>LAMPP: Stopping Apache...  </p>          
        <p>LAMPP: Stopping MySQL...       </p>     
        <p>LAMPP stopped.            </p>
        <p>Если вы получили сообщение об ошибке посетите страницы нашего сообщества для помощи.</p>
        <p>Кстати, заметьте что есть графический инструмент который вы можете использовать чтобы легко запустить или остановить ваши сервера. Вы можете запустить этот инструмент с помощью следующих команд:</p>
        <p>cd /opt/lampp</p> 
        <p>sudo ./manager-linux.run (or manager-linux-x64.run)</p>
    </div><br>

     <input type="checkbox" id="raz4" class="del"> 
        <label for="raz4" class="del">
        4. Дан массив из 4х элементов PHP,Java,Ci,Ci++. Написать программу меняющую местами ключи и значения.
        </label>
    <div>
    <?php echo "        
        < ? php <br>
            $ input = array( PHP, Java, Ci,Ci++);//поставь 2х кавычки и убери пробел перед $ и ?<br>
            $ flipped = array_flip($ input);//$<br> 
            print_r($ flipped);//$<br>
        ? >        ";
    ?>
    </div>
    <input type="checkbox" id="raz5" class="del"> 
        <label for="raz5" class="del">
            5. Даны 2-е строки "Понятие языка программирования" и "Архитектура клиент-сервер".
               Построить 2-а массива в котором ключами являются буквы алфавита, а значения количество букв в строке"
        </label>
    <div>
         <?php echo "        
            <br>//поставь 2х кавычки и убери пробел перед $ и ?<br><br>
            < ? php <br><br>
                $ str1 =  Понятие языка программирования;<br>
                $ str2 = Архитектура клиент-сервер;<br><br>
                
                $ dlina1 = strlen($ str1);<br>
                echo длина строки1 =; echo strlen($ str1);<br><br>

                $ dlina2 = strlen($ str2);<br>
                echo длина строки2 =; echo strlen($ str2);<br><br>
                
                $ str1 = str_split($ str1);<br>
                $ str2 = str_split($ str2);<br><br>
                
                // формируем массивы из строк<br>
                $ str1 = explode(", ", $ str1); 
                $ str2 = explode(", ", $ str2);<br><br>

                // Меняем местами ключи с их значениями в массиве<br>
                $ str1 = array_flip($ str1);//$<br> 
                $ str2 = array_flip($ str2);//$<br> <br>

                
                i=0;<br>
                while ($ i <= $ str1) <br>
                {<br>
                    $ arr[i]= $ dlina1;<br>
                }<br>

                k=0;<br>
                while ($ k <= $ str1) <br>
                {<br>
                    $ arr[k]= $ dlina2;<br>
                }<br>

                echo $ str1;<br>
                echo $ str2;<br>
                
            ? >        ";
        ?>
    </div><br>







    <input type="checkbox" id="raz6" class="del"> 
        <label for="raz6" class="del">
            6. Даны 2-а массива из ключей массивов построить массив как результат их пересечения (ключи с нулевым количеством букв не учитывать)
               
        </label>
    <div>
        ...
    </div><br>
    <hr>
    
    <?php 
    }
    else
    {
        header ('Location: index.php');  // перенаправление на нужную страницу
        exit(); 
    }
?>
</body>
</html>
