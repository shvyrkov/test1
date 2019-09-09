<?php // Внесение данных в БД.
require_once 'bd_connection.php'; // Подключение БД
require_once 'safe_insertion.php';// Функция mysql_entities_fix_string() для предотвращения атак внедрения SQL и XSS

if(!$_POST['form_name']) // Проверка ввода имени
    exit ('<meta http-equiv="refresh" content="1;URL=index.php"> 
        <meta charset="utf-8">
        <script>alert("Укажите имя!")</script>');
        
if(!$_POST['form_comment']) // Проверка ввода комментария
    exit ('<meta http-equiv="refresh" content="1;URL=index.php"> 
        <meta charset="utf-8">
        <script>alert("Внесите комментарий!")</script>');
        
$user_name = mysql_entities_fix_string($connection_bd, $_POST['form_name']); // Имя из формы + "очистка".
$user_comment = mysql_entities_fix_string($connection_bd, $_POST['form_comment']); // Комментарий из формы + "очистка".
$user_date = date("d.m.y"); // Текущая дата
$user_time = date("H:i"); // Текущее время
   
// Внесение записи в таблицу SQL.  
$query = "INSERT INTO `users`(`name`, `time`, `date`, `comment`) 
                    VALUES ('$user_name','$user_time','$user_date','$user_comment')";

require_once 'bd_request.php'; // Запрос в БД
       
if (!$result) // Если запись в таблицу не прошла
{
    echo "INSERT failed<br><br>";
}
   
// Сброс переменных и объектов.   
unset($_POST['form_name']); // Удаление значения переменной   
unset($_POST['$user_comment']); // Удаление значения переменной  
unset($result);
//$result->close();// Если используется с SELECT...
$connection_bd->close();

echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>