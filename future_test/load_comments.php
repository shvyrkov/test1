<?php
require_once 'bd_connection.php'; // $dbhost, $dbuser, $dbpass, $dbname Подключение БД
// Достаем всё из БД 
$query = "SELECT * FROM `users` ORDER by id DESC";

require_once 'bd_request.php'; // Запрос в БД
       
if (!$result) // Если получение данных из таблицы не прошло
{
    echo "SELECT failed<br><br>";
}

$i=0;
while ($row = $result->fetch_assoc()) 
{
    //echo '<br>user_name: '.$row["name"].'<br>';
        $load_comments[$i]["comment_id"] = htmlspecialchars($row["id"]);
        $load_comments[$i]["user_name"] = htmlspecialchars($row["name"]);
        $load_comments[$i]["user_time"] = htmlspecialchars($row["time"]);
        $load_comments[$i]["user_date"] = htmlspecialchars($row["date"]);
        $load_comments[$i]["user_comment"] = htmlspecialchars($row["comment"]);
        $i++;
        //echo '<br>user_name: '.$load_comments[$i]["user_name"].'<br>';
}
    
$result->close();
$connection_bd->close();
?>