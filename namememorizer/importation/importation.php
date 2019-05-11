<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Name Memorizer</title>

	<link rel="stylesheet" type="text/css" href="../namemmrz.css">

</head>
<body>
	<h1>Base de données</h1><br>
	<div id="classes">
		<h2>Les Classes</h2>
	</div>
	<div id="students">

	</div>
	<div id="addClass">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="upload" id="upload">
		</form>
		</form><br>
	</div>
	<script type="text/javascript" src="../jquery-3.3.1.js"></script>
	<script type="text/javascript" src="upload.js"></script>
</body>
</html>
