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
if($_SESSION['total'] == 10) { // Выставление оценки после 10 вопросов.
    $mark = 5; //Оценка
    $_SESSION['answer_color'] = 'darkgreen';
    if($_SESSION['right_answer'] <= 8 && $_SESSION['right_answer'] > 6) {
        $mark = 4;
        $_SESSION['answer_color'] = 'blue';
    }
    else if ($_SESSION['right_answer'] <= 6 && $_SESSION['right_answer'] >= 4) {
        $mark = 3;
        $_SESSION['answer_color'] = 'orange';
    }
    else if ($_SESSION['right_answer'] < 4 && $_SESSION['right_answer'] >= 2) {
        $mark = 2;
        $_SESSION['answer_color'] = 'red';
    }
    else if ($_SESSION['right_answer'] <= 1 && $_SESSION['right_answer'] >= 0) {
        $mark = 1;
        $_SESSION['answer_color'] = 'maroon';
    }
    $_SESSION['comment'] = 'Ваша оценка: '.$mark;
    $_SESSION['ital1'] = '';
    $_SESSION['ital2'] = ''; //Блокировка клавиш Да/Нет
    $_SESSION['rus2'] = '';
    exit('<meta http-equiv="refresh" content="0; URL=index.php">');
}
include('question.php'); // Подключение программы выбора вопроса.
exit('<meta http-equiv="refresh" content="0; URL=index.php">'); // Возврат обратно через 0 сек. на index.php
?>