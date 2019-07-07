<?php // Программа проверки знания музыкальных терминов.
session_start();
if($_SESSION['ital2']) {//блокировка клавиш Да/Нет
    $disabled = ''; // Если вопрос задан
}
else {
    $disabled = 'disabled'; // После ответа, старта или сброса, где $_SESSION['ital2']='';
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
    <link rel="stylesheet" href="index_style.css">
    <title>Музыкальные термины.</title>
    <link rel="shortcut icon" href="img/mus.png" type="image/x-icon">
    <style>
        #answer {
            color: <?php echo $_SESSION['answer_color']?>;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="container rounded mt-3 py-3">
            <div class="row">
                <div class="col">
                  <h3>Музыкальные термины.</h3><hr>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                  <h4>Термин:</h4>
                  <h5 id="ital"><?php echo $_SESSION['ital1']; ?></h5>
                </div>
                <div class="col-sm-6 terms">
                  <h4>Значение:</h4>
                  <h5 id="rus"><?php echo " - ".$_SESSION['rus2']; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><br>
                    <form name="start" action="javascript:;" method="post" onsubmit="return sendingForm('start')">
                        <input type="hidden" name="start" >
                        <button type="submit" class="btn btn-primary">Старт</button>
                    </form>
                </div>
                <div class="col-sm-3"><br>
                    <form name="reset" action="javascript:;" method="post" onsubmit="return sendingForm('reset')">
                        <input type="hidden" name="exit" >
                      <button type="submit" class="btn btn-secondary">Сброс</button>
                    </form>
                </div>
                <div class="col-sm-3"><br>
                    <form name="compute_yes" action="javascript:;" method="post" onsubmit="return sendingForm('compute_yes')">
                        <input type="hidden" name="answer" value="yes">
                        <button type="submit" class="btn btn-success" <?php echo $disabled; ?>>Да</button>
                    </form>
                </div>
                <div class="col-sm-3"><br>
                    <form name="compute_no" action="javascript:;" method="post" onsubmit="return sendingForm('compute_no')">
                        <input type="hidden" name="answer" value="no">
                        <button type="submit" class="btn btn-danger" <?php echo $disabled; ?>>Нет</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h6 id="answer">
                        <?php echo $_SESSION['comment'] ?>
                    </h6>
                </div>
                <div class="col-sm-6">
                    <br>
                    <em class="right">Количество правильных ответов: <?php echo $_SESSION['right_answer']; ?></em><br>
                    <em class="wrong">Количество неправильных ответов: <?php echo $_SESSION['wrong_answer']; ?></em><br>
                    <em class="total">Всего вопросов: <?php echo $_SESSION['total']; ?></em>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h6 id="testAjax" ></h6>
                </div>
                <div class="col-sm-6">
                    <br>
                    <em></em><span id="test1"></span><br>
                    <em></em><span id="test2"></span>
                </div>
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
        var xmlhttp = getXmlHttp();//Создаем объект типа XMLHttpRequest для работы с AJAX
        var p = ''; // Пер-я для хранения параметров
            for(var i=0;i<document.forms[formname].elements.length;i++){ //-1 т.к.исключаем кнопку Отправить. elements: все input
               p += '&'+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value);//присваиваем значение 
            } //& - для разделения аргументов
        if(formname == 'start') { // Выбор обработчика для задания вопроса
            xmlhttp.open('POST', 'start.php', true); // Открываем асинхронное соединение
        }
        else if(formname == 'compute_yes' || formname == 'compute_no') { // Выбор обработчика для задания вопроса
            xmlhttp.open('POST', 'compute.php', true); // Открываем асинхронное соединение
        }
        else if(formname == 'reset') { // Выбор обработчика для задания вопроса
            xmlhttp.open('POST', 'exit.php', true); // Открываем асинхронное соединение
        }
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