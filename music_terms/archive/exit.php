<?php // Программа выхода из сессии
session_start(); // Вход в сессию
session_destroy(); // Уничтожение сессии
exit ('<meta http-equiv="refresh" content="0; URL=index.php">');
?>