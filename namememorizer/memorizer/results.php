<?php
session_start();

require_once("../base.php");


function addScore($connection,$id,$score)
{
	$query = "INSERT INTO score (teacher_id,value) VALUES (:id,:score)";
	$statement = $connection->prepare($query);
	$statement->bindValue(":id", $id, PDO::PARAM_INT);
	$statement->bindValue(":score", $score, PDO::PARAM_INT);

	$OK = $statement->execute();
	return $OK;
}
if(isset($_GET['score'])){
	addScore($connection,$_SESSION['teacher_id'],$_GET['score']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Score</title>
	<link rel="stylesheet" type="text/css" href="../namemmrz.css">
</head>
<body>
	<div id="my_acc">
	<p id="pseudo"><c6><?php echo $_SESSION['username'];?></c6></p>
		<a href="../accueil.php">Accueil</a>
		<a href="../profile/gestion.php">Mon compte</a>
		<a href="../memorizer/play.php">Jouer</a>
		<a href='../logout.php'>Se deconnecter</a>
	</div>
	<div id="bvn">Votre score :</strong> </div>
	<div id="corps_accueil">
		<?php if(isset($_GET['score'])){
			addScore($connection,$_SESSION['teacher_id'],$_GET['score']);
			echo $_GET['score'].' points !';}
		?>
		<p>Rappel de votre palmarès</p>
		<ul id='palmares'>

		</ul>

	</div>
	<script type="text/javascript" src="../memorizer/palmares.js"></script>

</body>
</html>
