<?php
$query = "select * 
            from tphotos
           where category     = 'women'
             and subcategory  = '6';";

$result = selectData($query);

foreach ($result as $key => $value) {

  $file_path  = 'app/img/WEB/'.$value['category'].'/'.$value['subcategory'].'/'.$value['filename'];
  $btn_delete = '';
  $btn_submit = '';

  if (isset($_SESSION['UserData']['username'])) {
      $check = '';
      $btn_delete = '<label class="checkbox-inline"><input type="checkbox" name="delete_file" value="' . $file_path . '">
                    <input type="hidden" name="category" value="'.$value['category'].'">
                    <input type="hidden" name="filename" value="'.$value['filename'].'"></label>
                    ';
      $btn_submit = '<input type="submit" value="Delete img"/>';

  } else {
      $check = 'aniimated-thumbnials';
  }

  if (array_key_exists('delete_file', $_POST)) {
      $filepath = $_POST['delete_file'];
      $category = $_POST['category'];
      $filename = $_POST['filename'];

      if (file_exists($filepath)) {
          unlink($filepath);
          $query = "DELETE FROM tphotos
                     WHERE category = '".$category."'
                       AND filename = '".$filename."'";
          queryData($query);
          echo 'file has been deleted.';
      } else {
          echo 'file does not exists.';
      }
  }
  ?>

  <form method="post">
    <?php echo $btn_submit; ?>
    <div class="photo-list container" id="<?php echo $check; ?>">
     <?php echo $btn_delete; ?>
      <a class="img-entry-horiz" href="<?php echo $file_path; ?>">
        <img src="<?php echo $file_path; ?>" />
      </a>
    </div>
  </form>
<?php } ?>