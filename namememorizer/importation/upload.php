
<?php
//code from W3schools
$target_dir = "../memorizer/data/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 // gestion BDD


require_once('../base.php');

function addStudent($connection,$lastname,$firstname,$photo){
	$query = "INSERT INTO students (lastname,firstname,photo) VALUES (:lastname,:firstname, :photo)";
	$statement = $connection->prepare($query);
	$statement->bindValue(":lastname", $lastname, PDO::PARAM_STR);
	$statement->bindValue(":firstname", $firstname, PDO::PARAM_STR);
	$statement->bindValue(":photo", $photo, PDO::PARAM_STR);
	$OK = $statement->execute();
	return $OK;
}
if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_FILES["fileToUpload"]["name"])){
	addStudent($connection,$_POST['lastname'],$_POST['firstname'],$_FILES["fileToUpload"]["name"]);
}else{
	echo 'nop';
}
?>

	</div>
</body>
</html>
