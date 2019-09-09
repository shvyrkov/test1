<?php
require_once 'bd_connection.php'; // Подключение БД
require_once 'safe_insertion.php';// Функции для предотвращения атак внедрения SQL и XSS

if ($_POST['delete'] && $_POST['id'])
  {
    $id   = mysql_entities_fix_string($connection_bd,$_POST['id']); // Из safe_insertion.php
    $query  = "DELETE FROM users WHERE id='$id'";
    require_once 'bd_request.php'; // Запрос в БД
    if (!$result) echo "DELETE failed<br><br>";// Если удаление из таблицы не прошло
  }
// Сброс переменных и объектов.
unset($_POST['delete']);
unset($_POST['id']);
unset($result);
$connection_bd->close();

echo '<meta http-equiv="refresh" content="0;URL=index.php">';  
?>