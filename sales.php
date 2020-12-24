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
$Product_id = "";

//getting the length of items bought
// $itemsLength = $data["itemsLength"];
// Getting al the bought Items in a variable
$items = [];
if(isset($_POST["items"])) $items = $_POST["items"];
else $items = $data["items"];

if (count($items) > 0){
	
// ating the quantity in the database
	foreach($items as $item){
		// Storing the Product id of each item one by one
		$Product_id = $item["Product_id"];
		// Accesing the Product from the database
		$sql= mysqli_query($db,"SELECT * from product where id = '$Product_id'");	
		$rows[] = array(); //Variable to store the data recived from the database
		if(mysqli_num_rows($sql) > 0){	
			while($row = $sql->fetch_assoc()) {
				if($row) $rows[] = $row;
			}
		}

		$qty = json_encode($rows[1]["Product_Quantity"]);
		$database_product_qty = json_decode($qty);

		$Product_Quantity = $item["qty"];
		
		$Product_Quantity = $database_product_qty - $Product_Quantity;	
		
		$sql =  mysqli_query($db,"UPDATE product SET Product_Quantity = '$Product_Quantity' where id = '$Product_id'");
		
	}
	// Finish updating the quantity.


	$Customer_Name = "";
	$Customer_Address = "";
	$Customer_Phone = "";
	$Customer_CNIC = "";
	if(isset($_POST["customerName"])){
		$Customer_Name = $_POST["customerName"];
		$Customer_Address = $_POST["Customer_Address"];
		$Customer_Phone = $_POST["Customer_Phone"];
		$Customer_CNIC = $_POST["Customer_CNIC"];
	}
	else{
		$Customer_Name = $data["customerName"];
		$Customer_Address = $data["Customer_Address"];
		$Customer_Phone = $data["Customer_Phone"];
		$Customer_CNIC = $data["Customer_CNIC"];
	}
	$sql = mysqli_query($db,"INSERT INTO customer (
	Customer_Name, 
	Customer_Address,
	Customer_Phone,
	Customer_CNIC)
	VALUES (
	'$Customer_Name',
	'$Customer_Address', 
	'$Customer_Phone',
	'$Customer_CNIC')");
	
	$sql = mysqli_query($db,"SELECT MAX(Customer_id) as 'Customer_id' FROM customer");
	$rows2[] = array();
			if(mysqli_num_rows($sql) > 0){	
		while($row2 = $sql->fetch_assoc()) {
				if($row2)
				$rows2[] = $row2;
		}
	}	
	$rows2 = array_slice($rows2,1);
	$c_id =  json_encode($rows2[0]["Customer_id"]);
	$c_id = json_decode($c_id);	
	// echo $c_id;
	if(isset($_POST["total"])){
		$Sales_Total_Price = $_POST["total"];
	}
	else {
		$Sales_Total_Price = $data["total"];
	}    	

	$sql = mysqli_query($db,"INSERT INTO sales (
	Customer_id, 
	Sales_Total_Price)
	VALUES (
	'$c_id', 
	'$Sales_Total_Price')");

	$sql = mysqli_query($db,"SELECT MAX(Sales_id) as 'Sales_id' FROM sales");
	$rows3[] = array();
			if(mysqli_num_rows($sql) > 0){	
		while($row3 = $sql->fetch_assoc()) {
				if($row3)
				$rows3[] = $row3;
		}
	}

	$rows3 = array_slice($rows3,1);
	$s_id =  json_encode($rows3[0]["Sales_id"]);
	$s_id = json_decode($s_id);	

	foreach ($items as $item){
		$Product_id = $item["Product_id"];
		$salesquantity = $item["qty"];
		$sql = mysqli_query($db,"INSERT INTO sale_products (
			Sales_id, 
			Product_id,
			Sales_qty)
			VALUES (
			'$s_id', 
			'$Product_id',
			'$salesquantity')"
			);
		
	}

	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		echo "Record Updated". $Customer_Name;
	}
}


?>