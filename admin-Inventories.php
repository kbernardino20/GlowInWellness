<?php 
    session_start();
    include("admin_session.php");


?>


<!doctype html>
<html lang="en">
  <head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6858343273703359"
     crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Glow in Wellness - Admin Dashboard</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
	<!-- Style CSS (White)-->
	<link rel="stylesheet" href="assets/css/White.css">
	<!-- Style CSS (Dark)-->
	<link rel="stylesheet" href="assets/css/Dark.css">
	<!-- FontAwesome CSS-->
	<link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
	<!-- Icon LineAwesome CSS-->
	<link rel="stylesheet" href="assets/vendors/lineawesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/leadmark.css">
<link rel="stylesheet" href="CSS/topbar-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
	<style>
		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.left-items {
			display: flex;
			align-items: center;
		}
		.date-display {
			margin-right: 20px;
			color: #ffffff; /* Adjust color as needed */
		}
		.date-label {
			margin-right: 5px;
		}

        .sectitle {
            font-family: 'Sacramento', cursive;
            color: #7E007D;

        }
		
	</style>
</head>
<body>
  

<!--Topbar -->
<?php include("admin-topbar.php");?>

		<!--Sidebar-->
		<?php include("admin-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
			
                <h6 class="mb-0 text-center" style="font-size: 50px; font-family: 'Sacramento', cursive; color: #7E007F;">Product Inventories</h6> <br>
				<div class="row">

				<?php
include("db_connect.php");

$query = "SELECT * FROM tbl_products ORDER BY item_category";
$result = $db_connection->query($query);

$currentCategory = ""; // Initialize current category

while ($row = $result->fetch_assoc()) {
    // Check if the category has changed
    if ($currentCategory != $row['item_category']) {
        // Close the previous container if it's not the first category
        if ($currentCategory != "") {
            echo "</div></div>"; // Close row and container
        }

        // Update the current category
        $currentCategory = $row['item_category'];

        // Display the category header
        echo "<div class='container'>
                <h6 class='mb-0 text-center' style='font-size: 20px; cursive; color: #7E007F;'>" . $currentCategory . "</h6> <br>
                <div class='row justify-content-center'>";
    }

    // Display the product card
    echo "<div class='col-12 col-md-6 col-lg-8 mb-3'>
            <div class='card'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-4 d-flex align-items-center'>
                            <img src='Photos/Products/" . $row['item_img'] . "' alt='' class='img-fluid' style='max-width: 100px; max-height: 100px;'>
                        </div>
                        <div class='col-8'>
                            <h5 class='product-name'>" . $row['product_name'] . "</h5>
                            <p class='small'>Remaining stocks: " . $row['stock'] . " pcs</p>
                            <form method='POST' action='user-add_to_cart.php'>
                                <input type='hidden' name='product_name_hidden' value='" . $row['product_name'] . "'>
                                <input type='hidden' name='stock_hidden' value='" . $row['stock'] . "'>
                                <a href='admin-Inventories_Add.php?selectedproducts=" . urlencode($row['product_name']) . "&prodQty=" . urlencode($row['stock']) . "' class='btn btn-primary btn-lg rounded w-100 mt-2'>Update stocks</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}

// Close the final container
if ($currentCategory != "") {
    echo "</div></div>";
}
?>






				</div>

		</div>		
		
	</div>

	<!-- Footer -->
	<div class="footer transition">
		<hr>
		<p class="mb-0 small text-center">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved </p> 
	</div>

	<!-- Loader -->
	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div class="loader-overlay"></div>

	<!-- Library Javascipt-->
	<script src="assets/vendors/bootstrap/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/js/script.js"></script>
 </body>
</html>

<script>
// JavaScript to insert the current date
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var dateString = today.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('current-date').textContent = dateString;
});

function confirmDelete(product_name) {
    if (confirm("Are you sure you want to delete this item?")) {
        window.location.href = 'admin-DeleteProducts.php?selectedproducts=' + product_name;
    }
}
</script>
