<?php
// Database connection parameters
$servername = 'localhost';
$dbName = 'hardware';
$username = 'root';
$password = '';

// Establish a connection to the MySQL database
$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve form data
    $productId = isset($_POST['productid']) ? $_POST['productid'] : '';
    $productName = isset($_POST['productname']) ? $_POST['productname'] : '';
    $productPrice = isset($_POST['productprice']) ? $_POST['productprice'] : '';
    $productDescription = isset($_POST['productdescription']) ? $_POST['productdescription'] : '';

    // Update the product in the database
    $sql = "UPDATE products SET p_name = :productName, p_price = :productPrice, p_desc = :productDescription WHERE p_id = :productId";
    $stmt = $conn->prepare($sql);

    // Bind the values to the parameters
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':productName', $productName);
    $stmt->bindParam(':productPrice', $productPrice);
    $stmt->bindParam(':productDescription', $productDescription);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product updated successfully!";
        // Redirect to a different page after updating
        header("Location: seller_product.php");
        exit;
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

// Check if the product ID is provided
if (isset($_GET['id'])) {
    // Retrieve the product from the database based on the provided ID
    $productId = $_GET['id'];
    $sql = "SELECT * FROM products WHERE p_id = :productId";
    $stmt = $conn->prepare($sql);

    // Bind the value to the parameter
    $stmt->bindParam(':productId', $productId);

    // Execute the statement
    if ($stmt->execute()) {
        // Fetch the product as an associative array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
        exit;
    }
} else {
    // Redirect to a different page if the product ID is not provided
    header("Location: seller_product.php");
    exit;
}

// Close the database connection
$conn = null;
?>