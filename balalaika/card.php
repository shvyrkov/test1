<?php session_start();
include('simple_html_dom.php'); // Подключение библиотеки для парсинга
header("Content-type: text/html; charset=utf-8"); // Выставление кодировки
$url = $_GET['url'];//Получаеи URL из index.php
$img = $_GET['img'];//Получаеи картинку из index.php
$html = new simple_html_dom(); // Создание объекта типа класса библиотеки
$html->load_file($url); // Страница для парсинга
$html->save(); // в документации написано так сделать

$title = $html->find('h1[data-marker="item-description/title"]', 0)->plaintext;//Описание товара
$price = $html->find('span[data-marker="item-description/price"]', 0)->plaintext;//Цена
$tel = $html->find('a[data-marker="item-contact-bar/call"]', 0)->href;//Номер телефона из атрибута href
//echo '<img src="'.$img.'">';//Картинка

?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Наш CSS-->
    <link rel="stylesheet" href="style.css">
    <!-- Иконка на страницу -->
    <link rel="shortcut icon" href="img/mus.png" type="image/x-icon">
    <title>Балалайки здесь!</title>
  </head>
  <body>
    <!-- Меню -->
    <?php    include 'head_nav.php';  // Заголовок + меню + кнопки ?>
    
    <div class="container my-3 alert alert-info">
        <div class="row">
            <?php
            echo '<div class="col-sm-4">
                  <div class="card my-3" style="width: 16rem;">
                    
                   <img src="'.$img.'" class="card-img-top" >
                   <div class="card-body">
                        <h5 class="card-title">'.$title.'</h5>
                        <p class="card-text">Цена: '.$price.'</p>
                        <p class="card-text">'.$tel.'</p>
                        <a href="shop.php" class="btn btn-primary">Назад</a>
                    </div>
                </div>
            </div>';
            ?>
        </div>
    </div>
    <?php include 'footer.php'; // Подвал?>
    <?php include 'modal.html'; // Модальное окно Вход/Регистрация?>
    <script src="bal_ajax.js";> // Скрипт для AJAX 
    </script>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>