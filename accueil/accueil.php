<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="namemmrz.css">
</head>
<body>
	<div id="bvn">Bienvenu.e <strong>pseudo_user</strong> dans <br>Name Memorizer !</div>
	<div id="corps_accueil">
		<p>
			Ce site propose un service de <tst>mémoriseur de noms</tst> à destination de tous les enseignants qui ne retiennent jamais les prénoms de leurs élèves...<br>
			L'apprentissage et la mémorisation se feront sous forme d'un jeu afin de rendre la tâche plus ludique.
		</p>		
		<?php
			$_SESSION['teacher_id']=2;
		?>
		<form action="../memoriseur/memoriseur.php" method ="get" id="reponse">
			<input type="submit" name="jouer">
		</form>
</body>
</html>