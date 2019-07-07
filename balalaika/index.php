<?php session_start(); ?>
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
    <div class="container rounded mt-3 "><!--Добавление скругления и отступов в container-->
        <div class="row">
            <div class="col-sm-6 balalaika">
                <br><br><br>
                <img class="" src="img/balalaika2.png" style="width: 95%;" alt="balalaika">
            </div>
            <div class="col-sm-6"><br>
                <p class="verse">
                    Трёхструнная тревога балалайки<br>
                       Зовёт меня на улицу села<br>
                    Я вспоминаю детство. На лужайке<br>
                      Здесь верба одинокая цвела.<br>
                </p>
                <p class="verse">
                   И вот на этом самом сером камне,<br>
                      Который и тогда ещё лежал,<br>
                      Я трепетными юными руками<br>
                       Играющее дерево держал.<br>
                </p>
                <p class="verse">
                 Несложный инструмент, наивность детства,<br>
                     Как веселил ты сельскую толпу!<br>
                  Ты мне тогда достался как наследство,<br>
                     Как приложенье к плугу и серпу.<br>
                                                    <br>
                                                 В.Боков
                </p>
            </div>
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