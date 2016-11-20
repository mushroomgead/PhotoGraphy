    <?php
    if ((!isset($_SESSION)) ? session_start() : '');
    function createdropdownlist()
    {
        $str =
        '
            <div class="block-upload col-md-4 col-xs-12 col-sm-6 col-lg-4">
            <input type="file" class="file" name="fileToUpload[]">
            <div class="upload"><i class="fa fa-folder-open-o fa-2x"></i></div>
                <select name="path_name[]" class="select-box">
                    <option data-default value="">SELECT CATEGORY..</option>
                    <optgroup label="men" name="men">men
                        <option name="men1" value="men_1">men1</option>
                        <option name="men2" value="men_2">men2</option>
                        <option name="men3" value="men_3">men3</option>
                        <option name="men4" value="men_4">men4</option>
                        <option name="men5" value="men_5">men5</option>
                    </optgroup>
                    <option name="" value="still">still</option>
                    <optgroup label="women" name="women">women
                        <option name="women1" value="women_1">women1</option>
                        <option name="women2" value="women_2">women2</option>
                        <option name="women3" value="women_3">women3</option>
                        <option name="women4" value="women_4">women4</option>
                        <option name="women5" value="women_5">women5</option>
                        <option name="women6" value="women_6">women6</option>
                        <option name="women7" value="women_7">women7</option>
                        <option name="women8" value="women_8">women8</option>
                        <option name="women9" value="women_9">women9</option>
                        <option name="women10" value="women_10">women10</option>
                    </optgroup>
                    <option name="portrait" value="portrait">portrait</option>
                    <option name="personal" value="personal">personal</option>
                </select>
            </div>';
        echo $str;
    }
    if(isset($_SESSION['UserData']['username'])) { ?>
        <!-- <div class="container"> -->
            <form action="#" method="post" id="adminupload" enctype="multipart/form-data">
            <?php $block = 4; // $block should be less then 20; ?> 
            <div class="clearfix">
           <?php for ($i = 1; $i <= $block; $i++) {
                createdropdownlist();
            }?>
            </div>
            <div class="block-btn">
                <input type="submit" class="btn" value="Upload Image" name="submit">
                <input type="button" class="btn" value="Back" name="back" onclick="history.go(-1)">
            </div>
            </form>
        <!-- </div> -->
    <?php
    }else{
        header('location:index.php');
    }
    ?>
<script type="text/javascript">
$("form#adminupload").submit(function (event){
    event.preventDefault();
    var data = new FormData($(this)[0]);
    $.ajax({
        type: 'post',
        url: './admin/upload.php',
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(result){
            if(result!=""){
                console.log(result);
            }
        },
        error: function(msg, err){
            alert(msg.responseText);
        }
    })
})
</script>
