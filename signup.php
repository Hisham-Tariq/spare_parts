 <?php

	$servername = "localhost";
	$username = "root";
	$password = "Usman11@lushlife";
	$dbname = "electronics_store";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);


	$name = $_POST["name"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$id = $_POST["id"];
	$role = $_POST["role"];

	$sql = "INSERT INTO users (name, email, pwd,role)
	VALUES ('$name', '$email', '$pwd','$role')";

	if ($conn->query($sql) == TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


	$conn->close();
	?> 
