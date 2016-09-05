<?php
$count_file = count($_FILES['fileToUpload']['name']);

for($i=0;$i<$count_file;$i++){
    $file_path = '../app/img/WEB_/'.strtoupper($_POST['path_name'][$i]).'/';
    $target_dir = $file_path;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".</br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.</br>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.</br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"][$i] > 5000000) {
        echo "Sorry, your file is too large.</br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file".$i." was not uploaded.</br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
            echo "The file ".$i. basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.</br>";
        } else {
            echo "Sorry, there was an error uploading your file".$i.".</br>";
        }
    }
}
?>
