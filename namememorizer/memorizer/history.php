<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Historique</title>
	<link rel="stylesheet" type="text/css" href="../namemmrz.css">
</head>
<body>
	<div id="my_acc">
	<p id="pseudo"><c6><?php echo $_SESSION['username'];?></c6></p>
		<a href="../accueil.php">Accueil</a>
		<a href="../user_data/gestion.php">Mon compte</a>
		<a href="../memorizer/play.php">Jouer</a>
		<a href='../logout.php'>Se deconnecter</a>
	</div>
	<div id="bvn">Palmarès de<strong id="pseudo"> <?php echo $_SESSION['username'];?></strong> </div>
	<div id="corps_accueil">

			<ul id="palmares">


			</ul>
	</div>
	<script type="text/javascript" src="../memorizer/palmares.js"></script>
<a href='../logout.php'>Se deconnecter</a>
</body>
</html>
