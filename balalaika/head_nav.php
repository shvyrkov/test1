<?php
//Проверка наличия существования пер-й $_SESSION
if(isset($_SESSION['name'])) { // Если была регистрация или вход в л.к.
    $button = '<form name="exit" action="javascript:;" method="post" onsubmit="return sendingForm(\'exit\')">
                    <input type="hidden">
	                <input type="submit" class="btn btn-outline-warning my-2 my-sm-0" value="Выйти">
	            </form>';
	$cabinet = 'Личный кабинет';
}
else {
    $button = '<div id="btn">
        <button class="btn btn-outline-warning my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="enter_gen()">Войти</button>
        <button class="btn btn-outline-warning my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="form_gen()">Регистрация</button>
        </div>';
    $cabinet = '';
}
?>
    <div class="head_nav">
        <header>
            <h1><b>Что мне соха — была б балалайка. (Русская народная пословица).</b></h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(0, 0, 128, 0.8);">
          <a class="navbar-brand" href="index.php">Главная</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="shop.php">Магазин</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="history.php">История балалайки <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="lk.php"><?php echo $cabinet ?></a>
                  </li>
                </ul>
                    <!-- Здесь были кнопки Войти и Регистрация -->
                    <?php echo $button // Теперь кнопки загружаются в зависмости от ситуации. ?item=Подписчики ВКонтакте
                    ?> 
            </div>
        </nav>   
    </div>