<?php // Запрос в БД
$result = $connection_bd->query($query); // $result - объект, содержащий двумерный массив

if(!$connection_bd) // Если нет доступа к таблице 
{ 
    echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
    <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
    exit;
}
?>