<?php
class Model_main extends Model
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
     * Метод вносит данные об 1 задаче в БД 
     * 
     * return $add_task - массив данных внесеных в БД
     */
     
	public function add_task() 
	{
	    
	    $db_connection = Db::getConnection(); // Подключение к БД

        if(!$_POST['user_name']) // Проверка ввода имени
            die ('<h2>Укажите имя!</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/">К списку задач</a>
                </button> ');
        
        if(!$_POST['user_email']) // Проверка ввода e-mail
            die ('<h2>Укажите E-mail!</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/">К списку задач</a>
                </button> ');
                
        if(!$_POST['task_text']) // Проверка ввода текста задачи
            die ('<h2>Внесите текст задачи!"</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/">К списку задач</a>
                </button>');
                
        
        $user_name = htmlentities(stripslashes($_POST['user_name'])); // Имя из формы + "очистка".
        $user_email = htmlentities(stripslashes($_POST['user_email'])); // e-mail из формы + "очистка".
        $task_text = htmlentities(stripslashes($_POST['task_text'])); // task из формы + "очистка".     
               
//        $user_name = Safe_insertion :: mysql_entities_fix_string($db_connection, $_POST['user_name']); // Имя из формы + "очистка".
//        $user_email = Safe_insertion :: mysql_entities_fix_string($db_connection, $_POST['user_email']); // e-mail из формы + "очистка".
//        $task = Safe_insertion :: mysql_entities_fix_string($db_connection, $_POST['task_text']); // task из формы + "очистка".        
        //$user_date = date("d.m.y"); // Текущая дата
        //$user_time = date("H:i"); // Текущее время
        
        // Формирование строки запроса
        $query = "INSERT INTO `tasks`(`name`, `email`, `task`) 
                            VALUES ('$user_name','$user_email','$task_text')";

// Внесение записи в таблицу SQL. 
        // Запрос в БД (м.б. вынести в отдельный файл)
        $result = $db_connection->query($query); // $result - 

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
        
//$db_connection->insert_id; // Последний внесенный id
        $add_task = Array();

        $add_task["user_name"] = $user_name;
        $add_task["user_email"] = $user_email;
        $add_task["task_text"] = $task_text;	  

//$add_task["user_name_post"] = 'Yuri';
//$add_task["user_email_post"] = 'yu@mail.ru';
//$add_task["task_text_post"] = 'text of the task';

        return $add_task; 
	}
	
	/**
     * Метод удаляет 1 выбранную задачу из БД 
     * 
     * $id - номер (id) задачи в БД
     * 
     * return $delete_ok - boolean : true - при успешном удалении записи из БД
     */
     
    public function delete_task()
    {
        $delete_ok = false;
        
        $db_connection = Db::getConnection(); // Подключение к БД
        
        if(!$_POST['task_id']) // Проверка получения id
            die ('<h2>Нет связи с сервером.</h2>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/">К списку задач</a>
                </button> ');
        
        $task_id = htmlentities(stripslashes($_POST['task_id']));
        $query = "DELETE FROM `tasks` WHERE id='$task_id'";
        $result = $db_connection->query($query);  

        if(!$db_connection) // Если нет доступа к таблице 
        { 
            echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
            <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
            exit;
        }	    

        if (!$result) // Если получение данных из таблицы не прошло
        {
            echo "DELETE failed<br><br>";
        }
        else {
            $delete_ok = true;
        }
        
        return $delete_ok;
    }
	
} // Class


?>