<?php
session_start();
//Проверка наличия существования пер-й $_SESSION
if(isset($_SESSION['name'])) { // Если была регистрация или вход в л.к.
    $button = '<a class="btn btn-outline-success my-2 my-sm-0" href="exit.php">Выйти</a>';
}
else {
    $button = '<div id="btn">
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="enter_gen()">Войти</button>
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="form_gen()">Регистрация</button>
        </div>';
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
    <style>
        body {
            background-image: url('img/berez1.jpg');
            background-size:  cover;
        }
        header {
            height: 50px;
            padding-top: 8px;
        }
        pre {
            color: rgb(0, 0, 128);
            font-style: italic;
            font-size: 110%;
            font-weight: bold;
        }
        footer {
            color: navy;
            font-size: 150%;
            font-style: italic;
            background: rgb(152, 251, 152, 0.6);
            margin-bottom: 0px;
            padding-bottom: 8px;
        }
        .head_nav {
            background: rgb(255, 215, 0, 0.6);
        }
        .head_nav header h1 {
            color: navy;
            font-size: 150%;
            font-style: italic;
            text-align: center;
        }
        .container {
            background: rgb(255, 255, 0, 0.4); /*Полупрозрачный фон*/
            }
        .balalaika {
            position: relative;
            top: 30%; /* Положение от верхнего края */
        }
        .card {
            margin-bottom: 1rem;
            height: 22rem;
        }
        .card-img-top{
            width: 128px;
            margin: auto;
        }
        .btn-buy-abs {
            position: absolute;
            /*float: left;*/
            bottom: 15px; /* Положение от нижнего края */
            left: 15px;
        }
    </style>
    <title>Балалайки здесь!</title>
  </head>
  <body>
    <?php
    include 'head_nav.php';
    ?>
    
    <div class="container rounded mt-3 py-3"><!--Добавление скругления и отступов в container-->
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/vk.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Подписчики ВКонтакте.</h5>
                        <p class="card-text">Подписчики в группу или в паблик ВКонтакте. Цена: 0,5руб./чел.</p>
                        <a href="goods/?item=Подписчики ВКонтакте" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/vk.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Лайки ВК.</h5>
                        <p class="card-text">Лайки к записям и фотографиям ВКонтакте. Цена: 0,1руб./лайк</p>
                        <a href="goods/?item=Лайки ВК" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/vk.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Накрутка опросов ВК.</h5>
                        <p class="card-text">Накрутка проголосовавших за определенный вариант ВКонтакте. Цена: 0,4руб./чел.</p>
                        <a href="goods/?item=Накрутка опросов ВК" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/vk.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Репосты ВК.</h5>
                        <p class="card-text">Репосты записей или фотографий ВКонтакте. Цена: 0,4руб./репост</p>
                        <a href="goods/?item=Репосты ВК" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/instagram.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Подписчики в Инстаграм.</h5>
                        <p class="card-text">Подписчики в группу или в паблик Инстаграм. Цена: 0,5руб./чел.</p>
                        <a href="goods/?item=Подписчики в Инстаграм" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/instagram.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Лайки Инстаграм.</h5>
                        <p class="card-text">Лайки к записям и фотографиям Инстаграм. Цена: 0,1руб./лайк</p>
                        <a href="goods" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/instagram.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Накрутка  в Инстаграм.</h5>
                        <p class="card-text">Накрутка проголосовавших за определенный вариант Инстаграм. Цена: 0,4руб./чел.</p>
                        <a href="goods" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 99%">
                    
                    <img src="img/instagram.png" class="card-img-top rounded-circle" alt="Подписчик ВК">
                    
                    <div class="card-body">
                        <h5 class="card-title">Репосты в Инстаграм.</h5>
                        <p class="card-text">Репосты записей или фотографий Инстаграм. Цена: 0,4руб./репост</p>
                        <a href="goods" class="btn btn-primary btn-buy-abs">Купить.</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
    <footer>
        <hr>
        <h5>
            &copy 2019 Shvyrkov
        </h5>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade" id="Register_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="f_reg">
              <!-- Здесь была форма. Теперь она в пер-й form и вставляется сюда по ситуации. -->
          </div>
        </div>
      </div>
    </div>

    <script> // Скрипт для AJAX
    // Функция для определения типа браузера: IE или нет и соответствующей инициализации переменной xmlhttp объектом для передачи данных на сервер
    function getXmlHttp(){ 
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); // Для новых версий IE
        } // ActiveXObject - объект в IE для передачи данных на сервер
        catch (e) { // e - тип ошибки (Error)
            try {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // Для старых версий IE
            } 
            catch (E) {
                xmlhttp = false;
            }
        }
       if (!xmlhttp && typeof XMLHttpRequest!='undefined') { // Если это не IE, то ---
          xmlhttp = new XMLHttpRequest(); // XMLHttpRequest - объект, который есть во всех нормальных браузерах
        }
     return xmlhttp;
    }
    
    function sendingForm (formname) { // target - Вход или Регистрация
        var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
        //var p = 'ajax=1'; // Можно инициализировать чем угодно
        if(formname == 'enter') var p = 'target=enter';
        else var  p = 'target=registration';
        for(var i=0;i<document.forms[formname].elements.length;i++){ // length-1 - если input, если button, то вычитать 1 не надо
         p += "&"+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value) ;//присваиваем значение 
              }
      xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
      xmlhttp.send(p); // Отправляем POST-запрос
      xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
        if (xmlhttp.readyState == 4) { // Ответ пришёл
          if(xmlhttp.status == 200) { // Сервер вернул код 200 
              f_reg.innerHTML = xmlhttp.responseText;
              if(~xmlhttp.responseText.indexOf('вы успешно авторизованы')) { // Если есть этот текст, то вместо Войти+Регистрация будет Выйти
                  btn.innerHTML='<a class="btn btn-outline-success my-2 my-sm-0" href="exit.php">Выйти</button>';
              }
            // alert (xmlhttp.responseText);
           }
          }
        } ;
     }
     
    // Переменная для формы для авторизации пользователя. 
     var enter ='<form name="enter" action="javascript:;" method="post" onsubmit="return sendingForm(\'enter\')">'+    
                    '<div class="form-group">'+
                        '<label>Ваш e-mail: </label>'+
                        '<input type="email" name="email" class="form-control" placeholder="e-mail">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label for="exampleInputPassword1">Пароль: </label>'+
                        '<input type="password" name="password" class="form-control" placeholder="Пароль">'+
                    '</div>'+
                    '<button type="submit" class="btn btn-primary">Подтвердить</button>'+
                '</form>';
    // Переменная для формы для регистрации пользователя.
    var form ='<form name="registration" action="javascript:;" method="post" onsubmit="return sendingForm(\'registration\')">'+
                   '<div class="form-group">'+
                        '<label>Ваше имя: </label>'+
                        '<input type="text" name="name" class="form-control" placeholder="Имя">'+
                   '</div>'+
                    '<div class="form-group">'+
                        '<label>Ваша фамилия: </label>'+
                        '<input type="text" name="lastname" class="form-control" placeholder="Фамилия">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Ваш e-mail: </label>'+
                        '<input type="email" name="email" class="form-control" placeholder="e-mail">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label for="exampleInputPassword1">Пароль: </label>'+
                        '<input type="password" name="password" class="form-control" placeholder="Пароль">'+
                    '</div>'+
                    '<button type="submit" class="btn btn-primary">Подтвердить</button>'+
                '</form>';
                
    function enter_gen() { // Ф-ция вызывается при нажатии на кнопку Вход.
        exampleModalLabel.innerHTML="Вход";
        f_reg.innerHTML = enter; // При вызове ф-ции в метку f_reg будет записана форма
    } 
    function form_gen() { // Ф-ция вызывается при нажатии на кнопку Регистрация.
        exampleModalLabel.innerHTML="Регистрация";
        f_reg.innerHTML = form; // При вызове ф-ции в метку f_reg будет записана форма
    }    
    
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>