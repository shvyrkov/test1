<?php
session_start(); //Запуск сессии
include('bd.php'); // Подключение БД
// Объект musqli имеет встроенную защиту от взлома БД.    
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Функция для подключения к БД с параметрами  БД
$mysqli->set_charset("utf8"); // Выставляем "хорошую" кодировку. -> использование метода в php
//echo '<meta charset="utf-8">'; 

if(!isset($_POST['email'])) // Если параметра email нет, то программа завершится
// Если произошел несанкционированный вход на obr_base.php, то выдается запись "В доступе отказано" и через 3 сек. происходит переадресация на сайт index.php 
    exit ('<meta http-equiv="refresh" content="3;URL=index.php"> 
        <meta charset="utf-8">
        <h1>В доступе отказано!</h1>');
        
// Определение цели посещения: вход или регистрация. Здесь - вход.
if($_POST['target'] == 'enter' && !empty($_POST['email']) && !empty($_POST['password'])) { // Если "Вход", введены email и пароль.
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass = md5(md5($pass)); // Шифрование пароля функцией md5
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pass' "); 
    $result = $result ->fetch_assoc();
    

    
    if(!empty($result['id'])){
        $_SESSION['name'] = $result['name'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['avatar'] = $result['avatar'];
        
       
        
        echo $_SESSION['name'].', вы успешно авторизованы!';
    }
    else exit('Логин или пароль не верны.');
}
// Проверяем заполненность полей запроса к БД.
else if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
// Защита от HTML-инъекций.    
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $lastname = stripslashes($lastname);
    $lastname = htmlspecialchars($lastname);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);    
    
    $pass = md5(md5($pass)); // Шифрование пароля функцией md5
    
// Проверка наличия пользователя с таким же e-mail
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' "); 
    $result = $result ->fetch_assoc(); // Преобразование в асссоциативный массив
        if(!empty($result['id'])) {
            exit("Извините, но такой пользователь уже существует."); // Exit - завершает программу
        }
// Добавление записи (строки) в БД.
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `password`) VALUES ('$name', '$lastname', '$email', '$pass')"); 
    echo 'Вы успешно зарегистрировались!';
    
}
else  // Если поля не заполнены, то выдается запись "Не все поля заполнены" и через 3 сек. происходит переадресация на сайт index.php 
    echo '
    <meta http-equiv="refresh" content="3;URL=index.php"> 
    <h2>Не все поля заполнены.</h2>';
?>