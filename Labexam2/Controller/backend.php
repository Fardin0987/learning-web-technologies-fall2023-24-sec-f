<?php
// Establish database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "product_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling AJAX requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Example: Handling a request to fetch products
    if ($_POST["action"] == "getProducts") {
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        $products = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        echo json_encode($products);
    }

    // Example: Handling a request to add a new product
    if ($_POST["action"] == "addProduct") {
        $productName = $_POST["productName"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        $sql = "INSERT INTO products (productName, description, price) VALUES ('$productName', '$description', '$price')";
        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Add more handling for other actions (update, delete, etc.)
}

$conn->close();
?>
