
<?php  echo "<div id='question'><p id='num_question'></p>Comment s'appelle cet élève ?</div>"?>
		
			 <?php
		require_once("base.php")

		if(isset ($_SESSION['teacher_id'])){
			$id=$_SESSION['teacher_id'];
		}else{
			$id=1;
		}
	$sql = "SELECT id, firstname, lastname, photo FROM students JOIN studentsclasses on students.id=studentsclasses.student_id JOIN teachersclasses on teachersclasses.class_id=studentsclasses.class_id WHERE teachersclasses.teacher_id=".$id;
	$result = $conn->query($sql);
	$table = array();
	$i=0;
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result) )
		{
			$table=array_pad($table,++$i,array("id"=> $row["id"], 'name'=> $row["firstname"],'lastname'=> $row["lastname"],"photo"=> $row["photo"]));
		}
		$rdTab = array(rand(0,$i-1),rand(0,$i-1),rand(0,$i-1),rand(0,$i-1));
		$rdID = rand(0,3);
		echo "<img src=\"data/".$table[$rdTab[$rdID]]["photo"]."\" id=\"photo_eleve\" alt=\"Photo d'un élève\">";
	} else {
		echo "0 results";
	}
	$conn->close();
	?>

		<?php 
		echo"<p id="indice">Indice :</p>
		<form action="memoriseur.php" method ="post" id="reponse">";
			 

			echo '<input type="submit" name="choix" id="choix" value="'.$table[$rdTab[0]]["name"]." ".$table[$rdTab[0]]["lastname"].'">';
			echo '<input type="submit" name="choix" id="choix" value="'.$table[$rdTab[1]]["name"]." ".$table[$rdTab[1]]["lastname"].'">';
			echo '<input type="submit" name="choix" id="choix" value="'.$table[$rdTab[2]]["name"]." ".$table[$rdTab[2]]["lastname"].'">';
			echo '<input type="submit" name="choix" id="choix" value="'.$table[$rdTab[3]]["name"]." ".$table[$rdTab[3]]["lastname"].'">';
			?>
			<?php if (isset($_POST['score'])){
				
				$score = $_POST['score'];
			}
			else{
				$score = 0;
			}		
				$answer = $table[$rdTab[$rdID]]["name"]." ".$table[$rdTab[$rdID]]["lastname"];
			?>			

			<?php
			echo '<input type="hidden" name="answer" value="<?php echo $answer ?>" />';			
			
			if (isset($_POST['choix'])){
				if($_POST['choix']==$_POST['answer'])
				{
					echo "<p>Bravo !</p>";
					$score++;
				}
				else{
					echo "<p>Faux !</p>";
					$score--;
				}
				
			}
			echo '<input type="hidden" name="score" value="<?php echo $score ?>" />	

		</form>
		<p>Score : '.$score.'</p>';?>