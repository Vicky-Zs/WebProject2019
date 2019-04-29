<!DOCTYPE html>
<html>
 
	<head>
    <!-- En-tête du document  -->
		<title>Inscription</title>
	</head>
	<body>
	<?php
$servername = "mysql-labdddemorgane.alwaysdata.net";
$username = "179421";
$password = "rienDuTout";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 
	</body>
</html>