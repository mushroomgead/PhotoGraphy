<?php
// function genImageBlock($category, $subcategory){
//   $hidden_value = '';
//   $str = '';
//   $check = '';
//   $str_delete = '';
//   $query_str = 'select *
//   from tphotos
//   where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');
//   $result = selectData($query_str);

//   if (isset($_SESSION['UserData']['username'])) {
//    $str_delete = '<div class="section-info">
//                     <div class="tag-delete">DELETE</div>
//                     <div class="text-delete">CLICK AT THE PHOTO TO DELETE.</div>
//                     </div>';

//     if (array_key_exists('delete_file', $_POST)) {
//       $filepath = $_POST['delete_file'];
//       $category = $_POST['category'];
//       $filename = $_POST['filename'];
//       checktodelete($filepath,$category,$filename);
//     }

//   } else {
//     $check = 'aniimated-thumbnials';
//   }
//   echo $str_delete."<div class='photo-list grid container' id='".$check."' data-masonry='{ \"itemSelector\": \"a .grid-item\", \"columnWidth\": 200 }'>";

//     foreach ($result as $key => $value) {

//       $file_path  = 'app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
//       $file_path_thumb  = 'app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/thumb_'.$value['filename'];

//       if (isset($_SESSION['UserData']['username'])) {
//         $hidden_value =
//         '   <input type="hidden" name="filepath" id="filepath" value="'.$file_path.'">
//             <input type="hidden" name="category" id="category" value="'.strtoupper($value['category']).'">
//             <input type="hidden" name="filename" id="filename" value="'.$value['filename'].'">';
//       }

//       $str =  "
//       <a href=".$file_path.">
//         <div class='grid-item'>
//           <img src=".$file_path_thumb." />
//         </div>
//       </a>".$hidden_value;

//     echo $str;
//   }
//   echo "</div>";
// }


function genImageBlock($category, $subcategory){
    $hidden_value = '';
    $str          = '';
    $check        = '';
    $i            = 0;
    $img  = array();


    $str_delete = '';

    $query_str =   'select *
                    from tphotos
                    where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');
    $result = selectData($query_str);

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
    }

    foreach ($result as $key => $value) {
        $file_path  = './app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
        $file_path_backend  = '../img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
        $file_path_thumb  = './app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/thumb_'.$value['filename'];

        if (isset($_SESSION['UserData']['username'])) {
        $hidden_value =
        '   <input type="hidden" name="filepath" id="filepath" value="'.$file_path.'">
        <input type="hidden" name="category" id="category" value="'.strtoupper($value['category']).'">
        <input type="hidden" name="filename" id="filename" value="'.$value['filename'].'">';
        }

        $img[$i]['src']     = $file_path;
        // $img[$i]['data']    = $file_path_thumb;
        $img[$i]['data']    = $file_path;
        $actual_size        = getimagesize($file_path_backend);
        $img_width          = $actual_size[0];
        $img_height         = $actual_size[1];
        $img[$i]['ratio']   = $img_width/$img_height;
        $i = $i+1;
    }
    return json_encode($img);
}

function GenCoverPhoto($category,$flgmark){ 
    $i = 0;
    $query_str = 'select * 
    from tphotos 
    where category = "'.$category.'" 
    and flg_mark = "'.$flgmark.'" 
    order by subcategory';

    $result = selectData($query_str);

    if($flgmark == 'cover'){
        echo ' <div id="block-photo"> ';

        foreach ($result as $key => $value) {
          $i = $i+1;
          echo $str = ' <a class="img-entry-vert  sub-img-folder" href="?page='.$category.'&subpage='.$i.'">

            <img src="app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'].'" /></a>';
        }
        echo '</div>';
    }else{
    echo '<div class="demo">
    <ul id = "imageGallery">';

      foreach ($result as $key => $value) {
        echo $str = '<img src="app/img/WEB/HOME/'.$value['filename'].'" />';
    }
    echo '</ul></div>';
}
}

function genCoverImageBlock($category,$flgmark){ 
    $i = 0;
    $query_str = '  select * 
                      from tphotos 
                     where category = "'.$category.'" 
                       and flg_mark = "'.$flgmark.'" 
                  order by subcategory';

    $result = selectData($query_str);

    if($flgmark == 'cover'){
        foreach ($result as $key => $value) {
            $file_subpage       = '?page='.$value['category'].'&subpage='.($i+1).'';
            $file_path_backend  = '../img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
            // $file_path_thumb    = './app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/thumb_'.$value['filename'];
            $file_path_original    = './app/img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];

            $img[$i]['data']    = $file_path_original;
            // $img[$i]['data']    = $file_path_thumb;
            $img[$i]['src']     = $file_subpage;
            $actual_size        = getimagesize($file_path_backend);
            $img_width          = $actual_size[0];
            $img_height         = $actual_size[1];
            $img[$i]['ratio']   = $img_width/$img_height;
            $i = $i+1;
        }
        return json_encode($img);

    } else {
        echo '<div class="demo">
        <ul id = "imageGallery">';

        foreach ($result as $key => $value) {
            echo $str = '<img src="app/img/WEB/HOME/'.$value['filename'].'" />';
        }
        echo '</ul></div>';
    }
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