<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion</title>
	<script type="text/javascript" src="gestion.js"></script>
	<link rel="stylesheet" type="text/css" href="../namemmrz.css">
</head>
<body>
	<div id="my_acc">
	<p id="pseudo"><c6><?php echo $_SESSION['username'];?></c6></p>
		<a href="..accueil.php">Accueil</a>
		<a href="../memorizer/play.php">Jouer</a>
		<a href='../logout.php'>Se deconnecter</a>
	</div>
	<h1 id="titre_gestion">Mon compte</h1>
	<div id="mes_classes">
		<div id="conteneur_classe">
			<div id="une_classe" onclick="afficher_eleve()"?>>
				<img src="../background/classe1_miniature.png" id="miniature">
				<div id="nom_classe">L2 SCIENCE CO</div>
				<input type="button" name="supp" value="SUPP CLASSE" onclick="">
				<div id="liste_eleve" display="none">
					<ul>
						<li id="un_eleve">
								<span id="nom_eleve">Ceci est un élève par défaut</span>
								<input type="button" name="supp" value="SUPP ELEVE" onclick="">

						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="menu_classe">
			<div id="formAddStudent">
				<form action="../importation/upload.php" method="post" enctype="multipart/form-data">
					Choisissez un eleve a ajouter  la classe <span id="class_name">L2 MIASHS</span>
					<p>Prénom :
					<input type="hidden" name="class_id" value=1>
					<input type="text" name="firstname"></p>
					<p>Nom :
					<input type="text" name="lastname"></p>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="submit" value="Upload Image" name="upload" id="upload">
				</form>
			</div>
			<div id="formIns"></div>
		</div>



	</div

</body>
</html>
