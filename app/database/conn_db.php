<?php

define("db_name","photography");
define("host_name","localhost");
define("user_name","admin");
define("password","admin");

$con = mysqli_connect(host_name,user_name,password,db_name);
if(!$con) {
  echo '<h1>Database is not connected</h1>';
  exit;
}
 mysqli_set_charset($con,"utf8");
?>