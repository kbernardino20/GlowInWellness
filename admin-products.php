<?php 
    session_start();
	include("admin_session.php");

    include("db_connect.php");


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
<?php include("admin-topbar.php");?>

		<!--Sidebar-->
		<?php include("admin-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
			
                <h6 class="mb-0 text-center" style="font-size: 50px; font-family: 'Satisfy', cursive; color: #7E007F;">Glow in Wellnesss Products</h6> <br>
				<div class="row">

				<?php
				include("db_connect.php");

				$query = "SELECT * FROM tbl_products";
				$result = $db_connection->query($query);

				while ($row = $result->fetch_assoc()) {
					echo "<div class='col-12 col-md-6 col-lg-6 mb-3'>
							<div class='card'>
								<div class='card-body'>
									<div class='row'>
										<div class='col-12 col-sm-4 d-flex justify-content-center align-items-center mb-3 mb-sm-0'>
											<img src='Photos/Products/".$row['item_img']."' alt='' class='img-fluid' style='max-width: 100%; height: auto;'>
										</div>
										<div class='col-12 col-sm-8'>
											<h5>".$row['product_name']."</h5>
											<p>A$".$row['price']."</p>
											<p>Remaining stocks: ".$row['stock']."</p>
											<br><br>
											<form method='POST' action='user-add_to_cart.php'>
												<input type='hidden' name='product_name_hidden' value='".$row['product_name']."'>
												<input type='hidden' name='price_hidden' value='".$row['price']."'>
												<input type='hidden' name='stock_hidden' value='".$row['stock']."'>
												<div class='d-flex flex-column flex-sm-row'>
													<a href='admin-UpdateProducts.php?selectedproducts=".urlencode($row['product_name'])."' class='btn btn-primary btn-lg rounded w-100 w-sm-auto mb-2 mb-sm-0 me-sm-2' style='font-size: 12px;'>Update Info</a>
													<a href='javascript:void(0);' onclick='confirmDelete(\"" . urlencode($row['product_name']) . "\")' class='btn btn-outline-primary btn-lg rounded w-100 w-sm-auto' style='font-size: 12px;'>Delete</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>";
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
