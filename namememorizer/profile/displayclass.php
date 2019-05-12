<?php
session_start();
$i=0;
require_once("../base.php");

function getClassesID($connection,$id)
{
	$query = "SELECT class_id FROM `teachersclasses` WHERE `teacher_id`=:id";
	$statement = $connection->prepare($query);
	$statement->bindValue(":id", $id, PDO::PARAM_INT);
	$OK = $statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_NUM);
	return $row;
}

function getClasseInfo($connection,$class_id)
{
	$query = "SELECT `name`, `picture` FROM `classes` WHERE id=:id";
	$statement = $connection->prepare($query);
	$statement->bindValue(":id", $class_id, PDO::PARAM_INT);
	$OK = $statement->execute();
	$row = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}
function getClassesandStudents($connection,$id)
{
	global $i;
	$classes_ID =getClassesID($connection,$id);
	foreach($classes_ID as $id){
		$id=$id[0];
		$query = "SELECT * FROM `students` JOIN studentsclasses on studentsclasses.student_id=students.id WHERE studentsclasses.class_id=:id";
		$statement = $connection->prepare($query);
		$statement->bindValue(":id",(int) $id, PDO::PARAM_INT);
		$OK = $statement->execute();
		$students = $statement->fetchAll(PDO::FETCH_ASSOC);
		$class_info= getClasseInfo($connection,(int)$id)[0];
		//print_r($class_info);
		//print_r($students[0]['lastname']);
		echo"<div id='une_classe".$i++."'>";
		echo "<div id = 'classe_info'> <img src='../background/".$class_info['picture']."' id='miniature'>";
		echo "<span id='nom_classe'>".$class_info['name']."</span>";
		echo"<input type='button' id='supp' value='SUPP CLASSE' onclick='deleteClass(".$i.")'></div>";
		echo '<div  id="liste_eleve'.$i.'" display="none"><ul>';
		foreach($students as $s)
		{
			echo '<li id="un_eleve">';
			echo"<img src='../memorizer/data/".$s['photo']."' id='miniature'>";
			echo '<span id="nom_eleve">'.$s['firstname'].' '.$s['lastname'].'</span>';
			echo '<input type="button" id="supp" value="SUPP ELEVE" onclick="deleteStudent('.$i.",".$s['id'].')">';
			echo '</li>';
		}


			echo"</ul></div>";
	}
}
getClassesandStudents($connection,$_SESSION['teacher_id']);
?>

<?php
/*$highscores=getHighScores($connection,$_SESSION['teacher_id']);
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
			<div id="une_classe" onclick="afficher_eleve()">
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
			</div>*/
