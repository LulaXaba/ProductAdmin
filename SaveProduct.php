<?php
include_once 'config.php'; // Include the configuration file

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $description = $_POST['description']; // New line to handle the description field

    // Process image upload if needed (you can implement this part)

    // Perform INSERT query to add product data to the database
    $sql = "INSERT INTO products (name, price, description) VALUES ('$productName', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
