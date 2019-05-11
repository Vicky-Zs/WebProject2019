<?php 
session_start();
if(!isset($_SESSION['teacher_id'])){
	$_SESSION['teacher_id']=4;
}
require_once('../base.php');
	function getStudentsJson($connection,$id)
	{
		$query = "SELECT id,lastname, firstname, photo FROM `students` JOIN studentsclasses ON students.id=studentsclasses.student_id JOIN teachersclasses ON studentsclasses.class_id = teachersclasses.class_id WHERE teachersclasses.teacher_id=:id";
		$statement = $connection->prepare($query);
		$statement->bindValue(":id", $id, PDO::PARAM_INT);
		$statement->execute();
		$row = $statement->fetchAll(PDO::FETCH_CLASS);
		return '{"students":'.json_encode($row).'}';
	}
	echo getStudentsJson($connection,$_SESSION['teacher_id']);
	
	
