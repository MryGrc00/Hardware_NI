<?php
// Database connection
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "hardware"; // Replace with your database name

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the product details based on the provided productId
    $productId = $_POST['product_id'];

    $sql = "SELECT * FROM products WHERE p_id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productId', $productId);
    $stmt->execute();

    // Fetch the product details as an associative array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Prepare the response
    $response = array();
    if ($product) {
        $response['success'] = true;
        $response['product'] = $product;
    } else {
        $response['success'] = false;
        $response['error'] = "Product not found";
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    // Handle any database errors
    $response['success'] = false;
    $response['error'] = $e->getMessage();

    header('Content-Type: application/json');
    echo json_encode($response);
}
