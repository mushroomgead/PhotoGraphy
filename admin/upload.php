<?php
$count_file = count($_FILES['fileToUpload']['name']);
for ($i = 0; $i < $count_file; $i++) {
    if($_FILES['fileToUpload']['name'][$i]!="") {

        $uploadOk      = 1;
        $errmsg        = '';
        $checkField    = 1;
        // set values for insert into database.
        $splitstr      = array();
        $splitstr      = split('_', $_POST['path_name'][$i]);
        $category      = $splitstr[0];
        $subcategory   = isset($splitstr[1])? $splitstr[1] : '';
        $caption       = '';//$_POST['caption'][$i];
        $filename      = $_FILES["fileToUpload"]["name"][$i];


        $target_dir    = '../img/WEB/' . strtoupper($category) . '/' . strtoupper($subcategory) . '/';
        $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        echo $target_dir;
        echo $target_file;

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);

            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".</br>";
                $uploadOk = 1;

            } else {
                $errmsg .= "- File is not an image type.\n";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $errmsg .= "- File already exists.\n";
            $uploadOk = 0;
        }else {
            // Check some field is null
            if (!isset($_POST['path_name'][$i]) || $_POST['path_name'][$i]=="") {
                $errmsg .= "- Please select category first.\n";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 5000000) {
                $errmsg .= "- Your file is too large.\n";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $errmsg .= "- Only JPG, JPEG, PNG & GIF files are allowed.\n";
                $uploadOk = 0;
            }
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Your file " . $filename . " was not uploaded.\n".$errmsg;
            // if everything is ok, try to upload file
        // } else {
        //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {

        //         thumbnail_photo($target_dir,$filename);

        //         echo "The file " . $i . basename($_FILES["fileToUpload"]["name"][$i]) . " has been uploaded.</br>";
        //         // hard code for insert values into database.
        //         require_once('../database/conn_db.php');
        //         $query = "INSERT INTO TPHOTOS (category, subcategory, caption, filename)
        //                   VALUES ('".$category."','".$subcategory."','".$caption."','".$filename."')";
        //         queryData($query);

        //     } else {
        //         echo "There was an error to uploading your file" . $filename . ".]";
        //     }
        }
    }
}

function thumbnail_photo($target_dir,$filename){

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