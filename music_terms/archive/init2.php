<?php
session_start(); // Запуск сессии на сервере
// Выполнение действий кнопкок Старт и Сброс - инициализация кол-ва прав.ответов и массива заданных вопросов

//$_SESSION['asked_questions'] = array(); // Массив заданных вопросов
$_SESSION['comment'] = '';// Комментарий к ответу
$_SESSION['right_answer'] = 0;// Количество правильных ответов
$_SESSION['wrong_answer'] = 0;// Количество неправильных ответов
$_SESSION['total'] = 0;// Всего ответов
$_SESSION['ital1'] = '';//Сброс содержимого переменной
$_SESSION['ital2'] = '';//Сброс содержимого переменной
$_SESSION['rus1'] = '';//Сброс содержимого переменной
$_SESSION['rus2'] = '';//Сброс содержимого переменной
/*
echo '<meta charset="utf-8">'; // ВЫставление кодировки
echo 'ital1: '.$_SESSION['ital1'].'<br>';//test
echo 'ital2: '.$_SESSION['ital2'].'<br>';//test
echo 'rus1: '.$_SESSION['rus1'].'<br>';//test
echo 'rus2: '.$_SESSION['rus2'].'<br>';//test
echo 'right_answer: '.$_SESSION['right_answer'].'<br>';//test
echo 'wrong_answer: '.$_SESSION['wrong_answer'].'<br>';//test
echo 'total: '.$_SESSION['total'].'<br>';
*/
exit('<meta http-equiv="refresh" content="0; URL=index.php">');// Возврат обратно через 3 сек. на index.php
?>