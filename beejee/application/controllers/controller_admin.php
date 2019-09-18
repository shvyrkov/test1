<?php
class Controller_admin extends Controller
{
    function __construct()
	{
		$this->model = new Model_admin();
		$this->view = new View();
	}
	
	
	
	function action_edit_task() // Окно редактирования задачи
	{	 
	    $data = $this->model->get_task(); // Получение задачи из БД
	    $this->view->generate('edit_view.php', 'templateout_view.php', $data);
	}
	
	function action_edit_list() // Проверка login/password, если - Ок, то вывод списка задач для админа Ok
	{	 
	    $login_ok = $this->model->validate();
	    
	    if($login_ok)
	    {
	        $data = $this->model->get_data();
    		$this->view->generate('admin_view.php', 'templateout_view.php', $data);
	    }
	    else 
	    {
	        $this->view->generate('enter_fail_view.php', 'template_view.php');
	    }
	}	
	
	function action_enter() // Окно входа для админа - Ок
	{	 
	    $this->view->generate('enter_view.php', 'template_view.php');
	}
	
	function action_save() // Сохранить результат редактирования задачи
	{	
	    $this->model->save_data();
	    $data = $this->model->get_data();
		$this->view->generate('admin_view.php', 'templateout_view.php', $data);
	}
	


	

	
	
}
?>