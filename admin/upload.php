<?php
$count_file = count($_FILES['fileToUpload']['name']);

for ($i = 0; $i < $count_file; $i++) {
    $target_dir    = '../app/img/WEB_/' . strtoupper($_POST['path_name'][$i]) . '/'; //Hard code path, Dont forget to change.
    $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
    $uploadOk      = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // set values for insert into database.
    $category      = $_POST['path_name'][$i];
    $subcatagory   = '';
    $caption       = '';//$_POST['caption'][$i];
    $filename      = $_FILES["fileToUpload"]["name"][$i];

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);

        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".</br>";
            $uploadOk = 1;

        } else {
            echo "File is not an image.</br>";
            $uploadOk = 0;
        }
    }
    // Check some field is null
    if (isset($_POST['path_name'][$i])) {
        $checkField = 0;
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file" . $i . " was not uploaded.</br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
            echo "The file " . $i . basename($_FILES["fileToUpload"]["name"][$i]) . " has been uploaded.</br>";
            // hard code for insert values into database.
            require_once('../app/database/conn_db.php');
            $query = "INSERT INTO TPHOTOS (category, subcatagory, caption, filename)
                      VALUES ('".$category."','".$subcatagory."','".$caption."','".$filename."')";
            queryData($query);

        } else {
            echo "Sorry, there was an error uploading your file" . $i . ".</br>";
        }
    }
    if ($checkField == 0) {
        echo "This field haven't img to upload";
    }
}