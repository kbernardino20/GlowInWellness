<?php 
    session_start();
    include("admin_session.php");

	$selectedproducts = isset($_GET['selectedproducts']) ? $_GET['selectedproducts'] : '';
	$selectedqty = isset($_GET['prodQty']) ? $_GET['prodQty'] : '';

	include("admin-StockProducts_update.php");
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
	<div class="content transition text-center">
		<div class="container-fluid dashboard">
				<br><br><br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <div class="well">
                                                <br>
                                                <div style="padding: 15px;">
													<form method="post">
														<h5 class="text-center"><?php echo $selectedproducts ?></h5>
														<br>
														<label style="color: #7E007F;" for="date-picker">Enter quantity</label>
														<?php echo isset($qty_error) ? "<br><span style='color:red; font-size: 10px;'>" . $qty_error . "</span>" : "" ?>
														<br>
														<input type="hidden" class="form-control" name="productname_hidden" value="<?php echo $selectedproducts; ?>">
														<input type="text" class="form-control mb-3" name="ProductQty" value="<?php echo $selectedqty; ?>">
														
														<div class="d-flex justify-content-between">
															<a href="admin-Inventories.php" class="btn btn-outline-primary btn-lg rounded w-100 mt-3 me-2" style="max-width: 48%;">Back</a>
															<input type="submit" class="btn btn-primary btn-lg rounded w-100 mt-3" style="max-width: 48%;" value="Submit" name="submit">
														</div>
														<br><br>
													</form>
												</div>

                                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
