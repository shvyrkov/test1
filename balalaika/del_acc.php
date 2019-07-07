<?php
session_start(); //Запуск сессии
include('bd.php'); // Подключение БД
if(!empty($_SESSION['email'])){ // Проверка входа в л.к.
    $email = $_SESSION['email']; // Из obr_base.php
}
else {
    exit('<meta charset="utf-8"> Войдите в личный кабинет
    <meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'">');
}
// Удаление товаров из таблицы `balalaiki` по e-mail - работает!
$mysqli->query("DELETE FROM `balalaiki` WHERE `email`='$email'");
// Удаление аккаунта из таблицы `users` по e-mail - работает!
$mysqli->query("DELETE FROM `users` WHERE `email`='$email'");
// Выход из сессии
include 'exit.php';
?>