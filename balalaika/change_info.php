<?php
session_start();
include('bd.php'); //Подключение файла для входа в БД.
if(!empty($_SESSION['email'])){ // Проверка входа в л.к.
    $email = $_SESSION['email']; // Из obr_base.php
}
else {
    exit('<meta charset="utf-8"> Войдите в личный кабинет
    <meta http-equiv="refresh" content="3; URL='.$_SERVER['HTTP_REFERER'].'">');
}
// Ввод данных из формы.
$id = $_POST['id'];
$title = htmlspecialchars(stripslashes($_POST['title']), ENT_QUOTES);
$price = htmlspecialchars(stripslashes($_POST['price']), ENT_QUOTES);
$tel = htmlspecialchars(stripslashes($_POST['tel']), ENT_QUOTES);
$metro = htmlspecialchars(stripslashes($_POST['metro']), ENT_QUOTES);
$description = htmlspecialchars(stripslashes($_POST['description']), ENT_QUOTES);

// Загрузка фотографий. ['photo'] - это ['name'] из form
$file = basename($_FILES['photo']['name']); //Записываем имя файла в переменную $file
// Все загружаемые файлы хранятся в глобальном массиве $_FILES, 
//name - предопределенный параметр массива, который говорит, что это name из form
//basename - возвращает имя файла без пути, который загружен через INPUT с name="photo"
$uploaddir = 'store/'; // В эту папку будут загружаться фотки
$uploadfile = $uploaddir.$file; // Полный путь к файлу: store/имя_файла
//['tmp_name'] - временное имя закачанного файла во временной папке на сервере
copy($_FILES['photo']['tmp_name'], $uploadfile);// Копируем загруженный файл к нам в папку store/
// tmp_name - временная папка для загрузки файла, создается автоматически
// Записываем путь к файлу в таблицу `balalaiki`.  Это работает!
$mysqli->query("UPDATE `balalaiki`  SET `photo`='$file', 
                                        `title`='$title',
                                        `price`='$price', 
                                        `tel`='$tel',
                                        `metro`='$metro',
                                        `description`='$description'
                                    WHERE `id`='$id'
                                        ");
// Загрузка на страницу
    // Достаем фотки и пр.
    $balalaiki = $mysqli->query("SELECT * FROM `balalaiki` WHERE `email`='$email'"); // $balalaiki - двумерный массив
    //$balalaiki = $balalaiki ->fetch_assoc();// Первая строка с фоткой из БД
    $i=0;
    echo '<meta charset="utf-8"><br>';
    while ($row = $balalaiki->fetch_assoc()) {
            //echo '<br>email: '.$row["email"].'    photo: '.$row['photo'].'<br>';
            $_SESSION['id'][$i] = $row["id"];
            $_SESSION['photo'][$i] = $row["photo"];
            $_SESSION['title'][$i] = $row["title"];
            $_SESSION['price'][$i] = $row["price"];
            $_SESSION['tel'][$i] = $row["tel"];
            $_SESSION['metro'][$i] = $row["metro"];
            $_SESSION['description'][$i] = $row["description"];

            $i++;
        }
echo ' <meta http-equiv="refresh" content="0;URL=lk.php"> ';
?>