<?php
session_start();

require_once("../base.php");

function getHighScores($connection,$id)
{
	$query = "SELECT value FROM `score` WHERE teacher_id =:id ORDER BY `value` DESC LIMIT 0,5";
	$statement = $connection->prepare($query);
	$statement->bindValue(":id", $id, PDO::PARAM_INT);
	$OK = $statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}
?>

<?php
$highscores=getHighScores($connection,$_SESSION['teacher_id']);
if (isset($highscores[0]['value'])){
 echo '<li>1er '.$highscores[0]['value'].'points</li>';
}
	if (isset($highscores[1]['value'])){
	echo '<li>2e '.$highscores[1]['value'].'points</li>';
}
if (isset($highscores[2]['value'])){
	echo '<li>3e '.$highscores[2]['value'].'points</li>';
}
 if (isset($highscores[3]['value'])){
	echo '<li>4e '.$highscores[3]['value'].'points</li>';
}
 if (isset($highscores[4]['value'])){
	echo '<li>5e '.$highscores[4]['value'].'points</li>';
}?>