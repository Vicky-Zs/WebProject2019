<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Name Memorizer</title>
	<script type="text/javascript" src="namemmrz.js"></script>
	<link rel="stylesheet" type="text/css" href="namemmrz.css">

</head>
<body>
	<?php require_once('base.php');?>
	<h1>Name Memorizer</h1><br>
	<div id="formIns">
		<form action="registration.php" method="post">
		<div>
	        <label for="name">Nom</label>
	        <input id="blocTxt" type="text" id="name" name="lastname" placeholder="ex: DUPONT">
			<?php $ok=true;
			if(isset($_POST['lastname']))
				{
					$lastname=$_POST["lastname"];
				}else{
					$ok=false;
				}
				?>
	    </div>
	    <div>
	        <label for="name">Prenom</label>
	        <input id="blocTxt" type="text" id="name" name="firstname" placeholder="ex: Michel">
			<?php if(isset($_POST['firstname']))
				{
					$firstname=$_POST["firstname"];
				}else{
					$ok=false;
				}?>
	    </div>
		<div>
	        <label for="name">Pseudo</label>
	        <input id="blocTxt" type="text" id="name" name="newusername" placeholder="ex: DUPONT">
			<span id= "error1" class="error">
				<?php

				if(isset($_POST['newusername']))
				{
					$username=$_POST["newusername"];
					if(strlen($username)<4){
						$ok=false;
						echo "Le nom d'utilisateur doit compter au moins 4 caractères";
					}

					if(!checkUserName($connection,$username))
					{
						echo "Nom d'utilisateur déjà utilisé";
						$ok=false;
					}
				}else{
					$ok=false;
				}
				?>
				</span>
	    </div>
	    <div>
	        <label for="mail">E-mail</label>
	        <input id="blocTxt" type="email" id="mail" name="mail" placeholder="exemple@xyz.net">
				<span id= "error4" class="error">

					<?php
					if(isset($_POST['mail']))
					{
						if (strpos($_POST['mail'], '@') === false || strpos($_POST['mail'], '.') === false){
							echo 'Format de l\'email invalide';
							$ok=false;

						}else{
							$email=$_POST['mail'];
						}
						}else{
						$ok=false;
					}
					?>

				</span>
	    </div>
	    <div>
	    	<label for ="password">Mot de passe</label>
			<input id="blocTxt" type="password" name="password" placeholder="">
				<span id= "error2" class="error">

					<?php
						if(isset($_POST['password']))
						{	if(strlen($_POST["password"])<8){
							echo "Au moins 8 caractères";
							$ok=false;
						}}else{
							$ok=false;
						}
					?>
				</span>
		</div>
	    <div>
	    	<label for ="password">Confirmer mot de passe</label>
			<input id="blocTxt" type="password" name="confirmpassword" placeholder="">
				<span id= "error3">

					<?php
					if(isset($_POST['password']) && isset($_POST['confirmpassword']))
						{if($_POST['password'] != $_POST['confirmpassword']){
						echo "Le mot de passe et sa confirmation sont différents";
						$ok=false;
					}else{
						$salt = generateRandomString(10);
						$cryptedPw = hash("sha384",$_POST['password'].$salt);
					}
					}else{
						$ok=false;
					}?>
				</span>
		</div>
		<input id="buttonIns" type="submit" name="inscription" value="Je m'inscris !">
		</form>
	</div>
					<?php
					if($ok){
						$userOK = addUser($connection, $username,$lastname,$firstname, $email, $cryptedPw, $salt);

					  if ($userOK){
						  echo "<div id=\"validation\"><p>L'inscription a été réalisée avec succès.</p>";
						  echo '<p><a href="accueil.html">Retour vers la page d\'accueil.</a></p></div>';
						}
						else{
							echo "point point point poooooint";
						}

					}


				?>

</body>

		<?php
			function checkUserName($connection,$username){
				$query = "SELECT COUNT(*) AS count FROM teachers WHERE login=:username";
				$statement = $connection->prepare($query);
				$statement->bindValue(":username", $username, PDO::PARAM_STR);
				$statement->execute();
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				return $row["count"] == "0";
			}
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
		?>
	</body>
</html>
