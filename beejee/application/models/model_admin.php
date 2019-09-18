<?php
class Model_admin extends Model
{
    /**
     * Метод получает данные о всех задачах из БД 
     * 
     * return $load_task - массив с таблицей из БД
     */
	public function get_data()
	{	
	    $db_connection = Db::getConnection(); // Подключение к БД

        // формирование строки запроса
	    $query = 'SELECT * FROM `tasks` ORDER by id DESC';

        // Запрос в БД (м.б. вынести в отдельный файл)
        $result = $db_connection->query($query); // $result - объект, содержащий двумерный массив

        if(!$db_connection) // Если нет доступа к таблице 
        { 
            echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
            <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
            exit;
        }	    
	    
        if (!$result) // Если получение данных из таблицы не прошло
        {
            echo "SELECT failed<br><br>";
        }

        $load_task = Array();
        $i=0;
        while ($row = $result->fetch_assoc()) 
        {
            //echo '<br>user_name: '.$row["name"].'<br>';
                $load_task[$i]["task_id"] = htmlspecialchars($row["id"]);
                $load_task[$i]["user_name"] = htmlspecialchars($row["name"]);
                $load_task[$i]["user_email"] = htmlspecialchars($row["email"]);
                $load_task[$i]["task_text"] = $row["task"];
                $load_task[$i]["task_status"] = htmlspecialchars($row["status"]);
                $load_task[$i]["task_edited"] = htmlspecialchars($row["edited"]);
                $i++;
                //echo '<br>user_name: '.$load_comments[$i]["user_name"].'<br>';
        }

        return $load_task;
	} // Method
	
	/**
     * Метод получает данные об 1 задаче из БД 
     * 
     * return $load_task - массив с 1 строкой из БД
     */
	public function get_task()
	{	
	    $db_connection = Db::getConnection(); // Подключение к БД
	    
	    $task_id = htmlentities(stripslashes($_POST['task_id']));

        // формирование строки запроса
	    $query = "SELECT * FROM `tasks` WHERE id = '$task_id' ";

        // Запрос в БД (м.б. вынести в отдельный файл)
        $result = $db_connection->query($query); // $result - объект, содержащий двумерный массив

        if(!$db_connection) // Если нет доступа к таблице 
        { 
            echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
            <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
            exit;
        }	    
	    
        if (!$result) // Если получение данных из таблицы не прошло
        {
            echo "SELECT task failed<br><br>";
        }
        
        $row = $result->fetch_assoc();

        $load_task = Array();
        
                $load_task["task_id"] = htmlspecialchars($row["id"]);
                $load_task["user_name"] = htmlspecialchars($row["name"]);
                $load_task["user_email"] = htmlspecialchars($row["email"]);
                $load_task["task_text"] = $row["task"];
                $load_task["task_status"] = htmlspecialchars($row["status"]);
                $load_task["task_edited"] = htmlspecialchars($row["edited"]);

        return $load_task;
	} // Method
	
	/**
     * Метод загружает данные об 1 задаче в БД 
     * 
     * return true
     */
	public function save_data() //
	{
	    $db_connection = Db::getConnection(); // Подключение к БД
	    
	    $task_id = htmlentities(stripslashes($_POST['task_id'])); 
	    $task_status = htmlentities(stripslashes($_POST['task_status'])); 
        $task_edited = htmlentities(stripslashes($_POST['task_edited'])); 
        $task_text = htmlentities(stripslashes($_POST['task_text']));  

        // формирование строки запроса
	    $query = "UPDATE `tasks` 
	                SET `task`='$task_text',`status`='$task_status',`edited`='$task_edited'
	                    WHERE id = '$task_id' ";

        // Запрос в БД (м.б. вынести в отдельный файл)
        $result = $db_connection->query($query); // $result - объект, содержащий двумерный массив

        if(!$db_connection) // Если нет доступа к таблице 
        { 
            echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
            <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
            exit;
        }	    
	    
        if (!$result) // Если получение данных из таблицы не прошло
        {
            echo "INSERT failed<br><br>";
        }
        
        return true;
	} // Method
	
	/**
     * Метод проверяет правильность ввода login/password
     * 
     * return $enter - boolean: true - вход разрешен
     */
     
	public function validate() 
	{
	    $login_ok = false;
	    
	    if(!$_POST['login']) // Проверка ввода login
            die ('<h2>Укажите login!</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/admin/enter">Повторить вход</a>
                </button> ');
                
        if(!$_POST['password']) // Проверка ввода password
            die ('<h2>Укажите password!"</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/admin/enter">Повторить вход</a>
                </button>');
                
        
        $login = htmlentities(stripslashes($_POST['login'])); 
        $password = htmlentities(stripslashes($_POST['password'])); 
        
        if($login == 'admin' && $password == '123') 
        {
/*            echo '
            <script>
                (function () {
                access = document.getElementById("access");
                access.innerHTML= \'<form method="POST" action="/beejee/admin/logout">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Выход</button>
                </form>\';
                }());
            </script>';
*/            
            $login_ok = true;
        }
        return $login_ok; 
	}
} // Class


?>