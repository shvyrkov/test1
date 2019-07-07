<?php
session_start(); // Запуск сессии на сервере
$answer = $_POST['answer'];// Ответ пользователя
$ital_1 = $_SESSION['ital1'];
$ital_2 = $_SESSION['ital2'];
if($answer == 'yes') {
    if($ital_1 == $ital_2) { //Проверка правильного утверждения
        $_SESSION['right_answer']++;
        $_SESSION['comment'] = '<br>Верно<br>'.$ital_1.' - это '.$_SESSION['rus1'];
        //echo 'YES-RIGHT<br>';
    }
    else {
        $_SESSION['wrong_answer']++;
        $_SESSION['comment'] = '<br>Неверно<br>'.$ital_1.' - это '.$_SESSION['rus1'];
       //echo 'YES-WRONG<br>';
    }
}
else {//Проверка неправильного утверждения
    if($answer == 'no') {
        if($ital_1 != $ital_2) {
            $_SESSION['right_answer']++;
            $_SESSION['comment'] = '<br>Верно<br>'.$ital_1.' - это '.$_SESSION['rus1'];
            //echo 'NO-RIGHT<br>';
        }
        else {
            $_SESSION['wrong_answer']++;
            $_SESSION['comment'] = '<br>Неверно<br>'.$ital_1.' - это '.$_SESSION['rus1'];
            //echo 'NO-WRONG<br>';
        }
    }
}
$_SESSION['total'] = $_SESSION['right_answer'] + $_SESSION['wrong_answer'];// Всего задано вопросов
/*
echo '<meta charset="utf-8">'; // ВЫставление кодировки
echo 'answer:'.$_POST['answer'].'<br>';
echo 'ital1: '.$_SESSION['ital1'].'<br>';//test
echo 'ital2: '.$_SESSION['ital2'].'<br>';//test
echo 'right_answer: '.$_SESSION['right_answer'].'<br>';//test
echo 'wrong_answer: '.$_SESSION['wrong_answer'].'<br>';//test
echo 'total: '.$_SESSION['total'].'<br>';//test
$_POST['answer'] = '';

$_SESSION['ital1'] = '';//Сброс содержимого переменной
$_SESSION['rus2'] = '';//Сброс содержимого переменной
$_SESSION['rus1'] = '';//Сброс содержимого переменной
*/
$_SESSION['ital2'] = '';//Сброс содержимого переменной для блокировки клавиш Да/Нет

exit('<meta http-equiv="refresh" content="0; URL=index.php">');// Возврат обратно через 3 сек. на index.php
?>