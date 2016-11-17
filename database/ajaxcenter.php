<?php
include('function.php');
include('conn_db.php');

$case_name = $_POST['case'];

switch ($case_name) {
  case 'deletePhoto' :

  	$filepath = $_POST['filepath'];
  	$category = $_POST['category'];
  	$filename = $_POST['filename'];

    checktodelete($filepath,$category,$filename);
    break;

  case 'GenImage' :
    $category    = $_POST['p_category'];
    $subcategory = $_POST['p_subcategory'];

    echo genImageBlock($category, $subcategory);
    break;

  case 'GenCoverImage' :
    $category    = $_POST['p_category'];
    $flgmark     = $_POST['p_flgmark'];

    echo genCoverImageBlock($category, $flgmark);
    break;
  
  default:
    # code...
    break;
}
?>