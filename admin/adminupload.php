<!DOCTYPE html>
<html>
    <body>
    <?php
    if ((!isset($_SESSION)) ? session_start() : '');
    function createdropdownlist()
    {
        $str =
            '<div class="form-group" style="width:200px;padding-left:14px;">
            <label>select folder</label>
                <select name="path_name[]" class="form-control">
                            <option></option>
                            <optgroup label="men" name="men">men
                                <option name="men1" value="men1">men1</option>
                                <option name="men2" value="men2">men2</option>
                                <option name="men3" value="men3">men3</option>
                                <option name="men4" value="men4">men4</option>
                                <option name="men5" value="men5">men5</option>
                            </optgroup>
                            <option name="" value="still">still</option>
                            <optgroup label="women" name="women">women
                                <option name="women1" value="women1">women1</option>
                                <option name="women2" value="women2">women2</option>
                                <option name="women3" value="women3">women3</option>
                                <option name="women4" value="women4">women4</option>
                                <option name="women5" value="women5">women5</option>
                                <option name="women6" value="women6">women6</option>
                                <option name="women7" value="women7">women7</option>
                                <option name="women8" value="women8">women8</option>
                                <option name="women9" value="women9">women9</option>
                                <option name="women10" value="women10">women10</option>
                            </optgroup>
                            <option name="portrait" value="portrait">portrait</option>
                            <option name="personal" value="personal">personal</option>
                        </select>
            </div>';
        echo $str;
    }
    if(isset($_SESSION['UserData']['username'])){
    ?>
        <div class="container">
        <h3>Upload</h3>
            <form action="admin/upload.php" method="post" enctype="multipart/form-data">
            <?php $block = 1; // $block should be less then 20;
            for ($i = 1; $i <= $block; $i++) {?>
                <div class="block-upload">
                    <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                    <?php createdropdownlist();?>
                </div>
                <?php }?>
                    <input type="submit" class="btn" value="Upload Image" name="submit">
                    <input type="button" class="btn" value="Back" name="back" onclick="history.go(-1)">
            </form>
        </div>
    <?php
    }else{
        header('location:index.php');
    }
    ?>
    </body>
</html>
