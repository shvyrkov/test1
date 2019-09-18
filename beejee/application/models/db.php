<?php

class Db
{
    /**
     * Метод getConnection() осуществляет подключение к БД 
     * 
     * return $db_connection - объект типа mysqli
     */

	public static function getConnection()
	{
		// Параметры регистрации для подключения к БД
        $dbhost = 'localhost'; // Хост базы данных localhost
        $dbuser = 'shvyrkov_beejee'; // Пользователь базы данных shvyrkov_beejee
        $dbpass = 'beejee_150919'; // Пароль от базы данных beejee_150919
        $dbname = 'shvyrkov_beejee'; // Имя базы данных shvyrkov_beejee
        echo '<meta charset="utf-8"><br>';// Выставляем кодировку для браузера.
        
        $db_connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Создаем объект mysqli и подключаемся к БД.
        $db_connection->set_charset("utf8"); // Выставляем кодировку для обмена данными с сервером баз данных.
        if ($db_connection->connect_error) { // Если нет доступа к БД
        //    die('Не могу соединиться с БД. <br> Код ошибки: ' . $mysqli->connect_errno . '<br> ошибка: ' . $mysqli->connect_error);
        echo '<meta http-equiv="refresh" content="3;URL=index.php"> 
            <h2>Не могу соединиться с базой данных.<br> 
            Проверьте правильность подключения или свяжитесь со своим системным администратором.</h2>';
        exit;
}

			return $db_connection;
		}
}
?>