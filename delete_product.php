<?php
// Database connection parameters
$servername = 'localhost';
$dbName = 'hardware';
$username = 'root';
$password = '';

// Establish a connection to the MySQL database
$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Check if the delete parameter is set
    $productId = $_POST['delete'];

    // Prepare the SQL statement to delete data from the "products" table
    $sql = "DELETE FROM products WHERE p_id = :productId";
    $stmt = $conn->prepare($sql);

    // Bind the product ID to the parameter
    $stmt->bindParam(':productId', $productId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product deleted successfully!";
		// Redirect to a different page or display a success message
        header("Location: seller_product.php");
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

// Close the database connection
$conn = null;
?>
