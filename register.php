<form method="POST">    
    <h2>Форма регистрации</h2>    
    <p>Логин:  <input name="login" type="text"><br><br>
    Пароль: <input name="password" type="password"><br><br>  
    <input name="submit" type="submit" value="Зарегистрироваться"></p>  
</form>
<a href="index.php">К форме входа на сайт</a><br><br>

<?php   // Регситрации нового пользователя                
        // 1|user111|Y0dGemN6RXhNUT09|2|user222|Y0dGemN6SXlNZz09|3|user333|Y0dGemN6TXpNdz09|4|user444|Y0dGemN6UTBOQT09
        //  1|User111|pass111|2|User222|pass222|3|User333|pass333  
// Если нажали на кнопку - Зарегистрироваться
if(isset($_POST['submit'])) 
{
    $err = array();
    //Проверки:
    # 1. Проверям логин 
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    { 
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
    if(strlen($_POST['login']) < 6 or strlen($_POST['login']) > 30)  
    {
        $err[] = "Логин должен быть не меньше 6-х символов и не больше 30";
    }
    if(strlen($_POST['password']) < 6 or strlen($_POST['password']) > 30)  
    {
        $err[] = "Пароль должен быть не меньше 6-х символов и не больше 30";
    }        
    $login = $_POST['login']; // Получили логин и пароль с формы
    $password = $_POST['password'];   
    
    $f = file_get_contents("userbd.html");   
    $data = ( explode( '|', $f ) );        // Разбиваем строку       
    $kol=count($data);                     // Количество элементов массива
    $k=$kol/3;                             // Кол-во пользователей        
    $z=0;                                  // Текущий элемент массива 
    $i=1;                                  // Бегунок № пользователя
    
    while ($i <= $k)  // 2. Сущестует ли пользователь с таким именем ?
    {
        //Шаг1 ID         
        $z=$z+1;        
        //Шаг2 LOGIN        
        if( $_POST['login'] == $data[$z] )
        {   
            $err[] = "Пользователь с таким именем уже существует. <br>"; 
            break;        
        }        
        $z=$z+1;    
        //Шаг3 LOGIN        
        $z=$z+1;
        $login = $data[$z];        
        $id = $data[$z];           
        $i=$i+1;
    }      
    # 3. Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)  
    {         
        $login = $_POST['login']; 
        $f = "userbd.html"; // Открыть текстовый файл     
        $k=$k+1;
        file_put_contents($f, "|".$k, FILE_APPEND);        // file_put_contents(куда пишем, что пишем); 3-й параметр FILE_APPEND
        file_put_contents($f, "|".$login, FILE_APPEND);    // чтобы повторные вызовы file_put_contents не удаляли содержимое файла,                       
        
        $password = base64_encode(base64_encode(trim($_POST['password'])));    // Убираем лишние пробелы и делаем двойное шифрование    
        file_put_contents($f, "|".$password, FILE_APPEND);    
        
        session_start();
        $_SESSION['login'] = $login;    

        echo "<br>Новый пользователь успешно создан: <br>";
    }
    else    
    {        
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }       
}
?>