<?php
function genImageBlock($category, $subcategory){
  $btn_delete = '';
  $btn_submit = '';
  $str = ''; 

  $query = 'select * 
  from tphotos 
  where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');

  $result = selectData($query);

  if (isset($_SESSION['UserData']['username'])) {
    $check = '';
    $btn_submit = '<div class=""><input type="submit" value="Delete img"/>';

    if (array_key_exists('delete_file', $_POST)) {
      $filepath = $_POST['delete_file'];
      $category = $_POST['category'];
      $filename = $_POST['filename'];
      checktodelete($filepath,$category,$filename);
    }

  } else {
    $check = 'aniimated-thumbnials';
  }
  echo "  <form method='post'>".$btn_submit."
  <div class='photo-list container' id=".$check.">";

    foreach ($result as $key => $value) {
      $file_path  = 'app/img/WEB/'.$value['category'].'/'.$value['subcategory'].'/'.$value['filename'];

      if (isset($_SESSION['UserData']['username'])) {
        $btn_delete = '<label class="checkbox-inline"><input type="checkbox" name="delete_file" value="' . $file_path . '">
        <input type="hidden" name="category" value="'.$value['category'].'">
        <input type="hidden" name="filename" value="'.$value['filename'].'"></label>';
      }
      $str =  $btn_delete."<a class='img-entry-horiz' href=".$file_path.">
      <img src=".$file_path." />
    </a>";
    echo $str;
  }
  echo "</div></div>
</form>";
}

function checktodelete($filepath,$category,$filename){
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