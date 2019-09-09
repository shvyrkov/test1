<?php // Подключения к БД
// Параметры регистрации для подключения к БД
$dbhost = 'localhost'; // Хост базы данных localhost
$dbuser = 'root'; // Пользователь базы данных shvyrkov_future
$dbpass = 'mysql'; // Пароль от базы данных future_220819
$dbname = 'future_test'; // Имя базы данных shvyrkov_future
echo '<meta charset="utf-8"><br>';// Выставляем кодировку для браузера.
$connection_bd = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Создаем объект mysqli и подключаемся к БД.
$connection_bd->set_charset("utf8"); // Выставляем кодировку для обмена данными с сервером баз данных.
if ($connection_bd->connect_error) { // Если нет доступа к БД
//    die('Не могу соединиться с БД. <br> Код ошибки: ' . $mysqli->connect_errno . '<br> ошибка: ' . $mysqli->connect_error);
    echo '<meta http-equiv="refresh" content="3;URL=index.php"> 
        <h2>Не могу соединиться с базой данных.<br> 
        Проверьте правильность подключения или свяжитесь со своим системным администратором.</h2>';
    exit;
}
?>