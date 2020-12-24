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
    $items = $data["items"];

    foreach ($items as $item) {
        $id = "";
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
        
        if (isset($item["Product_Name"])) {
            $id = $_POST["id"]= $item["id"];
            $Product_Name= $_POST["Product_Name"]= $item["Product_Name"];
            $Category_Name  = $_POST["Category_Name"]= $item["Category_Name"];
            $Product_Brand = $_POST["Product_Brand"]= $item["Product_Brand"];
            $Product_Model = $_POST["Product_Model"]= $item["Product_Model"];
            $Product_Code = $_POST["Product_Code"]= $item["Product_Code"];
            $Product_Quantity = $_POST["Product_Quantity"]=	$item["Product_Quantity"];
            $Product_Size  = $_POST["Product_Size"]= $item["Product_Size"];
            $Product_Color = $_POST["Product_Color"]= $item["Product_Color"];
            $Product_PurchasePrice=$_POST["Product_PurchasePrice"]=$item["Product_PurchasePrice"];
            $Product_Retail_Price= $_POST["Product_Retail_Price"]=$item["Product_Retail_Price"];
            $Product_Discounted_Price =$_POST["Product_Discounted_Price"]= $item["Product_Discounted_Price"];
            $Product_Status = $_POST["Product_Status"]= $item["Product_Status"];
            $Product_Purchase_Date=$_POST["Product_Purchase_Date"]= $item["Product_Purchase_Date"];
        }
        else {
            $id = $_POST["id"];
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

        $sql = "UPDATE product SET 
        Product_Name = '$Product_Name', 
        Category_Name = '$Category_Name',
        Product_Brand = '$Product_Brand',
        Product_Model = '$Product_Model',
        Product_Code = '$Product_Code',
        Product_Quantity = '$Product_Quantity',
        Product_Size = '$Product_Size',
        Product_Color = '$Product_Color',
        Product_PurchasePrice = '$Product_PurchasePrice',
        Product_Retail_Price = '$Product_Retail_Price',
        Product_Status = '$Product_Status',
        Product_Discounted_Price = '$Product_Discounted_Price'
        WHERE id = '$id'";
        if ($db->query($sql) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	

$db->close();
?>
