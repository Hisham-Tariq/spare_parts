<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronics_store";

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
	header('Access-Control-Allow-Headers: token, Content-Type');
	header('Access-Control-Max-Age: 1728000');
	header('Content-Length: 0');
	header('Content-Type: text/plain');
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = mysqli_query($db, "SELECT * FROM session ORDER BY id DESC LIMIT 1");
$rows[] = array();
if (mysqli_num_rows($sql) > 0) {
	// output data of each row
	while ($row = $sql->fetch_assoc()) {
		if ($row)
			$rows[] = $row;
	}

	$id = array_slice($rows, 1)[0]["id"];
	$query = "UPDATE session SET status = '0' WHERE id = '$id'";
	if ($db->query($query) == TRUE){
		echo "Successfuly Logged Out";
	}
	else{
		echo "Errors";
	}
} else {
	echo "no record found";
}