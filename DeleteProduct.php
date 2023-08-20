
// require_once 'config.php'; // Include the configuration file

// // Create connection
// $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// // Check connection
// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sku'])) {
// $sku = $_POST['sku'];

// // Perform DELETE query to remove product from the database
// $delete_query = "DELETE FROM products WHERE sku = '$sku'";

// if ($conn->query($delete_query) === TRUE) {
// echo "Product deleted successfully";
// } else {
// echo "Error deleting product: " . $conn->error;
// }
// }

// // Close the database connection
// $conn->close();


<?php
require_once 'config.php'; // Include the configuration file

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['skus'])) {
  // Decode the JSON array of skus
  $skus = json_decode($_POST['skus']);

  // Prepare the SQL statement
  $stmt = $conn->prepare('DELETE FROM products WHERE sku = ?');

  // Bind the parameter
  $stmt->bind_param('s', $sku);

  // Loop through the skus and execute the statement for each one
  foreach ($skus as $sku) {
    $stmt->execute();
  }

  // Close the statement
  $stmt->close();

  echo 'Products deleted successfully';
}

// Close the database connection
$conn->close();
?>

