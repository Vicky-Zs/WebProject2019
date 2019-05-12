<?php
session_start();

	echo'<div id="addClass">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Choisissez une image à ajouter à la classe ';
			if(isset($_GET['class_name'])){
				echo $_GET['class_name'];
			}else{
				echo 'Undefined';
			}
			echo':
			<p>Prénom :
			<input type="text" name="firstname"></p>
			<p>Nom :
			<input type="text" name="lastname"></p>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="upload" id="upload">
		</form>
		<br>
	</div>
	<script type="text/javascript" src="../jquery-3.3.1.js"></script>
	<script type="text/javascript" src="upload.js"></script>';
