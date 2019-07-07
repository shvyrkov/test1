<?php // Программа обработки ответа пользователя.
session_start(); // Запуск сессии на сервере.
include('bd.php'); // Подключение БД.
$answer = $_POST['answer'];// Ответ пользователя.
if($answer == 'yes') {
    if($_SESSION['ital1'] == $_SESSION['ital2']) { // Проверка правильного утверждения.
        $_SESSION['right_answer']++;
        $_SESSION['comment'] = '<br>Верно<br>'.$_SESSION['ital1'].' - это '.$_SESSION['rus1'];
        $_SESSION['answer_color'] = 'darkgreen';
    }
    else {
        $_SESSION['wrong_answer']++;
        $_SESSION['comment'] = '<br>Неверно<br>'.$_SESSION['ital1'].' - это '.$_SESSION['rus1'];
        $_SESSION['answer_color'] = 'maroon';
    }
}
else { //Проверка неправильного утверждения.
    if($answer == 'no') {
        if($_SESSION['ital1'] != $_SESSION['ital2']) {
            $_SESSION['right_answer']++;
            $_SESSION['comment'] = '<br>Верно<br>'.$_SESSION['ital1'].' - это '.$_SESSION['rus1'];
            $_SESSION['answer_color'] = 'darkgreen';
        }
        else {
            $_SESSION['wrong_answer']++;
            $_SESSION['comment'] = '<br>Неверно<br>'.$_SESSION['ital1'].' - это '.$_SESSION['rus1'];
            $_SESSION['answer_color'] = 'maroon';
        }
    }
}
$_SESSION['total'] = $_SESSION['right_answer'] + $_SESSION['wrong_answer'];// Всего задано вопросов
include('question.php');// Подключение программы выбора вопроса.
exit('<meta http-equiv="refresh" content="0; URL=index.php">');// Возврат обратно через 0 сек. на index.php
?>