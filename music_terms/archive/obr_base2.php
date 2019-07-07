<?php
session_start(); // Запуск сессии на сервере
include('bd.php'); // Подключение БД
    
    $length = $mysqli->query("SELECT COUNT(*) AS 'length' FROM `music_terms`");
    $length = $length->fetch_assoc();
    $size = $length['length'];//Всего терминов в БД.
    //$id = $_POST['ask_id'];//Из поля input c name="ask_id"
    $_SESSION['comment'] = '';// Комментарий к ответу
    //$questions = $_SESSION['asked_questions']; // Массив уже заданных вопросов
    $id1 = rand(1, $size);//Случайный выбор 1-го термина.
    /* 
    //Условие неповторяемости вопроса
    foreach($questions as $item) {//Перебор заданных вопросов
        if($item == $id1) {// Если вопрос уже был задан, то id1 надо сгенерировать заново.
            $id1 = rand(1, $size);
        }
    }
    unset($item);//Так надо
    $questions[] = $id1; // Внесение в массив очередного вопроса
    */
    $id2 = rand(1, $size);//Случайный выбор 2-го термина.
    $avarage = rand(1,2);//Вероятность правильного совпадения - 50%.
    if($avarage == 1) {   $id2 = $id1;   }
    
    $result1 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id1'"); 
    $result1 = $result1 ->fetch_assoc();
    $result2 = $mysqli->query("SELECT * FROM `music_terms` WHERE `id`='$id2'"); 
    $result2 = $result2 ->fetch_assoc();    

    $_SESSION['ital1'] = $result1['ital'];
    $_SESSION['rus1'] = $result1['rus'];
    $_SESSION['ital2'] = $result2['ital'];
    $_SESSION['rus2'] = $result2['rus'];
    $_SESSION['size'] = $size;
    
   // $answer = '<button type="submit" class="btn btn-success">';
/*    
    echo '<meta charset="utf-8">'; // ВЫставление кодировки
    echo '$_POST[ask_id]: '.$id.'<br>';//test
    echo 'id1: '.$id1.'<br>';//test
    echo 'id2: '.$id2.'<br>';//test
    echo 'Термин: '.$_SESSION['ital1'].'<br>';//test
    echo 'Всего терминов: '.$size.'<br>';//Длина массива
    print_r($result1);//Вывод массива на печать
    echo '<br>';
    print_r($result2);
    echo 'URL=index.php';
*/   
    exit('<meta http-equiv="refresh" content="0; URL=index.php">');// Возврат обратно через 3 сек. на index.php
    
?>