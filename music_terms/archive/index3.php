<?php
session_start();

if($_SESSION['ital2']) {//блокировка клавиш Да/Нет
    $disabled = ''; // Если вопрос задан
}
else {
    $disabled = 'disabled'; // После ответа, старта или сброса, где $_SESSION['ital1']='';
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
    <title>Музыкальные термины.</title>
    <style>
        h3 {
            text-align: center;
        }
        .container {
        background: rgb(0, 22, 1, 0.3); /*Полупрозрачный фон*/
        }
        .row{
        margin: auto;
        }
    </style>
  </head>
  <body>
    <div class="container rounded mt-3 py-3">
        <div class="row">
            <div class="col">
              <h3>Музыкальные термины.</h3><hr>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-3">
              <h4>Термин:</h4>
            </div>
            
            <div class="col-3">
              <h4>Значение:</h4>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-2">
              <h5 id="ital"><?php echo $_SESSION['ital1']; ?></h5>
            </div>
            <div class="col-5">
              <h5 id="rus"><?php echo " - ".$_SESSION['rus2']; ?></h5>
            </div>
            <div class="col-1">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
    <!--     <form action="init.php" method="post"> -->
                <form name="start" action="javascript:;" method="post" onsubmit="return sendingForm('start')">
                    <input type="hidden" name="start" >
                    <button type="submit" class="btn btn-primary">Старт</button>
                </form>
            </div>
<!--            <div class="col-4">
                <form name="questions" action="javascript:;" method="post" onsubmit="return sendingForm('questions')">
                    <input type="hidden" name="ask_id" value="1"> <!--value(=id) передается через AJAX в обработчик php якобы для получения вопроса-->
<!--                    <button type="submit"  class="btn btn-info" >Новый вопрос</button>
                </form>
            </div>
-->
            <div class="col-3">
 <!--    <form action="compute.php" method="post"> 
                <form name="compute_yes" action="javascript:;" method="post" onsubmit="return sendingForm('compute_yes')">
-->             <form name="compute_yes" action="javascript:;" method="post" onsubmit="return sendingForm('compute_yes')">
                    <input type="hidden" name="answer" value="yes">
                    <button type="submit" class="btn btn-success" <?php echo $disabled; ?> onclick="">Да</button>
                </form>
            </div>
            <div class="col-3">
<!--                <form name="compute_no" action="javascript:;" method="post" onsubmit="return sendingForm('compute_no')">
-->               <form name="compute_no" action="javascript:;" method="post" onsubmit="return sendingForm('compute_no')">
                    <input type="hidden" name="answer" value="no">
                    <button type="submit" class="btn btn-danger" <?php echo $disabled; ?>>Нет</button>
                </form>
            </div>
            <div class="col-3">
                <form name="reset" action="javascript:;" method="post" onsubmit="return sendingForm('reset')">
                    <input type="hidden" name="exit" >
                  <button type="submit" class="btn btn-secondary">Сброс</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h6 id="answer">
                    <?php echo $_SESSION['comment'] ?>
                </h6>
            </div>
            <div class="col-6">
                <br>
                <em>Количество правильных ответов: <?php echo $_SESSION['right_answer']; ?></em><br>
                <em>Количество неправильных ответов: <?php echo $_SESSION['wrong_answer']; ?></em><br>
                <em>Всего вопросов: <?php echo $_SESSION['total']; ?></em>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h6 id="testAjax"></h6>
            </div>
            <div class="col-6">
                <br>
                <em></em><span id="test1"></span><br>
                <em></em><span id="test2"></span>
            </div>
        </div>
    </div>
    <script>
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
    function sendingForm (formname) {
        var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
/*        if(formname == 'questions') { // Выбор обработчика для задания вопроса
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
            
            xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                      //if(~xmlhttp.responseText.indexOf('вы успешно авторизованы')) { // Если есть этот текст, то вместо Войти+Регистрация будет Выйти
                      //    btn.innerHTML='<a class="btn btn-outline-success my-2 my-sm-0" href="exit.php">Выйти</button>';
                      }
                     //alert (xmlhttp.responseText);
                }
            } ;
        }
*/
        if(formname == 'start') { // Выбор обработчика для задания вопроса
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
            
            xmlhttp.open('POST', 'init.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                    }
                }
            } ;
        }
        else if(formname == 'compute_yes') { // Выбор обработчика для задания вопроса
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов

            xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                    }
                }
            } ;
        }
        else if(formname == 'compute_no') { // Выбор обработчика для задания вопроса
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
            xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                    }
                }
            } ;
        }
        else if(formname == 'reset') { // Выбор обработчика для задания вопроса
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
            
            xmlhttp.open('POST', 'exit.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                    }
                }
            } ;
        }
    }
    function ajax_obr(formname){
            var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
            
    //xmlhttp.open('POST', 'exit.php', true); // Открываем асинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send(p); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
            
            xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      testAjax.innerHTML = xmlhttp.responseText;
                    }
                }
            } ;
    }
      
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>