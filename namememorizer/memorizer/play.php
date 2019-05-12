<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLAY</title>
	<script type="text/javascript" src="namemmrz.js"></script>
	<link rel="stylesheet" type="text/css" href="../namemmrz.css">
</head>
<body>
	<div id="my_acc">
	<p id="pseudo"><c6><?php echo $_SESSION['username'];?></c6></p>
		<a href="../accueil.php">Accueil</a>
		<a href="../profile/gestion.php">Mon compte</a>
		<a href='../logout.php'>Se deconnecter</a>
	</div>
	<div id="interface_jeu">
		<div id="question">Comment s'appelle cet élève ?</div>
		<img id="photo_eleve" src="photos/dumont57u.jpg" alt="Photo d'un élève">
		<p id="score_message">Score :<p id="score">0</p></p>

		<div id="reponse">
			<label for="choix1">A</label>
			<input type="button" class="choice" id="choix1" value="nom_eleve">
			<label for="choix2">B</label>
			<input type="button" class="choice" id="choix2" value="nom_eleve">
			<br>
			<label for="choix3">C</label>
			<input type="button" class="choice" id="choix3" value="nom_eleve">
			<label for="choix4">D</label>
			<input type="button" class="choice" id="choix4" value="nom_eleve">
		</div>

	</div>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="play.js"></script>
	<a href='../logout.php'>Se deconnecter</a>

</body>
</html>
