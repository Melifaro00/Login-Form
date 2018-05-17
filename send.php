<html>
    <head>
        <title>Форма заявки с сайта</title>
    </head>
<body>  
<style>
    .titl{
        min-width:130px; 
        float:left;
    }
</style>
<div style="width:400px;">
    <form action="send.php" method="post">        
        <div class="titl"> 
            <strong>Имя:</strong>
        </div>
        <div>
            <input type="text" name="fio" MINLENGTH="3" MAXLENGTH="40" placeholder="Укажите ФИО" required><br><br>
        </div>
        <div class="titl"> 
            <strong>E-mail:</strong>
        </div>
        <div>
            <input type="text" name="email" placeholder="Укажите e-mail" required><br><br>
        </div>
        <div class="titl"> 
            <strong>Текст вопроса:</strong>
        </div>
        <div>
            <textarea rows="5" cols="50" required name="message" placeholder="введите текст">
            </textarea>
        </div><br><br>
        <center><input type="submit" value="Отправить"></center>
    </form> 
</div>
<?php            
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $message = $_POST['message'];           
    $emailadmin='buyanov@adn.agency';
    $to=$email.', '.$emailadmin;

    // запись в массив
    $arr[1] = $fio; 
    $arr[2] = $email; 
    $arr[3] = $message;        
    // Удаляем пробелы (или другие символы) из начала и конца строки
    $arr[1] = trim($arr[1]);
    $arr[2] = trim($arr[2]);
    $arr[3] = trim($arr[3]);

    echo "<b>Успешно отправлено:</b> <br>";
    echo $arr[1]; echo "<br>";
    echo $arr[2]; echo "<br>";
    echo $arr[3]; echo "<br>";
    echo "<br>";
    
    $strarr = serialize($arr); 
    echo "<b>Cериализованный массив:</b>";
    echo $strarr."<br />";         
    echo "<br /> <b>Cериализованный закодированный массив:</b><br />";
    echo base64_encode($strarr);
    echo "<br /><br /> <b>Массив JSON:</b>"; 
    $jarr=json_encode($arr, JSON_UNESCAPED_UNICODE);        

    // Открыть текстовый файл ,записать переменные в файл, 
    // открыть файл для чтения и прочитать строку, закрыть.
    $bd = fopen("bdtest.json", "w"); 
    fwrite($bd, $jarr);
    $bd = fopen("bdtest.json", "r");    
    echo fgets($bd);    

    //echo $to;
    // Генерация пароля
    $chars="abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ-_"; // Допустимые символы, в пароле. 
    $max=10; // Количество символов в пароле.         
    $size=StrLen($chars)-1; // Определяем количество символов в $chars
    $password=null; // Определяем пустую переменную, в которую и будем записывать символы. 
    
    // Создаём пароль. 
    while($max--) 
    $password.=$chars[rand(0,$size)];       
    //echo "<left> Сгенерированный пароль: <font face=verdana color=red size=4> <b>".$password."</b><br><br></font> </left>"; 

    //mail("на какой адрес отправить", "тема письма", "Сообщение (тело письма)","From: с какого email отправляется письмо \r\n");
    if (mail("Melifaro00@yandex.ru", 
            "Тема: Заявка с сайта",  
            "<br>ФИО: ".$fio.
            "<br>E-mail: ".$to.
            "<br>Сообщение".$message.
            "<br>Пароль:".$password ,
            "From: Melifaro12@mail.ru \r\n"))
    {             
        // Проверки
        // 1. функция преобразует все символы
        $fio = htmlspecialchars($fio);    
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);

        // 2. функция декодирует url, если пользователь попытается его добавить в форму
        $fio = urldecode($fio);
        $email = urldecode($email);

        // 3. удалим пробелы с начала и конца строки
        $fio = trim($fio); 
        $email = trim($email);
        $message = trim($message);      
        
        $fio = base64_encode ($fio);
        $email = base64_encode ($email);
        $message = base64_encode ($message);

        $fio = serialize($fio);
        $email = serialize($email);
        $message = serialize($message);
        
    } 
?>
<style>
    .del { display: none; }
    .del:not(:checked) + label + * { display: none; } 
    /* вид CSS кнопки */
    .del:not(:checked) + label,
    .del:checked + label {
    display: inline-block;
    padding: 2px 10px;
    /*border-radius: 2px;
    color: #fff;
    background: #4e6473;
    cursor: pointer;*/
    }
    /*.del:checked + label {
    background: #e36443;
    }*/
</style> </br>
<a href="/index.php">Вернуться к справке</a>
<a href="/bdtest.json" target="blank">Посмотреть отправленное сообщение в базе</a>
</body>
</html>