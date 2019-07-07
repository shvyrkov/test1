<?php 
session_start(); //Запуск сессии
include('bd.php'); // Подключение БД

$info = $_POST['info'];// Передача имени файла - $_SESSION['photo'][$i]
$ind = $_POST['ind'];// Передача id карточки - value="'.$i.'"
echo '$info = '.$info.'<br>';
echo '$ind = '.$ind.'<br><br>';
// Удаление строчки из таблицы в БД - работает!
$mysqli->query("DELETE FROM `balalaiki` WHERE `photo`='$info'");
// Удаление файла с сервера
unlink('store/'.$info);
// Удаление переменной $_SESSION['photo'][$i]
//echo '$_SESSION[\'photo\'][$ind]) = '.$_SESSION['photo'][$ind].'<br>';
unset($_SESSION['photo'][$ind]);// Удаление переменной сессии
unset($_SESSION['title'][$ind]);// Удаление переменной сессии
unset($_SESSION['price'][$ind]);// Удаление переменной сессии
unset($_SESSION['tel'][$ind]);// Удаление переменной сессии
unset($_SESSION['metro'][$ind]);// Удаление переменной сессии
unset($_SESSION['description'][$ind]);// Удаление переменной сессии
//echo '$_SESSION[\'photo\'][$ind]) = '.$_SESSION['photo'][$ind].'<br>';
// Удаление карточки со страницы - перезагрузка
include 'load_photo.php';
/*
echo '<script>
alert('.$ind.');
        del_card('.$ind.'); 
alert(\'card deleted\');    
    </script>
    <meta charset="utf-8">
    <h3>Скрипт выполнен. Карточка c id="'.$ind.'" удалена.</h3>';
*/
echo '<h2>File '.$info.' has been deleted</h2>
      <meta http-equiv="refresh" content="0;URL=lk.php"> ';



?>
