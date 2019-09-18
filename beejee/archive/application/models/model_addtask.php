<?php
class Model_addtask extends Model
{
    /**
     * Метод получает данные о всех задачах из БД 
     * 
     * return $load_task - массив с таблицей из БД
     */
     
    private function get_data($id)
    {
        return true;
    }
    
    /**
     * Метод вносит данные об 1 задаче в БД 
     * 
     * return $success - boolean : true - данные внесены в БД
     */
	public function add_data()
	{	
	    
// Подключение к БД (вынести в отдельный файл)
	    

// формирование строки запроса
	$query = "INSERT INTO `tasks`(`name`, `email`, `task`) 
	                    VALUES ('$name','$email','$task')";

// Запрос в БД (вынести в отдельный файл)
$result = $connection_bd->query($query); // $result - объект, содержащий двумерный массив

if(!$connection_bd) // Если нет доступа к таблице 
{ 
    echo 'Не могу загрузить данные. <br> Проверьте подключение к БД.
    <br><br><a href="index.php"> <button>Вернуться на главную.</button> </a>';
    exit;
}	    
	    
if (!$result) // Если получение данных из таблицы не прошло
{
    echo "INSERT failed<br><br>";
}


$load_task = new Model_addtask;
$load_task -> get_data($id);

$i=0;
while ($row = $result->fetch_assoc()) 
{
    //echo '<br>user_name: '.$row["name"].'<br>';
        $load_task[$i]["task_id"] = htmlspecialchars($row["id"]);
        $load_task[$i]["user_name"] = htmlspecialchars($row["name"]);
        $load_task[$i]["user_email"] = htmlspecialchars($row["email"]);
        $load_task[$i]["task_text"] = htmlspecialchars($row["task"]);
        $load_task[$i]["task_status"] = htmlspecialchars($row["status"]);
        $load_task[$i]["task_edited"] = htmlspecialchars($row["edited"]);
        $i++;
        //echo '<br>user_name: '.$load_comments[$i]["user_name"].'<br>';
}

return $load_task;

//$name = 'yuri';
//return 'yuri'; 
//return $name; 

//$result->close();
//$connection_bd->close();	    
	    
	
	} // Method
} // Class


?>