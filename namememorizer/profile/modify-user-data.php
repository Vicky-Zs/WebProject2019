
<?php
session_start();
require_once('../base.php');
	echo '
		<form action="modify-user-data.php" method="post">
	    <div>
	        <label for="mail">E-mail</label>';


					if(isset($_POST['mail']))
					{
						if (strpos($_POST['mail'], '@') === false || strpos($_POST['mail'], '.') === false){
							echo 'Format de l\'email invalide';
							$ok=false;

						}else{
							modifyMail($connection,$_SESSION['id'],$_POST['mail']);
						}
					}

	        echo'<input id="blocTxt" type="email" id="mail" name="mail" placeholder="'.getMail($connection,$_SESSION['id']).'">



				</span>
	    </div>
				<input id="buttonIns" type="submit" name="inscription" value="Modifier e-mail">
		</form>
		<form action="modify-user-data.php" method="post">
	    <div>
	    	<label for ="password">Nouveau mot de passe</label>
			<input id="blocTxt" type="password" name="password" placeholder="">
				<span id= "error2" class="error">';


						if(isset($_POST['password']))
						{	if(strlen($_POST["password"])<8){
							echo "Au moins 8 caractères";
							$ok=false;
						}}

				echo '</span>
		</div>
	    <div>
	    	<label for ="password">Confirmer mot de passe</label>
			<input id="blocTxt" type="password" name="confirmpassword" placeholder="">
				<span id= "error3">';


					if(isset($_POST['password']) && isset($_POST['confirmpassword']))
						{if($_POST['password'] != $_POST['confirmpassword']){
						echo "Le mot de passe et sa confirmation sont différents";
						$ok=false;
					}else{
						modifyPw($connection,$_SESSION['id'],$_POST['password']);

					}
						}

				echo'</span>
		</div>
		<input id="buttonIns" type="submit" name="inscription" value="Changer Mot de Passe">
		</form>
	';




			function addUser($connection,$username,$lastname,$firstname,$email,$cryptedPw,$salt){
				$query = "INSERT INTO teachers (login,lastname,firstname, email, password, salt) VALUES (:username,:lastname,:firstname, :email, :cryptedPw, :salt)";
				$statement = $connection->prepare($query);
				$statement->bindValue(":username", $username, PDO::PARAM_STR);
				$statement->bindValue(":lastname", $lastname, PDO::PARAM_STR);
				$statement->bindValue(":firstname", $firstname, PDO::PARAM_STR);
				$statement->bindValue(":email", $email, PDO::PARAM_STR);
				$statement->bindValue(":cryptedPw", $cryptedPw, PDO::PARAM_STR);
				$statement->bindValue(":salt", $salt, PDO::PARAM_STR);
				$OK = $statement->execute();
				return $OK;
			}
			  function generateRandomString($length = 10) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
				  $randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			  }
			    function modifyPw($connection, $id,$password){
					$salt = generateRandomString(10);
					$cryptedPw = hash("sha384",$password.$salt);
					$query = "UPDATE `teachers` SET `password`=:password,`salt`=:salt WHERE `id`=:id";
					$statement = $connection->prepare($query);
					$statement->bindValue(":password", $cryptedPw, PDO::PARAM_STR);
					$statement->bindValue(":salt", $salt, PDO::PARAM_STR);
					$statement->bindValue(":id", $id, PDO::PARAM_INT);
					$OK=$statement->execute();
					return $OK;
				  }
			    function modifyMail($connection, $id,$mail){
					$query = "UPDATE `teachers` SET `email`=:mail WHERE `id`=:id";
					$statement = $connection->prepare($query);
					$statement->bindValue(":mail", $mail, PDO::PARAM_STR);
					$statement->bindValue(":id", $id, PDO::PARAM_INT);
					$OK=$statement->execute();
					return $OK;
				  }
			    function getMail($connection, $id){
					$query = "SELECT email FROM teachers WHERE id=:id ";
					$statement = $connection->prepare($query);
					$statement->bindValue(":id", $id, PDO::PARAM_INT);
					$statement->execute();
					$row = $statement->fetch(PDO::FETCH_ASSOC);
					return $row["email"];
				  }
		?>
