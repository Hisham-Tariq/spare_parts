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
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql= mysqli_query($db,"SELECT * from expanses");	
	$rows[] = array();
	     if(mysqli_num_rows($sql) > 0){	
		while($row = $sql->fetch_assoc()) {
			 if($row)
			 $rows[] = $row;
		}
        echo json_encode(array_slice($rows,1));		
	}
	else{
		 echo "no record found";
	}
?>