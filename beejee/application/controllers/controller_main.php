<?php
class Controller_main extends Controller
{
    function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}
	
	function action_index()
	{	
	    $data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
	
	function action_new_task() // Выдает форму для внесения данных
	{	
		$this->view->generate('new_task_view.php', 'template_view.php');
	}
	
	function action_add_task() // Вносит данные в БД и выводит их на страницу
	{	                        
	    $data = $this->model->add_task();
		$this->view->generate('add_task_view.php', 'template_view.php', $data);
	}
	
	function action_delete_task() // Удаляет данные из БД
	{	                        
	    $delete_ok = $this->model->delete_task();
	    
	    if($delete_ok)
	    {
    	    $data = $this->model->get_data();
    		$this->view->generate('delete_view.php', 'template_view.php', $data);
	    }
	    else 
	    {
	        $this->view->generate('fail_view.php', 'template_view.php');
	    }
	}
}
?>