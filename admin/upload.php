<?php
$count_file = count($_FILES['fileToUpload']['name']);

for ($i = 0; $i < $count_file; $i++) {
    $target_dir    = '../app/img/WEB/' . strtoupper($_POST['path_name'][$i]) . '/'; //Hard code path, Dont forget to change.
    $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

    $uploadOk      = 1;
    $checkField    = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // set values for insert into database.
    $category      = $_POST['path_name'][$i];
    $subcategory   = '';
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
    if (!isset($_POST['path_name'][$i])) {
        $checkField = 0;
    }
    // Check if file already exists
   /* if (file_exists($target_file)) {
        echo "Sorry, file already exists.</br>";
        $uploadOk = 0;
    }*/
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

            resizeImage($target_dir,$filename);

            echo "The file " . $i . basename($_FILES["fileToUpload"]["name"][$i]) . " has been uploaded.</br>";
            // hard code for insert values into database.
            require_once('../app/database/conn_db.php');
            $query = "INSERT INTO TPHOTOS (category, subcategory, caption, filename)
                      VALUES ('".$category."','".$subcategory."','".$caption."','".$filename."')";
            queryData($query);

        } else {
            echo "Sorry, there was an error uploading your file" . $i . ".</br>";
        }
    }
    if ($checkField == 0) {
        echo "This field haven't img to upload";
    }
}

function resizeImage($target_dir,$filename){

  $thumbnial_width    = '800';
  $thumbnial_height   = '800';
  $original_image     = $target_dir.$filename;
  $actual_size        = getimagesize($original_image);

  $actual_size_width  = $actual_size[0];
  $actual_size_height = $actual_size[1];
  $image_type         = $actual_size[2];

  if($actual_size_width > $actual_size_height){
    //Horizontal
    $new_width  = $thumbnial_width;
    $new_height = intval(($actual_size_height*$new_width)/$actual_size_width);
    
  }else{
    //Vertical
    $new_height = $thumbnial_height;
    $new_width  = intval($actual_size_width*$new_height/$actual_size_height);
  }
     
    /*--------------------------
    + Meaning of Image Type. +
    --------------------------
    + VALUES| CONSTANT       +
    +  1    | IMAGETYPE_GIF  +
    +  2    | IMAGETYPE_JPEG +
    +  3    | IMAGETYPE_PNG  +
    ----------------------------*/

  if($image_type == IMAGETYPE_GIF){
    $imgt = 'ImageGIF';
    $imagecreatefrom = 'imagecreatefromgif';

  }else if($image_type == IMAGETYPE_JPEG){
    $imgt = 'ImageJPEG';
    $imagecreatefrom = 'imagecreatefromjpeg';

  }else if($image_type == IMAGETYPE_PNG){
    $imgt = 'ImagePNG';
    $imagecreatefrom = 'imagecreatefrompng';
  }

  if($imgt){
    $old_image      = $imagecreatefrom($original_image);
    $thumb_image    = imagecreatetruecolor($new_width, $new_height);
    imagecopyresized($thumb_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $actual_size_width, $actual_size_height);
    $imgt($thumb_image,$target_dir.'thumb_'.$filename);
  }
}
?>