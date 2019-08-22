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
    <style>
        body {
            background-color: lightgrey;
        }
        .header {
            background-color: white;
        }
        .chat {
            border-top: dotted white; 
            padding-left: 9.5%;  
            padding-top: 10px; 
            min-height:230px;
        }
        .comment {
            padding-left: 9.5%;  
            padding-top: 10px; 
            height:450px;
        }
        .footer {
            background-color: white;
        }
        .footer div {
            
        }
    </style>
    <title>Future test</title>
  </head>
  <body>
    <div class="container-fluid header" >
        <div class="row " style="margin-left: 7%; margin-right:3%; padding-top: 30px; min-height:225px; ">
            <div class="col-sm-9">
                <div style="font-weight:bold;" >
                    <p style="font-size:8pt;">
                        Телефон: +7(499)340-94-71
                    </p>
                    <p style="font-size:8pt;" >
                        Email: info@future-group.ru
                    </p>
                </div>
                <br><br>
                <p style="font-size:34pt;">
                    Комментарии
                </p>
            </div>
            <div class="col-sm-3">
                <img src="img/logo_future.png" alt="future-logo" style="width:80%; margin-bottom:5px;">
            </div>
        </div>
    </div>

    <div class="container-fluid chat">
       <?php include'load_comments.php'; // Загрузка комментариев из БД  ?>
    </div>
    
    <div class="container-fluid comment">
        <hr>
        <h4>Оставить комментарий</h4>
        <div style="width:45%;">
            <form method="POST" name="get_comment" action="get_comment.php">
                <div class="form-group">
                    <label for="form_name">Ваше имя</label>
                    <input type="text" class="form-control" name="form_name" id="form_name" aria-describedby="emailHelp" placeholder="Герасим">
                </div>
                <div class="form-group">
                    <label for="comment">Ваш комментарий</label>
                    <textarea class="form-control" name="form_comment" id="form_comment" rows="5" style="border: 2px solid black; border-radius: 5px;"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary btn-lg" style="float:right; border: 2px solid black; border-radius: 5px;">
                    Отправить
                </button>
            </form>
        </div>
    </div>
    
    <div class="container-fluid footer mb-0" >
        <div class="row " style="margin-left: 7%; margin-right:3%; padding-top: 30px; min-height:145px; ">
            
            <div class="col-sm-2">
                <img src="img/logo_footer_future.png" alt="future-logo" style="width:75%; margin-bottom:5px;">
            </div>
            
            <div class="col-sm-10">
                <div style="font-weight:bold;" >
                    <p style="font-size:8pt;">
                        Телефон: +7(499)340-94-71
                    </p>
                    <p style="font-size:8pt;" >
                        Email: <span style="text-decoration:underline;">info@future-group.ru</span>
                    </p>
                    <p style="font-size:8pt;">
                        Адрес: <span style="text-decoration:underline;">115088, Москва, ул.2-я Машиностроения, д.7, стр.1</span>
                    </p>
                </div>
                <p style="font-size:8pt;">
                    &copy2010 - 2014 Future. Все права защищены.
                </p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>