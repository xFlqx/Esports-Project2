<?php
$target_dir = "../media/team_player_images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$previous = $_SERVER['HTTP_REFERER'];
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
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

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		chmod($target_file, 0755);
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	


?>

