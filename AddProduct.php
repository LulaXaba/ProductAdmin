<?php
require_once 'config.php'; // Include the configuration file

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['discription'];

    // Handle image upload (you can implement this part)
    // Define $target_path here
    $target_path = 'images/' . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        // Image successfully uploaded and moved to the images directory

        // Perform INSERT query to add product data to the database
        $sql = "INSERT INTO products (sku, name, price, description, image_path) VALUES ('$sku', '$name', '$price', '$description', '$target_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scandiweb-Sifund'shile-Xaba </title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font link link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css link-->
    <link rel="stylesheet" href="style.css">
     <!-- Site Icons -->
     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
     
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<!-- Start header -->

<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <a class="navbar-brand" href="#">Product List</a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="javascript:void(0);" onclick="submitForm()">SAVE</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">CANCEL</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->

<!-- ... (rest of your HTML code) ... -->

<script>
function submitForm() {
    // Trigger the form submission
    document.getElementById("product_form").submit();
}
</script>



    <footer class="footer-area bg-10">

        <div class="copyrigh">
           <div class="container">
              <div class="row">
                   
                </div>
           </div>
        </div>

    </footer>

    <footer class="footer-area bg-10">

    <div class="copyrigh">
       <div class="container">
            <div class="row">
               
            </div>
        </div>
    </div>

</footer>
<!--Main-->
    <main>
    
    <form id="product_form" action="AddProduct.php" method="post" enctype="multipart/form-data">

            <div class="col-sm-8">
                <div class="mb-3 row">
                    <label for="image" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="image" id="image" accept="image/*" onchange="displayImage()">
                    </div>
                </div>
            <div class="mb-3 row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <img id="preview-image" src="#" alt="Chosen Image" style="max-width: 100%; max-height: 200px; display: none;">
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="mb-3 row">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="sku" id="sku" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3 row">
                    <label for="discription" class="col-sm-2 col-form-label">Discription</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="discription" id="discription" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="mb-3 row">
                    <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="productType" id="productType" required>
                            <option value="" selected disabled>Type Switcher</option>
                            <option value="dvd">DVD</option>
                            <option value="book">Book</option>
                            <option value="furniture">Furniture</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-8" id="attributes"></div>
        </form>
    </main>
<!--Main-->




    <!-- Start Footer -->

    <footer class="footer-area bg-f">

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="LUCID"> <a href="#">Scandiweb</a> 
					<a href="https://html.design/"> Test Assesment</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	
	<!-- End Footer -->
  
    <!-- script.js -->
    <script src="script.js"></script>
    <!--boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>
