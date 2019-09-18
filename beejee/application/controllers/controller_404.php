<?php

class Controller_404 extends Controller // Почему не View, generate() - метод View
{
	
	function action_index()
	{
		$this->view->generate('404_view.php', 'template_view.php');
	}

}
