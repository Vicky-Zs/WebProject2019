<?php session_start();
require_once("../base.php");
if(isset($_GET['class'] ))
	{
		$query = "DELETE FROM `teachersclasses` WHERE teacher_id=:teacher AND class_id=:class";
		$statement = $connection->prepare($query);
		$statement->bindValue(":teacher",(int) $_SESSION['teacher_id'], PDO::PARAM_INT);
		$statement->bindValue(":class",(int) $_GET['class'], PDO::PARAM_INT);
		$OK = $statement->execute();
	}

		