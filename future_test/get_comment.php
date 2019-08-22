<?php 
session_start(); //Запуск сессии
include 'bd.php'; // Подключение БД

if(!$_POST['form_name']) // Проверка ввода имени
    exit ('<meta http-equiv="refresh" content="3;URL=index.php"> 
        <meta charset="utf-8">
        <script>alert("Укажите имя!")</script>');
        
if(!$_POST['form_comment']) // Проверка ввода комментария
    exit ('<meta http-equiv="refresh" content="3;URL=index.php"> 
        <meta charset="utf-8">
        <script>alert("Внесите комментарий!")</script>');
        
$user_name = htmlspecialchars(stripslashes($_POST['form_name'])); // Имя из формы + "очистка".
$user_comment = htmlspecialchars(stripslashes($_POST['form_comment'])); // Комментарий из формы + "очистка".
$user_date = date("d.m.y"); // Текущая дата
$user_time = date("H:i"); // Текущее время
   
//echo("Текущее время: $user_time и дата: $user_date .<br>");//test
//echo $user_name;//test

// Внесение записи в таблицу SQL.   
    $mysqli->query("INSERT INTO `users`(`name`, `time`, `date`, `comment`) 
                        VALUES ('$user_name','$user_time','$user_date','$user_comment')"); 
    if(!$mysqli) { // Если нет доступа к таблице 
        echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
        <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
        exit;
    }
unset($_POST['form_name']); // Удаление значения переменной   
unset($_POST['$user_comment']); // Удаление значения переменной   
//echo '$_POST[\'form_name\']: '.$_POST['form_name'];//test
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>