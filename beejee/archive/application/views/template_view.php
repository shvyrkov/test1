<!DOCTYPE html>
<html lang="ru">
    <head>
         <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="/beejee/css/style.css" />
    	<title>Задачник для BeeJee</title>
    	
    </head>
    <body>
<?php 
echo '<h2 style="color:green;">$content_view: '.$content_view.'<hr></h2>'; // test
?>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
          <a  href="/beejee/" class="navbar-brand">Задачник</a>
          <a href="#">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#admin">Войти</button>
          </a>
        </nav>
        
        <div class="container fluid"><!-- Content here -->
            <div class="row">
                <br>
            </div>
            
            <!--div class="row"-->
            	<?php 
            	include 'application/views/'.$content_view; // Содержимое
            	?>
    	     <!--/div--><!--row-->
 
    	</div><!--container-->
    	
        <footer style="background-color: #e3f2fd;">
            <hr>
            &copy; 2019 Shvyrkoff Test
            <hr>
        </footer>
        
        
        
        <!-- Button trigger modal -->
        <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Запустить модальное окно
        </button-->
        
        <!-- Modal Вход для администратора-->
        <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="admin_enter" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="admin_enter">Вход для администратора</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                <label for="login">Login: </label>
                    <input type="text" class="form-control" id="login">
                <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal Добавление задачи-->
        <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление задачи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                <label for="name">Имя: </label>
                    <input type="text" class="form-control" id="name">
                <label for="email">e-mail: </label>
                    <input type="email" class="form-control" id="email">
                <label for="task">Текст задачи</label>
                    <textarea class="form-control" id="task" rows="3"></textarea>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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