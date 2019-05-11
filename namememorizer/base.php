<?php
  // URL of the host
  $dbhost = "mysql-labdddemorgane.alwaysdata.net"; 
  
  // Name of the database
  $dbname = "labdddemorgane_projetweb";
  
  // User name
  $dbuser = "179421";
  
  // Password (not used here)
  $dbpass = "rienDuTout";
 
  try {
    $connection = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser,$dbpass);
	
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>