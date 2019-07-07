<?php
session_start(); //Запуск сессии
include('bd.php'); // Подключение БД

if(!isset($_POST['email'])) // Если параметра email нет, то программа завершится
// Если произошел несанкционированный вход на obr_base.php, то выдается запись "В доступе отказано" и через 3 сек. происходит переадресация на сайт index.php 
    exit ('<meta http-equiv="refresh" content="3;URL=index.php"> 
        <meta charset="utf-8">
        <h1>В доступе отказано!</h1>');
// Определение цели посещения: вход или регистрация. Здесь - вход.
if($_POST['target'] == 'enter' && !empty($_POST['email']) && !empty($_POST['password'])) { // Если "Вход", введены email и пароль.
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass = md5(md5($pass)); // Шифрование введенног пароля функцией md5
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pass' "); 
    $result = $result ->fetch_assoc();
    
    if(!empty($result['id'])){ // Если id существует, т.е. пользователь зарегестрирован, то получаем его данные.
        $_SESSION['name'] = $result['name'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        //$_SESSION['avatar'] = $result['avatar'];
        
        echo $_SESSION['name'].', вы успешно авторизованы!
           <meta http-equiv="refresh" content="3;URL=lk.php">';
           // Эта строка обязательна! Иначе нет перехода на сайт из модального окна. Она дает задержку 3сек.
    }
    else exit('Логин или пароль не верны.<meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'">');
// Достаем фотки и пр.
    $balalaiki = $mysqli->query("SELECT * FROM `balalaiki` WHERE `email`='$email'"); // $balalaiki - двумерный массив
    $i=0;
    echo '<meta charset="utf-8"><br>';
    while ($row = $balalaiki->fetch_assoc()) {
            //echo '<br>email: '.$row["email"].'    photo: '.$row['photo'].'<br>';
            $_SESSION['photo'][$i] = $row["photo"];
            $_SESSION['title'][$i] = $row["title"];
            $_SESSION['price'][$i] = $row["price"];
            $_SESSION['tel'][$i] = $row["tel"];
            $_SESSION['metro'][$i] = $row["metro"];
            $_SESSION['description'][$i] = $row["description"];
            $i++;
        }
}
// Проверяем заполненность полей запроса к БД при регистрации нового пользователя
else if($_POST['target'] == 'registration' && !empty($_POST['name']) 
        && !empty($_POST['lastname']) && !empty($_POST['email']) 
        && !empty($_POST['password']) && !empty($_POST['password_2'])) {
    // Проверка совпадения паролей
        if($_POST['password'] === $_POST['password_2']) {
        // Защита от HTML-инъекций.    
            $name = stripslashes($_POST['name']);// Удаление экранирования символов.
            $name = htmlspecialchars($name);// Преобразует специальные символы в HTML-сущности
            $lastname = stripslashes($_POST['lastname']);
            $lastname = htmlspecialchars($lastname);
            $email = stripslashes($_POST['email']);
            $email = htmlspecialchars($email);
            $pass = stripslashes($_POST['password']);
            $pass = htmlspecialchars($pass);    
        // Шифрование пароля функцией md5    
            $pass = md5(md5($pass)); 
        }
        else {// Пароли не совпадают
            exit ('Пароли не совпадают. 
                <meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'">');
        }
// Проверка наличия пользователя с таким же e-mail
        $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' "); 
        $result = $result ->fetch_assoc(); // Преобразование в асссоциативный массив
        if(!empty($result['id'])) {
            exit('Извините, но такой пользователь уже существует.
                <meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'">'); // Exit - завершает программу
        }
// Добавление записи (строки) в БД.
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `password`) VALUES ('$name', '$lastname', '$email', '$pass')");
        
        $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' "); 
        $result = $result ->fetch_assoc(); // Преобразование в асссоциативный массив
        
        $_SESSION['name'] = $result['name'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        //$_SESSION['avatar'] = $result['avatar'];
        
        echo $_SESSION['name'].', вы успешно зарегистрировались!
                        <meta http-equiv="refresh" content="3;URL=lk.php">';
}
else { // Если поля не заполнены, то выдается запись "Не все поля заполнены" и через 3 сек. происходит переадресация на сайт index.php 
    exit ('Не все поля заполнены <meta http-equiv="refresh" content="3">');
}
?>