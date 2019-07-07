<?php // Программа выбора вопроса.
session_start(); // Запуск сессии на сервере
include('bd.php'); // Подключение БД
$length = $mysqli->query("SELECT COUNT(*) AS 'length' FROM `music_terms`");
$length = $length->fetch_assoc();
$size = $length['length'];//Всего терминов в БД.
$id1 = rand(1, $size);//Случайный выбор 1-го термина.
$id2 = rand(1, $size);//Случайный выбор 2-го термина.
$avarage = rand(1,2);//Вероятность правильного совпадения - 50%.
if($avarage == 1) {   $id2 = $id1;   }
$result1 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id1'"); 
$result1 = $result1 ->fetch_assoc();//1-й термин
$result2 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id2'"); 
$result2 = $result2 ->fetch_assoc();//2-й термин    
$_SESSION['ital1'] = $result1['ital'];
$_SESSION['rus1'] = $result1['rus'];
$_SESSION['ital2'] = $result2['ital'];
$_SESSION['rus2'] = $result2['rus'];
?>