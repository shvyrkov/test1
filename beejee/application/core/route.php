<?php
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'main';
		$action_name = 'index';
		                                                // /beejee/main/add_task
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// /получаем имя контроллера
		if ( !empty($routes[2]) )
		{	
			$controller_name = $routes[2]; // main
		}
//echo '<br>&nbsp $controller_name: '.$controller_name.'; &nbsp';	

		// получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}
//echo '&nbsp $action_name: '.$action_name;

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
//echo '<br>&nbsp $model_name: '.$model_name; // $model_name: Model_main

		$controller_name = 'Controller_'.$controller_name;
//echo '<br>&nbsp $controller_name: '.$controller_name.'; &nbsp'; // $controller_name: Controller_main; 

		$action_name = 'action_'.$action_name;
//echo '&nbsp $action_name: '.$action_name; //  $action_name: action_add_task
//echo '<br>';

		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name).'.php';
//echo '<br>&nbsp $model_file: '.$model_file;

		$model_path = "application/models/".$model_file;
//echo '<br>&nbsp $model_path: '.$model_path;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
//echo '<br>&nbsp $controller_file: '.$controller_file;
		$controller_path = "application/controllers/".$controller_file;
//echo '<br>&nbsp $controller_path: '.$controller_path.'<br><br>';
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name; // $controller_name: Controller_main; 
		$action = $action_name;
//echo '<br>&nbsp $action: '.$action.'<br><hr>';	

		if(method_exists($controller, $action)) // Controller_main, action_add_task
		{
			// вызываем действие контроллера
			$controller->$action(); //  $action_name: action_add_task
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	}
	
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>