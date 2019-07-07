<?php
session_start();
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
            <div class="col-2">
              <h4>Термин:</h4>
            </div>
            <div class="col-2">
            </div>
            <div class="col-2">
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
            <div class="col-2">
                <h5> -   это </h5>
            </div>
            <div class="col-2">
              <h5 id="rus"><?php echo $_SESSION['rus2']; ?></h5>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <form action="init.php" method="post">
                    <input type="hidden" name="start" >
                    <button type="submit" class="btn btn-primary">Старт</button>
                </form>
            </div>
            <div class="col-4">            
                <form action="obr_base.php" id="ask_question" method="post">
                    <input type="hidden" name="ask_id" ><!--name="id" - вход в БД (id-столбец)-->
                    <button type="submit"  class="btn btn-info" >Новый вопрос</button>
                </form>
            </div>
            <div class="col-2">
                <form action="compute.php" method="post">
                    <input type="hidden" name="answer" value="yes">
                    <button type="submit" class="btn btn-success">Да</button>
                </form>
            </div>
            <div class="col-2">
                <form action="compute.php" method="post">
                    <input type="hidden" name="answer" value="no">
                    <button <?php  // disabled?> type="submit" class="btn btn-danger">Нет</button>
                </form>
            </div>
            <div class="col-2">
                <form action="exit.php" method="post">
                    <input type="hidden" name="exit" >
                  <button type="submit" class="btn btn-secondary">Сброс</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h6 id="answer"></h6>
            </div>
            <div class="col-6">
                <br>
                <em>Количество правильных ответов: <?php echo $_SESSION['right_answer']; ?></em><br>
                <em>Количество неправильных ответов: <?php echo $_SESSION['wrong_answer']; ?></em><br>
                <em>Всего вопросов: <?php echo $_SESSION['right_answer']+$_SESSION['wrong_answer']; ?></em>
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
    /*    var ital_1 = "<?php echo $_SESSION['ital1']; ?>";//Заданный термин
        var rus_1 = "<?php echo $_SESSION['rus1']; ?>";;//Правильный ответ
        var ital_2 = "<?php echo $_SESSION['ital2']; ?>";;//Термин для проверки
        var rus_2 = "<?php echo $_SESSION['rus2']; ?>";//Заданный ответ
        
        var right; // Для записи по метке "right"
        var wrong; // Для записи по метке "wrong"
        var right_answer = "<?php echo $_SESSION['right_answer']; ?>";// Количество правильных ответов
        right = document.getElementById("right");
       // right.innerHTML = right_answer;// Запись начального значения по метке "right"
        var wrong_answer = "<?php echo $_SESSION['wrong_answer']; ?>";// Количество неправильных ответов
        wrong = document.getElementById("wrong");
       // wrong.innerHTML = wrong_answer;// Запись начального значения по метке "wrong"
        
      
        function answer(res){
            var answer;
            if(res == 'yes') {
                if(ital_1 == ital_2) { //Проверка правильного утверждения
                    answer = document.getElementById("answer");
                    answer.innerHTML = "<br><p>Верно</p>"+ital_1+" - это "+rus_1;
                    right_answer++;
                    right = document.getElementById("right");
                    right.innerHTML = right_answer;
                }
                else {
                    answer = document.getElementById("answer");
                    answer.innerHTML = "<br><p>Неверно</p>"+ital_1+" - это "+rus_1;
                    wrong_answer++;
                    wrong = document.getElementById("wrong");
                    wrong.innerHTML = wrong_answer;
                }
            }
            else {//Проверка неправильного утверждения
                if(ital_1 != ital_2) {
                    answer = document.getElementById("answer");
                    answer.innerHTML = "<br><p>Верно</p>"+ital_1+" - это "+rus_1;
                    right_answer++;
                    right = document.getElementById("right");
                    right.innerHTML = right_answer;
                }
                else {
                    answer = document.getElementById("answer");
                    answer.innerHTML = "<br><p>Неверно</p>"+ital_1+" - это "+rus_1;
                    wrong_answer++;
                    wrong = document.getElementById("wrong");
                    wrong.innerHTML = wrong_answer;
                }
            }
  */      }
        // Чтобы страница при отправке формы не обновлялась и количество правильных ответов не обнулялось, нужен AJAX
        // Функция для определения типа браузера: IE или нет и соответствующей инициализации переменной xmlhttp объектом для передачи данных на сервер
 /*   function getXmlHttp(){ 
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
    var oForm = document.getElementById("ask_question");
    var ask_id = oForm.elements["ask_id"].value;// Там пусто
    var sData = encodeURIComponent(ask_id);
    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    //alert("sData: "+sData); 
    
    xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send(sData); // Отправляем POST-запрос. Ничего не посылаем, просто надо вызвать обработчик без перезагрузки страницы
    
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
  */
        
    //    function new_question() {
    //    }
        
    //    function exit(){
    //        exit.innerHTML='<a class="btn btn-outline-success my-2 my-sm-0" href="exit.php">Выйти</button>';
    //    }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>