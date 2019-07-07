<?php // Код для подключения к БД
$dbhost = 'localhost'; // Хост базы данных
$dbuser = 'shvyrkov_db_1'; // Пользователь базы данных
$dbpass = 'baykal'; // Пароль от базы данных
$dbname = 'shvyrkov_db_1'; // Имя базы данных
// Объект mysqli имеет встроенную защиту от взлома БД.    
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Функция для подключения к БД с параметрами  БД
$mysqli->set_charset("utf8"); // Выставляем "хорошую" кодировку. 
?>