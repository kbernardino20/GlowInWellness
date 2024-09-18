<?php 
    session_start();
	include("user_session.php");

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
<link rel="stylesheet" href="CSS/topbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            font-family: 'Satisfy', cursive;
            color: #7E007D;

        }

		
		
	</style>
</head>
<body>
  

<!--Topbar -->
<?php include("user-topbar.php");?>

		<!--Sidebar-->
		<?php include("user-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
			
                <h6 class="mb-0 text-center" style="font-size: 50px; font-family: 'Satisfy', cursive; color: #7E007F;">Products</h6> <br>
				<div class="row">

				<?php
include("db_connect.php");

$query = "SELECT * FROM tbl_products";
$result = $db_connection->query($query);

while ($row = $result->fetch_assoc()) {
	if ($row['stock'] > 0) {  // Only proceed if stock is greater than 0
		echo "<div class='col-12 col-md-6 col-lg-6 mb-3'>
		<div class='card'>
			<div class='card-body'>
				<div class='row'>
					<div class='col-4 d-flex align-items-center'>
						<img src='Photos/Products/".$row['item_img']."' alt='' class='img-fluid' style='max-width: 100%; height: auto;'>
					</div>
					<div class='col-8'>
						<h5>".$row['product_name']."</h5>
						<p>A$".$row['price']."</p>
						<p>Remaining stocks: ".$row['stock']."</p>
						<form method='POST' action='user-add_to_cart.php'>
							<input type='hidden' name='product_name_hidden' value='".$row['product_name']."'>
							<input type='hidden' name='price_hidden' value='".$row['price']."'>
							<a href='user-add_to_cart.php?selectedproducts=" . urlencode($row['product_name']) . "&selectedprice=" . urlencode($row['price']) . "' 
								class='btn btn-primary btn-lg rounded w-100 mt-3 
								btn-sm btn-lg-md' style='font-size: 12px;'>Add to cart</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>";
	}
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
</script>
