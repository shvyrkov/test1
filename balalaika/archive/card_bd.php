<?php session_start();

$title = $_GET['title'];//Получаем название из shop.php
$photo = $_GET['photo'];//Получаем картинку из shop.php
$price = $_GET['price'];
$tel = $_GET['tel'];
$email = $_GET['email'];
$metro = $_GET['metro'];
$description = $_GET['description'];
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
    
    <div class="container rounded mt-3 py-3"><!-- Контейнер для л.к.-->
        <div class="row"><!-- 1 ряд-->
            <?php
            echo '<div class="col-sm-4">
                  <div class="card my-3" style="width: 16rem;">
                    
                   <img src="store/'.$photo.'" class="card-img-top" >
                   <div class="card-body">
                        <h5 class="card-title">'.$title.'</h5>
                        <p class="card-text">Цена: '.$price.'</p>
                        <p class="card-text">Телефон: '.$tel.'</p>
                        <p class="card-text">e-mail: '.$email.'</p>
                        <p class="card-text">Метро: '.$metro.'</p>
                        <p class="card-text">Описание: '.$description.'</p>
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