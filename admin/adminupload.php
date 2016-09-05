<!DOCTYPE html>
<html>
<head>Page Login</head>
<body>
<style type="text/css">
    .block-upload{
        width: 100%;
    }
</style>
    <?php
    function createdropdownlist(){
        $str = '<select name="path_name[]">
                    <option></option> 
                    <option value="men">men</option>
                    <option value="still">still</option>
                    <option value="women">women</option>
                    <option value="portrait">portrait</option>
                    <option value="personal">personal</option>
                </select>';
        echo $str;
    }
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="block-upload">
            <input class="pull-left" type="file" name="fileToUpload[]" id="fileToUpload"><?php createdropdownlist(); ?>
        </div>
        <div class="block-upload">
            <input type="file" name="fileToUpload[]" id="fileToUpload"><?php createdropdownlist(); ?>
        </div>
        <div class="block-upload">
            <input type="file" name="fileToUpload[]" id="fileToUpload"><?php createdropdownlist(); ?>
        </div>
        <div class="block-upload">
            <input type="file" name="fileToUpload[]" id="fileToUpload"><?php createdropdownlist(); ?>
        </div>
        <div class="block-upload">
            <input type="file" name="fileToUpload[]" id="fileToUpload"><?php createdropdownlist(); ?>
        </div>
            <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>