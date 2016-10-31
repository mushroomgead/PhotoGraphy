<?php
$servername = "localhost";
$username 	= "photography";
$password 	= "1234";
$dbname 	= "photography";

if ((!isset($_SESSION)) ? session_start() : '');
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo '<h1>Database is not connected</h1>';
    exit;
}
mysqli_set_charset($conn, "utf8");

function queryData($query){
global $conn;
	if(mysqli_query($conn, $query)){
		echo 'had been updated.';
	}else{
		echo 'connot insert to database';
	}
}

function selectData($query){
global $conn;
$result = mysqli_query($conn, $query);
$rownum = mysqli_num_rows($result);
	if($rownum >0){
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}
}
// mysqli_close($conn);