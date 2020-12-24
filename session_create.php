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
$db = mysqli_connect($servername,$username,$password,$dbname);
$data = json_decode(file_get_contents('php://input'), true);

$email = "";
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($data["email"])) {
	$email = $_POST["email"] = $data["email"];
} else {
	$email = $_POST["email"];
}

if (isset($email)) {
	$sql = "INSERT INTO session (email, status) VALUES ( '$email', '1')";
	if ($db->query($sql) == TRUE) {
		echo "New Session created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}
}
