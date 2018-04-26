<?php

class Home extends Controller
{
	public function index()
	{
		$taskModel = $this->model('Task');		
				
		if (!(empty($_POST['createedittask'])))
		{
			$status = '0';							    						
			if (isset($_FILES['imageToUpload'])) 
			{				
				move_uploaded_file($_FILES['imageToUpload']['tmp_name'],"../public/img/" . $_FILES['imageToUpload']['name']);
				$task = $taskModel->createTask($status, $_POST['name'], $_POST['email'], $_POST['text'], basename($_FILES['imageToUpload']['name']));
			}
		    if (isset($_POST['status']) && $_POST['status'] == '1')
				$status = '1';
			if (!isset($_FILES['imageToUpload']))				
				$task = $taskModel->editTask($_POST['name'], $status, $_POST['text']);
		}
		
		$task = $taskModel->getTask();

		$taskscount = count($task);	
		
		$this->view('templates/header',[],0);
		
		$this->view('home/index', ['task' => $task], $taskscount);
		
		$this->view('templates/footer',[],0);
	}
}