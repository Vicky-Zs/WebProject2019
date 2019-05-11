<?php

session_start();

        // Connect to the database
        require_once('base.php');
		$username=$_POST['username'];
		$_SESSION['username']=$username;
		$_SESSION['teacher_id']= getID($connection,$username);
		$password=$_POST['password'];
		$salt= getSalt($connection,$username);
		$cryptedPw=getCryptedPw($connection,$username);
		if(hash('sha384', $password.$salt)== $cryptedPw){
			$_SESSION['id']=getID($connection,$username);
			header("Location: ../accueil/accueil.php");
		}



  function checkUserName($connection, $username){
    $query = "SELECT COUNT(*) AS count FROM users WHERE name=:username";
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row["count"] == "0";
  }
  function getSalt($connection, $username){
    $query = "SELECT salt FROM teachers WHERE login=:username";
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row["salt"];
  }
  function getCryptedPw($connection, $username){
    $query = "SELECT password FROM teachers WHERE login=:username";
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row["password"];
  }
  function getID($connection, $username){
    $query = "SELECT id FROM teachers WHERE login=:username";
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row["id"];
  }
