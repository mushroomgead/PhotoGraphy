<!DOCTYPE html>
<html>
<style type="text/css">
    .block-upload{
        width: 100%;
        border-bottom: 1px solid #ececec;
        margin-bottom: 10px;
    }
    body{
        background: #f5f5f5;
    }
</style>
<link rel="stylesheet" type="text/css" href="../app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<body>
    <?php
    function createdropdownlist(){
        $str = 
        '
        <div class="form-group" style="width:200px;padding-left:14px;">
        <label>select folder</label>
            <select name="path_name[]" class="form-control">
                        <option></option> 
                        <option value="men">men</option>
                        <option value="still">still</option>
                        <option value="women">women</option>
                        <option value="portrait">portrait</option>
                        <option value="personal">personal</option>
                    </select>
        </div>';
        echo $str;
    }
    ?>
    <div class="container">
    <h3>Upload</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="block-upload">
                <input class="btn pull-left" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist(); ?>
            </div>
            <div class="block-upload">
                <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist(); ?>
            </div>
            <div class="block-upload">
                <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist(); ?>
            </div>
            <div class="block-upload">
                <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist(); ?>
            </div>
            <div class="block-upload">
                <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist(); ?>
            </div>
                <input type="submit" class="btn" value="Upload Image" name="submit">
                <input type="button" class="btn" value="Back" name="back">
        </form>
    </div>
</body>
</html>