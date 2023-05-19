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
  $category = isset($_POST['category']) ? $_POST['category'] : '';
  $productId = isset($_POST['productid']) ? $_POST['productid'] : '';
  $productName = isset($_POST['productname']) ? $_POST['productname'] : '';
  $productPrice = isset($_POST['productprice']) ? $_POST['productprice'] : '';
  $productDescription = isset($_POST['productdescription']) ? $_POST['productdescription'] : '';
  $productImage = isset($_FILES['productimage']['name']) ? $_FILES['productimage']['name'] : '';

  // Upload the product image to a desired directory (adjust the path accordingly)
  $targetDirectory = 'images/';
  $targetFile = $targetDirectory . basename($_FILES['productimage']['name']);
  if (move_uploaded_file($_FILES['productimage']['tmp_name'], $targetFile)) {
    echo 'Image uploaded successfully.';

    // Insert the product into the database
    $sql = "INSERT INTO products (category, p_id, p_name, p_price, p_desc, p_image)
            VALUES (:category, :productId, :productName, :productPrice, :productDescription, :productImage)";
    $stmt = $conn->prepare($sql);

    // Bind the values to the parameters
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':productName', $productName);
    $stmt->bindParam(':productPrice', $productPrice);
    $stmt->bindParam(':productDescription', $productDescription);
    $stmt->bindParam(':productImage', $productImage);

    // Execute the statement
    if ($stmt->execute()) {
      echo "Product added successfully!";
      // Redirect to a different page to avoid duplicate submissions
      header("Location: seller_product.php");
      exit;
    } else {
      echo "Error: " . $stmt->errorInfo()[2];
    }
  } else {
    echo 'Error uploading image.';
  }
}

// Fetch all rows from the result set as an associative array
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);

// Execute the statement
if ($stmt->execute()) {
  $lastInsertId = $conn->lastInsertId();
  if ($lastInsertId) {
    echo "Product added successfully with ID: " . $lastInsertId;
  } else {
    echo "Product added successfully, but retrieving the ID failed.";
  }

  // Fetch all rows from the result set as an associative array
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	// Close the database connection
	$conn = null;
}