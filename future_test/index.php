<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">

    <title>Future test</title>
  </head>
  <body>
    <div class="container-fluid header" >
        <div class="row">
            <div class="col-sm-9">
                <div class="titles" >
                    <p>
                        Телефон: +7(499)340-94-71
                    </p>
                    <p>
                        Email: info@future-group.ru
                    </p>
                </div>
                <br><br>
                <p class="large_font">
                    Комментарии
                </p>
            </div>
            <div class="col-sm-3">
                <img src="img/logo_future.png" alt="future-logo">
            </div>
        </div>
    </div>

    <div class="container-fluid chat">
        
<?php require_once 'load_comments.php'; // Загрузка комментариев из БД 

    for($i=0; $i<count($load_comments); $i++) {
        echo '
            <div class="row">
                    <div class="col-sm-3">
                        <span id="user_name" class="user_name">'.$load_comments[$i]["user_name"].'</span>
                    </div>
                    <div id="user_time" class="col-sm-1">
                        <time>'.$load_comments[$i]["user_time"].'</time>
                    </div>
                    <div id="user_date" class="col-sm-2">
                        <date>'.$load_comments[$i]["user_date"].'</date>
                    </div>
                    <div  class="col-sm-2">
                        
                    </div>
                    <div id="delete_comment" class="col-sm-2">
                        <form action="delete_comment.php" method="post">
                          <input type="hidden" name="delete" value="yes">
                          <input type="hidden" name="id" value="'.$load_comments[$i]["comment_id"].'">
                          <input type="submit" value="Удалить комментарий">
                        </form>
                    </div>
            </div>
            <p id="user_comment" class="user_comment">'
                .$load_comments[$i]["user_comment"].
            '</p> '
            ;
    }
?>
    </div><!--"container-fluid chat"-->
    
    <div class="container-fluid comment">
        <hr>
        <h4>Оставить комментарий</h4>
        <div class="comment_form">
            <form method="POST" name="get_comment" action="get_comment.php">
                <div class="form-group">
                    <label for="form_name">Ваше имя</label>
                    <input type="text" class="form-control" name="form_name" id="form_name" aria-describedby="emailHelp" placeholder="Герасим">
                </div>
                <div class="form-group">
                    <label for="comment">Ваш комментарий</label>
                    <textarea class="form-control comment_field" name="form_comment" id="form_comment" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary btn-lg">
                    Отправить
                </button>
            </form>
        </div>
    </div>
    
    <div class="container-fluid footer mb-0" >
        <div class="row">
            
            <div class="col-sm-2">
                <img src="img/logo_footer_future.png" alt="future-logo">
            </div>
            
            <div class="col-sm-10">
                <div class="titles" >
                    <p>
                        Телефон: +7(499)340-94-71
                    </p>
                    <p>
                        Email: <span class="underline">info@future-group.ru</span>
                    </p>
                    <p>
                        Адрес: <span class="underline">115088, Москва, ул.2-я Машиностроения, д.7, стр.1</span>
                    </p>
                </div>
                <p>
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