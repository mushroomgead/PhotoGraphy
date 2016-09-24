<?php
function genImageBlock($category, $subcategory){
  $query = 'select * 
            from tphotos 
            where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');

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
  $str = "<form method='post'>".$btn_submit."
			<div class='photo-list container' id=".$check.">".$btn_delete."
			  <a class='img-entry-horiz' href=".$file_path.">
			    <img src=".$file_path." />
			  </a>
			</div>
		</form>";
  echo $str;
	}
}
?>