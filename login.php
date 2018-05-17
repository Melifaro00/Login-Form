<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Форма входа на сайт</title>
</head>
<body>
<h2>Форма входа на сайт</h2>
<form  method="post">
    <input type="text" name="login" placeholder="Логин"><br><br>
    <input type="password" name="pass" placeholder="Пароль"><br><br>
    <input type="submit" name="submit" placeholder="Войти"><br>
</form>
<a href="index.php">На главную</a>

<?php 
    // 1|user111|Y0dGemN6RXhNUT09|2|user222|Y0dGemN6SXlNZz09|3|user333|Y0dGemN6TXpNdz09|4|user444|Y0dGemN6UTBOQT09
    //  1|user111|pass111|2|user222|pass222|3|user333|pass333       
    //echo "<b>Исходная База данных (строка):</b> ";
    $f = file_get_contents("userbd.html");    
    $data = ( explode( '|', $f ) ); // Разбиваем строку           
    $kol=count($data);     
    $k=$kol/3;   
    $z=0;
    $i=1;  
if (isset($_POST['submit']))
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];    
    
    while ($i <= $k)
    {
        //Шаг1 ID
        $z=$z+1;
        
        //Шаг2 LOGIN    
        if( $login == $data[$z])
        {   
            $z=$z+1;            
            $data[$z]=base64_decode(base64_decode($data[$z])); // взяли пароль из базы и раскодировали            
            if( $pass == $data[$z])      // Сравнили с введенным с клавиатуры
            {   
                session_start();
                $_SESSION['auth'] = 1;
                $_SESSION['login'] = $login;                
                header ('Location: auth.php');  // перенаправление на нужную страницу
                exit();                          
            }            
            else {
            } 
            $z=$z-1;
        }  
        else {   
            }     
        $z=$z+1;            
        //Шаг3 Пароль        
        $z=$z+1;             
        $id = $data[$z];           
        $i=$i+1;        
    }  
    echo "Неправильный логин или пароль";    
}
?>
</body>
</html>