<?php
//Проверка наличия существования пер-й $_SESSION
if(isset($_SESSION['name'])) { // Если была регистрация или вход в л.к.
    $button = '<form name="exit" action="javascript:;" method="post" onsubmit="return sendingForm(\'exit\')">
                    <input type="hidden">
	                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Выйти">
	            </form>';
    
    
}
else {
    $button = '<div id="btn">
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="enter_gen()">Войти</button>
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#Register_Modal" onclick="form_gen()">Регистрация</button>
        </div>';
}
?>