<?php session_start(); // Запуск сессии на сервере
include('bd.php'); // Подключение БД

echo '<meta charset="utf-8">';

$id = $_GET['id']; // GET-запрос. 'id' - переменная запроса, которая будет в адресной строке при переходе из л.к.
if(!empty($id)) { // Если id  не пустой, то идем дальше
    $result = $mysqli->query("SELECT * FROM `balalaiki` WHERE `id`='$id'");  // Результат запроса в БД
    $result = $result->fetch_assoc(); // Преобразование полученных из БД результатов в ассоциативный массив

    $item = $result['photo'];
    $title = $result['title'];
    $id = $result['id'];
    $price = $result['price'];
    $tel = $result['tel'];
    $metro = $result['metro'];
    $description = $result['description'];
}
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
        <div class="row">
            <div class="card my-3 mx-1" style="width: 20rem;">

                <h5 style="padding:10px;">Карточка товара</h5>
                  
                <form method="POST" name="change_info" action="change_info.php" enctype="multipart/form-data" >
                    <div class="form-group">
                  
                        <img src="store/<?php echo $item ?>" style="width: 18rem;" alt="Фото инструмента"><br>
                        <label for="photo" style="padding:10px;"><h5>Фотография товара: </h5></label>
                            <input type="file" name="photo" accept="image/*,image/jpeg" class="form-control-file"><br>
                                      
                        <h5 style="padding:10px;">Название: 
                            <input type="text" name="title" id="title" class="form-control"  value="<?php echo $title ?>">
                            <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $id ?>">
                        </h5>
                        <label style="padding:10px;">Цена: </label>
                            <input type="text" name="price" id="price" class="form-control"  value="<?php echo $price ?>р."><br>
                        <label style="padding:10px;">Телефон: </label>
                            <input type="text" name="tel" id="tel" class="form-control"  value="<?php echo $tel ?>"><br>
                        <label style="padding:10px;">Метро: </label>
                            <input type="text" name="metro" id="metro" class="form-control"  value="<?php echo $metro ?>"><br>
                        <label style="padding:10px;">Описание: </label>
                            <textarea name="description" id="description" class="form-control" ><?php echo $description ?>
                            </textarea>
                        <div style="margin: auto;">
                            <a href="lk.php" class="btn btn-secondary" style="margin-left: 2rem;">Вернуться</a>
                            <button type="submit" class="btn btn-primary" style="margin-left: 2rem;">Сохранить</button>
                        </div>
                    </div>  
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