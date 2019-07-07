<?php
session_start(); // Запуск сессии на сервере
include('bd.php'); // Подключение БД
    echo '<meta charset="utf-8">'; // ВЫставление кодировки
    //$_POST['answer']='';
    //echo 'POST[answer]: '.$_POST['answer'].'<br>';//test
    //$id = $_POST['id'];//Из поля input c name="id"
    $length = $mysqli->query("SELECT COUNT(*) AS 'length' FROM `music_terms`");
    $length = $length->fetch_assoc();
    $size = $length['length'];//Всего терминов в БД.
    $id1 = rand(1, $size);//Случайный выбор 1-го термина.
    //echo 'POST[ask_id]: '.$_POST['ask_id'].'<br>';//test
    //$id1 = 1;//$_POST['ask_id'];
    //$id1 = $_POST(['ask_id']);// передача id из index.php по значению value
    $id2 = rand(1, $size);//Случайный выбор 2-го термина.
    //$id2 = 2;
    $avarage = rand(1,2);//Вероятность правильного совпадения - 50%.
    if($avarage == 1) {   $id2 = $id1;   }
    //Условие неповторяемости вопроса
    //------------------------------------
    //echo 'id1: '.$id1.'<br>';//test
    //echo 'id2: '.$id2.'<br>';//test
    
    $result1 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id1'"); 
    $result1 = $result1 ->fetch_assoc();
    $result2 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id2'"); 
    $result2 = $result2 ->fetch_assoc();    

    $_SESSION['ital1'] = $result1['ital'];
    $_SESSION['rus1'] = $result1['rus'];
    $_SESSION['ital2'] = $result2['ital'];
    $_SESSION['rus2'] = $result2['rus'];
    $_SESSION['size'] = $size;
  
    echo 'Термин: '.$_SESSION['ital1'].'<br>';//test
    echo 'Всего терминов: '.$size.'<br>';//Длина массива
    print_r($result1);//Вывод массива на печать
    echo '<br>';
    print_r($result2);
    exit('<meta http-equiv="refresh" content="3; URL=index.php">');// Возврат обратно через 5 сек. на index.php
    
?>