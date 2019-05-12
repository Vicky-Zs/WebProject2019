<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<script type="text/javascript" src="namemmrz.js"></script>
	<link rel="stylesheet" type="text/css" href="namemmrz.css">
</head>
<body>
	<div id="my_acc">
	<p id="pseudo"><c6><?php echo $_SESSION['username'];?></c6></p>
		<a href="profile/gestion.php">Mon compte</a>
		<a href="memorizer/play.php">Jouer</a>
		<a href="logout.php">Se deconnecter</a>
	</div>
	<div id="bvn">Bienvenue <strong id="pseudo"><?php echo $_SESSION['username'];?></strong> dans <br>Name Memorizer !</div>
	<div id="corps_accueil">
		<p>
			Ce site propose un service de <tst>mémoriseur de noms</tst> à destination de tous les enseignants qui ne retiennent jamais les prénoms de leurs élèves...<br>
			L'apprentissage et la mémorisation se feront sous forme d'un jeu afin de rendre la tâche plus ludique.
		</p>
		<br>
		<p>Consulte l'<his>historique</his> de tes parties <a href="memorizer/history.php" class="hvr-icon-forward"><img src="background/arrow_icon.png" class="hvr-icon"></a>
		<br>
		<p>Durée de l'épreuve: environ 20 minutes</p></p>

		<p id="play_button"><a href="memorizer/play.php">Jouer</a></p>
	</div>
<form action="logout.php"><input type='submit' value='Se deconnecter'></form>

</body>
</html>
