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


    $Expanse_Desc = "";
	$Expanse_Amount = 0;
	if (isset($data["description"])) {
		$Expanse_Desc = $_POST["description"] = $data["description"];
		$Expanse_Amount = $_POST["amount"] = $data["amount"];
		
	}
	else {
		$Expanse_Desc = $_POST["description"];
		$Expanse_Amount = $_POST["amount"]; 
		
	}

	
	$sql = "INSERT INTO expanses (Expanse_Desc, Expanse_Amount)
	VALUES ( '$Expanse_Desc', '$Expanse_Amount')";

	if ($db->query($sql) == TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}


$db->close();
?>
