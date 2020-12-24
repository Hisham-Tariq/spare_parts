<?php
 
$servername = "localhost";
$username = "root";
$password = "Usman11@lushlife";
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
	$Product_Name ="";
	$Category_Name ="";
	$Product_Brand = "";
	$Product_Model = "";
	$Product_Code = "";
	$Product_Quantity = "";
	$Product_Size = "";
	$Product_Color = "";
	$Product_PurchasePrice = "";
	$Product_Retail_Price = "";
	$Product_Discounted_Price = "";
	$Product_Status = "";
	$Product_Purchase_Date = "";

$allowedExts = array("gif", "jpeg", "jpg", "png");
if(isset($_FILES["fileToUpload"]["name"]))
{$temp = explode(".", $_FILES["fileToUpload"]["name"]);}
else {
	$temp =explode(".", $data["fileToUpload"]);
}
$extension = end($temp);

//echo $extension;

$target_dir = "uploads/";
if(isset($_FILES["fileToUpload"]["name"])){
	$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
}
else{
	$target_file = $target_dir . basename($data["fileToUpload"]);
}
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filelocation = "";

//if (isset(($_FILES["fileToUpload"]["type"])) 
	// code...

if ((($_FILES["fileToUpload"]["type"] == "image/gif")
    || ($_FILES["fileToUpload"]["type"] == "image/jpeg")
    || ($_FILES["fileToUpload"]["type"] == "image/jpg")
    || ($_FILES["fileToUpload"]["type"] == "image/pjpeg")
    || ($_FILES["fileToUpload"]["type"] == "image/x-png")
    || ($_FILES["fileToUpload"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
      	if ($_FILES["fileToUpload"]["error"] > 0) {
        	echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
      } 

else {

	if(isset($_FILES["fileToUpload"]["name"])) {
  		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  		if($check !== false) {
    		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $_FILES["fileToUpload"]["name"]);
		    $filelocation = "localhost/myaps/uploads/".$_FILES["fileToUpload"]["name"];
			  $size = (($_FILES["fileToUpload"]["size"])/1024).' kB';
		}
	}
}
}
else{
	if ($extension == "jpeg" || $extension == "jpg" || $extension == "png") {
		# code...
		move_uploaded_file($data["fileToUpload"], $target_dir . $data["fileToUpload"]);
    	$filelocation = "localhost/myaps/uploads/".$data["fileToUpload"];
	}
}


	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (isset($data["Product_Name"])) {
$Product_Name= $_POST["Product_Name"]= $data["Product_Name"];
$Category_Name  = $_POST["Category_Name"]= $data["Category_Name"];
$Product_Brand = $_POST["Product_Brand"]= $data["Product_Brand"];
$Product_Model = $_POST["Product_Model"]= $data["Product_Model"];
$Product_Code = $_POST["Product_Code"]= $data["Product_Code"];
$Product_Quantity = $_POST["Product_Quantity"]=	$data["Product_Quantity"];
$Product_Size  = $_POST["Product_Size"]= $data["Product_Size"];
$Product_Color = $_POST["Product_Color"]= $data["Product_Color"];
$Product_PurchasePrice=$_POST["Product_PurchasePrice"]=$data["Product_PurchasePrice"];
$Product_Retail_Price= $_POST["Product_Retail_Price"]=$data["Product_Retail_Price"];
$Product_Discounted_Price =$_POST["Product_Discounted_Price"]= $data["Product_Discounted_Price"];
$Product_Status = $_POST["Product_Status"]= $data["Product_Status"];
$Product_Purchase_Date=$_POST["Product_Purchase_Date"]= $data["Product_Purchase_Date"];
	

	}
	else {
$Product_Name = $_POST["Product_Name"];
$Category_Name  = $_POST["Category_Name"];
$Product_Brand = $_POST["Product_Brand"];
$Product_Model = $_POST["Product_Model"];
$Product_Code = $_POST["Product_Code"];
$Product_Quantity = $_POST["Product_Quantity"];
$Product_Size  = $_POST["Product_Size"];
$Product_Color = $_POST["Product_Color"];
$Product_PurchasePrice=$_POST["Product_PurchasePrice"];
$Product_Retail_Price= $_POST["Product_Retail_Price"];
$Product_Discounted_Price =$_POST["Product_Discounted_Price"];
$Product_Status = $_POST["Product_Status"];
$Product_Purchase_Date=$_POST["Product_Purchase_Date"];	
	}

	// echo $data;
	// echo $_FILES;
	
	$sql = "INSERT INTO product (
	Product_Name, 
	Category_Name,
	Product_Brand,
	Product_Model,
	Product_Code,
	Product_Quantity,
	Product_Size,
	Product_Color,
	Product_PurchasePrice,
	Product_Retail_Price,
	Product_Status,
	Product_Discounted_Price,
	filelocation)
	VALUES (
	'$Product_Name',
	'$Category_Name', 
	'$Product_Brand',
	'$Product_Model',
	'$Product_Code',
	'$Product_Quantity',
	'$Product_Size',
	'$Product_Color',
	'$Product_PurchasePrice',
	'$Product_Retail_Price',
	'$Product_Status',
	'$Product_Discounted_Price',
	'$filelocation')";
	if ($db->query($sql) == TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}


$db->close();
?>
