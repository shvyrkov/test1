<?php
session_start(); // Запуск сессии на сервере
include('bd.php'); // Подключение БД
$_SESSION['comment'] = '';// Комментарий к ответу
$_SESSION['right_answer'] = 0;// Количество правильных ответов
$_SESSION['wrong_answer'] = 0;// Количество неправильных ответов
$_SESSION['total'] = 0;// Всего ответов
$_SESSION['answer_color'] = '';
include('question.php');// Подключение программы выбора вопроса.
exit('<meta http-equiv="refresh" content="1; URL=index.php">');// Возврат обратно через 3 сек. на index.php
?>