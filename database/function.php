<?php
/** Used for generate Photo from Database **/
function genImageBlock($category, $subcategory){
    $hidden_value   = '';
    $str            = '';
    $check          = '';
    $str_delete     = '';
    $flg_admin      = '';
    $i              = 0;
    $img            = array();
    $query_str      =  'select *
                        from tphotos
                        where category = "'.$category.'"'.(isset($subcategory) ? 'and subcategory = "'.$subcategory.'"' : '');
    $result         = selectData($query_str);

    if (isset($_SESSION['UserData']['username'])) {
        $flg_admin  = 'Y';
        $str_delete = ' <div class="section-info">
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
        $file_path          = 'img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
        $file_path_backend  = '../img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
        $file_path_thumb    = 'img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/thumb_'.$value['filename'];

        // if (isset($_SESSION['UserData']['username'])) {
        //     $hidden_value   = ' <input type="hidden" name="filepath" id="filepath" value="'.$file_path.'">
        //                         <input type="hidden" name="category" id="category" value="'.strtoupper($value['category']).'">
        //                         <input type="hidden" name="filename" id="filename" value="'.$value['filename'].'">';
        // }

        $img[$i]['src']     = $file_path;
        // $img[$i]['data']['file_thumb']    = $file_path_thumb;
        $img[$i]['data']['file_thumb']  = $file_path;
        $img[$i]['data']['admin_mode']  = $flg_admin;
        $img[$i]['data']['delete']      = $hidden_value;
        $img[$i]['data']['caption']     = $value['caption'];
        $img[$i]['data']['filename']    = $value['filename'];
        $img[$i]['data']['file_path_backend']    = $file_path_backend;
        $img[$i]['data']['category']    = strtoupper($value['category']);

        $actual_size                    = getimagesize($file_path_backend);
        $img_width                      = $actual_size[0];
        $img_height                     = $actual_size[1];
        $img[$i]['ratio']              = $img_width/$img_height;
        $i = $i+1;
    }

    // print_r($img);
    // print(json_encode($img));
    // die();
    return json_encode($img);
}

/** Used for generate Slider Photo from Database **/
function GenCoverPhoto($category,$flgmark){ 
    $i          = 0;
    $query_str  = ' select * 
                      from tphotos 
                     where flg_mark = "'.$flgmark.'" 
                  order by subcategory';
    $result = selectData($query_str);

    if($flgmark == 'cover'){
        echo ' <div id="block-photo"> ';

        foreach ($result as $key => $value) {
            $i = $i+1;
            echo $str = ' <a class="img-entry-vert  sub-img-folder" href="?page='.$category.'&subpage='.$i.'">
                        <img src="img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'].'" /></a>';
        }
        echo '</div>';

    } else {
        echo   '<ul class="rslides" id="imageGallery">';

        foreach ($result as $key => $value) {
             
            echo $str = ' <li><a href="#"><img src="img/WEB/HOME/'.$value['filename'].'" alt=""></a></li>';
        }
        echo '</ul>';
    }
}

/** Used for generate Cover Photo from Database **/
function genCoverImageBlock($category,$flgmark){ 
    $i = 0;
    $flg_admin = '';
    $query_str =   'select * 
                      from tphotos 
                     where category = "'.$category.'" 
                       and flg_mark = "'.$flgmark.'" 
                  order by subcategory';
    $result = selectData($query_str);

    if(isset($_SESSION['UserData']['username'])){
        $flg_admin = 'Y';
    }

    if($flgmark == 'cover'){
        foreach ($result as $key => $value) {
            $file_subpage       = '?page='.$value['category'].'&subpage='.($i+1).'';
            $file_path_backend  = '../img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];
            $file_path_thumb    = 'img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/thumb_'.$value['filename'];
            $file_path_original = 'img/WEB/'.strtoupper($value['category']).'/'.$value['subcategory'].'/'.$value['filename'];

            // $img[$i]['data']    = $file_path_original;
            // // $img[$i]['data']    = $file_path_thumb;
            // $img[$i]['src']     = $file_subpage;
            // $actual_size        = getimagesize($file_path_backend);

            // $img_width          = $actual_size[0];
            // $img_height         = $actual_size[1];

            // $img[$i]['ratio']   = $img_width/$img_height;
            // $img[$i]['caption'] = $value['caption'];


            $img[$i]['src']     = $file_subpage;
            // $img[$i]['data']['file_thumb']    = $file_path_thumb;
            $img[$i]['data']['file_thumb']  = $file_path_original;
            $img[$i]['data']['admin_mode']  = $flg_admin;
            $img[$i]['data']['caption']     = $value['caption'];

            $actual_size                    = getimagesize($file_path_backend);
            $img_width                      = $actual_size[0];
            $img_height                     = $actual_size[1];
            $img[$i]['ratio']              = $img_width/$img_height;

            $i = $i+1;
        }
        return json_encode($img);

    } else {
        echo   '<ul class="rslides" id="imageGallery">';

        foreach ($result as $key => $value) {
             
            echo $str = '
            <a href="#">
            <li><img src="app/img/WEB/HOME/'.$value['filename'].'" alt="">
            </li></a>';
        }
        echo '</ul>';
    }
}

/** Used for Delete Photo from Database **/
function checktodelete($filepath,$category,$filename,$file_path_backend){
    if (file_exists($file_path_backend)) {
        unlink($file_path_backend);

        $query = "DELETE FROM tphotos
        WHERE category = '".$category."'
        AND filename = '".$filename."'";

        queryData($query);
        
        echo 'file has been deleted.';

    } else {
        echo 'file does not exists.';
    }
}

/** **/
function changeFlg($category,$filename,$flg){
    $flg == 'slider' ? $field_flg = 'flg_slider' : $field_flg = 'flg_cover';
    $query = 'update tphotos set "'.$field_flg.'" =  "'.$flg.'" where category = "'.$category.'" and filename = "'.$filename.'" ';

    queryData($query);
    echo 'updated flg!';
}

?>