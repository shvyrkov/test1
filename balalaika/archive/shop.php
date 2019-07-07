<?php session_start();

include('simple_html_dom.php'); // Подключение библиотеки для парсинга
header("Content-type: text/html; charset=utf-8"); // Выставление кодировки
$html = new simple_html_dom(); // Создание объекта типа класса библиотеки
$html->load_file('https://www.avito.ru/moskva/muzykalnye_instrumenty/gitary_i_drugie_strunnye?q=%D0%B1%D0%B0%D0%BB%D0%B0%D0%BB%D0%B0%D0%B9%D0%BA%D0%B0&sgtd=21'); // Страница для парсинга

$html->save(); // в документации написано так сделать
//echo $html; //http://shvyrkov.beget.tech/balalaika/avito/ - будет выведена страница  для парсинга
//http://vozhzhaev.ru/0248/avito/ - образец
//Надо достать объявления с авито и разместить у нас
//Из документации simplehtmldom, item... - классы из Avito, где лежит объявление о продаже ч.-л.
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
    <style>
        body {
            background-size:  auto;
        }
    </style>
    <!-- Иконка на страницу -->
    <link rel="shortcut icon" href="img/mus.png" type="image/x-icon">
    <title>Балалайки здесь!</title>
  </head>
  <body>
    <!-- Меню -->
    <?php    include 'head_nav.php';  // Заголовок + меню + кнопки ?>
    
    <div class="container my-3 alert alert-info">
        <?php include'load_bal.php'; // Загрузка балалаек из БД   ?>
        <div class="row">
            <?php
            // Загрузка балалаек из Avito
            foreach($html->find('div[class="item item_table clearfix js-catalog-item-enum  item-with-contact js-item-extended"]') as $div) {
                echo '
                    <div class="col-sm-4">
                        <div class="card my-3" style="width: 16rem;">
                ';
                //Внутри выбранного div с указанным классом ищем ссылку а с указанным классом
                foreach($div->find('a[class="item-description-title-link"]') as $link) { //Вытаскиваем текст без тегов и пр. - и получаем список автобусов
                    $url = 'https://m.avito.ru/'.$link->href;//Достаем ссылку из атрибута href с мобильной версии avito
                    $title = $link->plaintext; //Вытаскиваем текст без тегов и пр. - и получаем список автобусов
                }
               $price = $div->find('span[class^="price"]', 0);//класс начинается с price
               $img = $div->find('img', 0)->src; //Вывод картинки по заданной подписи
               echo '
                       <img src="'.$img.'" class="card-img-top" >
                       <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <p class="card-text">'.$price.'</p>
                        <!--Переход в карточку товара с передачей url и картинки 
                        (т.к.не получается распарсить мобильную версию(где есть телефон), чтобы получить картинку через GET-запрос-->
                            <a href="card.php?url='.$url.'&img='.$img.'" class="btn btn-primary">Переход в карточку товара</a>
                        </div>
                    </div>
                </div>
               ';
            }
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