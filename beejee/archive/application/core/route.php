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
		
echo '<h3>route.php</h3>';
echo '<pre><div>   ';
print_r($routes);
echo '   </div></pre>';

		// /получаем имя контроллера
		if ( !empty($routes[2]) )
		{	
			$controller_name = $routes[2]; // main
		}
echo '<br>&nbsp $controller_name: '.$controller_name.'; &nbsp';	

		// получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}
echo '&nbsp $action_name: '.$action_name;

// Имя пользователя
		if ( !empty($routes[4]) )
		{
			$user_name = $routes[4];
		}
echo '<br>&nbsp $user_name: '.$user_name;

// E-mail пользователя
		if ( !empty($routes[5]) )
		{
			$user_email = $routes[5];
		}
echo '<br>&nbsp $user_email: '.$user_email;

// Текст задачи
		if ( !empty($routes[6]) )
		{
			$task_text = $routes[6];
		}
echo '<br>&nbsp $task_text: '.$task_text;	

// Статус задачи
		if ( !empty($routes[7]) )
		{
			$status = $routes[7];
		}
echo '<br>&nbsp $status: '.$status;	

// Редактирование задачи
		if ( !empty($routes[8]) )
		{
			$edited = $routes[8];
		}
echo '<br>&nbsp $edited: '.$edited;	





		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
echo '<br>&nbsp $model_name: '.$model_name; // $model_name: Model_main

		$controller_name = 'Controller_'.$controller_name;
echo '<br>&nbsp $controller_name: '.$controller_name.'; &nbsp'; // $controller_name: Controller_main; 

		$action_name = 'action_'.$action_name;
echo '&nbsp $action_name: '.$action_name; //  $action_name: action_add_task
echo '<br>';

		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name).'.php';
echo '<br>&nbsp $model_file: '.$model_file;

		$model_path = "application/models/".$model_file;
echo '<br>&nbsp $model_path: '.$model_path;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
echo '<br>&nbsp $controller_file: '.$controller_file;
		$controller_path = "application/controllers/".$controller_file;
echo '<br>&nbsp $controller_path: '.$controller_path;
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
echo '<br>&nbsp $action: '.$action.'<br><hr>';	

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