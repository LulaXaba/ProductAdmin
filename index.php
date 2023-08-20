
<?php
include_once 'config.php'; // Include the configuration file

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform SELECT query to retrieve product data
$sql = "SELECT sku, description ,name, price, image_path FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sifund'shile-Lula-Xaba </title>
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
												<li class="nav-item active">
                          <a class="nav-link btn btn-outline-success" href="AddProduct.php">ADD</a>
                        </li>
												<li class="nav-item">
                          <button class="nav-link btn btn-outline-danger" id="mass-delete-btn">MASS DELETE</button>
                        </li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

    <!-- Start Menu -->

	  <footer class="footer-area bg-10">
       <div class="copyrigh">
           <div class="container">
	           <div class="row">
		   
		       </div>
            </div>
        </div>

    </footer>
	





	
<!-- Display Product Cards -->
<div class="row">
<div class="col md-4" style="margin-bottom: 4rem;">
<!--product list-->


<div class="row" style="margin-bottom: 4rem; margin-top: 3rem;">

<div class="col-lg-3 md-10">
<div class="card">
<input class="form-check-input" type="checkbox" value="" id=".delete-checkbox">
<img src="images/SleeperCouch_Velvet_Alf_DarkGrey-0075.jpg" class="card-img-top" alt="...">
<div class="card-body">
<h3>Product</h3>
<p class="card-text">Some quick example card's content.</p>
<h4>$400</h4>
</div>
</div>
</div>

<?php
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '
<div class="col-lg-3 md-10">     
<div class="card">
<input class="form-check-input delete-checkbox" type="checkbox" value="' . $row['sku'] . '">
<img src="' . $row['image_path'] . '" class="card-img-top" alt="Product Image">
<div class="card-body">
<h3>' . $row['name'] . '</h3>
<p class="card-text">' . $row['description'] . '</p>
<h4>$' . $row['price'] . '</h4>
</div>
</div>
</div>';
}
} else {
echo "No products found.";
}
?>
    </div>
			</div>
		</div>
	</div>
	
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
  
    <!-- script.js-->
		<script src="script.js"></script>
    <!--boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<!-- //#d65106 -->