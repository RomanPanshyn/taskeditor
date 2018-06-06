<?php

class Task
{
	protected $db;
	
	public function __construct(PDO $db)
	{
		$this->db = $db;
	}
	
	public function getTask()
	{					
		try{
			$conn = $this->db;
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$tasks = $this->db->prepare("SELECT * FROM tasks;");
			$tasks->execute();
			$tasks->setFetchMode(PDO::FETCH_ASSOC);	
			$result = $tasks->fetchAll();			
		}
		catch(PDOException $e){
			echo "Error: " .$e->getMessage();
		}	
		return $result;	
	}
	
	public function editTask($name, $status, $text)
	{
		try{
			$conn = $this->db;
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE tasks SET status = '" . $status . "', text = '" . $text . "' ";			
			$sql = $sql . "WHERE name = '" . $name . "';";
			$tasks = $this->db->prepare($sql);
			$tasks->execute();
		}
		catch(PDOException $e){
			echo "Error: " .$e->getMessage();
		}
	}
	
	public function createTask($status, $name, $email, $text, $image)
	{
		try{
			$conn = $this->db;
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			$sql = "INSERT INTO tasks (status , name, email, text, image) VALUES ( '";
			$sql = $sql . $status . "', '" . $name . "', '" . $email . "', '" . $text . "', '" . $image . "');";
			$tasks = $this->db->prepare($sql);
			$tasks->execute();						
		}
		catch(PDOException $e){
			echo "Error: " .$e->getMessage();
		}			
	}
}