<?
session_start();
session_destroy();
//exit ('<meta http-equiv="refresh" content="0; URL='.$_SERVER['HTTP_REFERER'].'">');
exit ('<meta http-equiv="refresh" content="3;URL=index.php">');
?>