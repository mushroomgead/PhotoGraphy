<?php
include('function.php');
include('conn_db.php');

$case_name = $_POST['case'];

switch ($case_name) {
  case 'deletePhoto':

  	$filepath = $_POST['filepath'];
  	$category = $_POST['category'];
  	$filename = $_POST['filename'];

    checktodelete($filepath,$category,$filename);
    break;
  
  default:
    # code...
    break;
}
?>