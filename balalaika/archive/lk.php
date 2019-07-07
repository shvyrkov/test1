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
    
    <div class="container rounded mt-3 py-3"><!-- Контейнер для л.к.-->
        <div class="row"><!-- 1 ряд-->
            <div class="col-sm"><!-- 1-я колонка с адаптацией под мобильные устройства: на мал.экране будут 2 строки вместо 2-х столбцов.-->
                <!--Вывод фотографии на экран-->
                <?php include'load_photo.php'; ?>
                <h3>Добавление товара</h3>
                    <form method="POST" name="upload_photo" action="upload.php" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for='title'>Название товара: </label>
                                <input type="text" name="title" id="title" class="form-control">
                            <label for='price'>Цена: </label>
                                <input type="text" name="price" id="price" class="form-control">
                             <label for='tel'>Телефон: </label>
                                <input type="text" name="tel" id="tel" class="form-control">   
                             <label for='metro'>Метро: </label>
                                <input type="text" name="metro" id="metro" class="form-control">
                            <label for='description'>Описание: </label>
                                <p><textarea name="description" id="description" class="form-control"></textarea></p>   
                            <label for='photo'><h5>Выберите фотографии товара: </h5></label>
                                <input type="file" name="photo" accept="image/*,image/jpeg" class="form-control-file"><br>
                                <button type="submit" class="btn btn-primary" >Загрузить фото и описание</button>
                    </form>
                </div>
            </div> 
            <div class="col-sm">
                <h4>
                    Личные данные
                </h4>
                <ul>
                    <li>
                        <?php echo 'Имя: '.$_SESSION['name']; ?>
                    </li>
                    <li>
                        <?php echo 'Фамилия: '.$_SESSION['lastname']; ?>
                    </li>
                    <li>
                        <?php echo 'E-mail: '.$_SESSION['email']; ?>
                    </li>
                </ul>
                <form action="del_acc.php" method="POST">
                    <button type="submit" class="btn btn-danger" >Удалить аккаунт</button>
                </form>
                
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