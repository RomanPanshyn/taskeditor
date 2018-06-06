<?php

class Controller
{	
	public function getDb()
	{
		return new PDO('mysql:host=localhost;dbname=taskeditor', 'root', '');
	}
	
	protected function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model($this->getDb());
	}
	
	protected function view($view, $data = [], $taskscount)
	{
		require_once '../app/views/' . $view . '.php';
	}
}