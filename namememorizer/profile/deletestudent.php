<?php session_start();
require_once("../base.php");
	if(isset($_GET['student']))
	{if(isset($_GET['class']))
	{
		$query = "DELETE FROM `studentsclasses` WHERE student_id=:student AND class_id=:class";
		$statement = $connection->prepare($query);
		$statement->bindValue(":student",(int) $_GET['student'], PDO::PARAM_INT);
		$statement->bindValue(":class",(int) $_GET['class'], PDO::PARAM_INT);
		$OK = $statement->execute();
	}
	}
		