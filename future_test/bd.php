<?php // Код для подключения к БД
session_start(); //Запуск сессии
$dbhost = localhost; // Хост базы данных localhost
$dbuser = shvyrkov_future; // Пользователь базы данных shvyrkov_future
$dbpass = future_220819; // Пароль от базы данных future_220819
$dbname = shvyrkov_future; // Имя базы данных shvyrkov_future
echo '<meta charset="utf-8"><br>';// Выставляем кодировку

// Создаем объект mysqli и подключаемся к БД
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
$mysqli->set_charset("utf8"); // Выставляем кодировку. 
if ($mysqli->connect_error) { // Если нет доступа к БД
    die('Не могу соединиться с БД. <br> Код ошибки: ' . $mysqli->connect_errno . '<br> ошибка: ' . $mysqli->connect_error);
}
?>