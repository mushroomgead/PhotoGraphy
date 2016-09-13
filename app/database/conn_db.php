<?php
define("db_name", "photography");
define("host_name", "localhost");
define("user_name", "admin");
define("password", "admin");

$conn = mysqli_connect(host_name, user_name, password, db_name);
if (!$conn) {
    echo '<h1>Database is not connected</h1>';
    exit;
}
mysqli_set_charset($conn, "utf8");
