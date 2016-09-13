<?php
$file_path  = 'app/img/WEB_/STILL/20434210351_f1254e5fa2_o.jpg';
$btn_delete = '';
$btn_submit = '';

if(isset($_SESSION['UserData']['username'])){
  $check = '';
  // $btn_delete = ' <input type="submit" value="Delete img"/>
  //       <input type="hidden" value="'.$file_path.'" name="delete_file" />';
  $btn_delete = '<label class="checkbox-inline"><input type="checkbox" name="delete_file" value="'.$file_path.'"></label>';
  $btn_submit = '<input type="submit" value="Delete img"/>';

 } else {
  $check = 'aniimated-thumbnials' ;
}
print_r($_POST);
if(array_key_exists('delete_file', $_POST)){
  $file_name = $_POST['delete_file'];
  if(file_exists($file_name)){
    unlink($file_name);
    echo 'file has been deleted.';
  }else{
    echo 'file does not exists.';
  }
}
?>

<form method="post">
  <?php echo $btn_submit ;?>
  <div class="photo-list container" id="<?php echo $check; ?>">
   <?php echo $btn_delete ;?>
    <a class="img-entry-horiz" href="<?php echo $file_path; ?>">
      <img src="<?php echo $file_path; ?>" />
    </a>
  </div>
</form>