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
function createdropdownlist()
{
    $str =
        '<div class="form-group" style="width:200px;padding-left:14px;">
        <label>select folder</label>
            <select name="path_name[]" class="form-control">
                        <option></option>
                        <optgroup label="men">men
                            <option value="1" >1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </optgroup>
                        <option value="still">still</option>
                        <optgroup label="women">women
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </optgroup>
                        <option value="portrait">portrait</option>
                        <option value="personal">personal</option>
                    </select>
        </div>';
    echo $str;
}?>
    <div class="container">
    <h3>Upload</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <?php $block = 2; // $block should be less then 20;
        for ($i = 1; $i <= $block; $i++) {?>
            <div class="block-upload">
                <input class="btn" type="file" name="fileToUpload[]" id="fileToUpload">
                <?php createdropdownlist();?>
            </div>
            <?php }?>
            <!-- <div id="block-upload">55555555555555555</div> -->
                <input type="submit" class="btn" value="Upload Image" name="submit">
                <input type="button" class="btn" value="Back" name="back" onclick="history.go(-1)">
                <button type="button" class="btn btn-info" name='gead' value='gead' onclick="addBlockUpload()">
        </form>
    </div>
<!-- javascript -->
<script type="text/javascript">
var clicks = 0;
function addBlockUpload(){
    clicks += 1;
    console.log(clicks);

    var a = document.getElementById("block-upload");
    a.value = clicks;
}
</script>

</body>
</html>
