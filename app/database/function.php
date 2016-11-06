<?php
function genImageBlock($category, $subcategory){
  $hidden_value = '';
  $str = '';
  $check = '';
  $str_delete = '';
  $query = 'select *
  from tphotos
  where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');
  $result = selectData($query);

  if (isset($_SESSION['UserData']['username'])) {
   $str_delete = '<div class="section-info">
                    <div class="tag-delete">DELETE</div>
                    <div class="text-delete">CLICK AT THE PHOTO TO DELETE.</div>
                    </div>';

    if (array_key_exists('delete_file', $_POST)) {
      $filepath = $_POST['delete_file'];
      $category = $_POST['category'];
      $filename = $_POST['filename'];
      checktodelete($filepath,$category,$filename);
    }

  } else {
    $check = 'aniimated-thumbnials';
  }
  echo $str_delete."<div class='photo-list grid container' id='".$check."' data-masonry='{ \"itemSelector\": \"a .grid-item\", \"columnWidth\": 200 }'>";

    foreach ($result as $key => $value) {
      $file_path  = 'app/img/WEB/'.$value['category'].'/'.$value['subcategory'].'/'.$value['filename'];
      $file_path_thumb  = 'app/img/WEB/'.$value['category'].'/'.$value['subcategory'].'/thumb_'.$value['filename'];

      if (isset($_SESSION['UserData']['username'])) {
        $hidden_value =
        '   <input type="hidden" name="filepath" id="filepath" value="'.$file_path.'">
            <input type="hidden" name="category" id="category" value="'.$value['category'].'">
            <input type="hidden" name="filename" id="filename" value="'.$value['filename'].'">';
      }

      $str =  "
      <a href=".$file_path.">
        <div class='grid-item'>
          <img src=".$file_path_thumb." />
        </div>
      </a>".$hidden_value;
    echo $str;
  }
  echo "</div>";
}


function checktodelete($filepath,$category,$filename){
  if (file_exists($filepath)) {
    // unlink($filepath);
    // $query = "DELETE FROM tphotos
    // WHERE category = '".$category."'
    // AND filename = '".$filename."'";
    // queryData($query);
    echo 'file has been deleted.';
  } else {
    echo 'file does not exists.';
  }
}
?>