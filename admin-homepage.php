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
			
                <h6 class="mb-0" style="font-size: 50px; font-family: 'Satisfy', cursive; color: #7E007F;">Services</h6> <br>
                <br><br>
				<h6 class="mb-0" style="font-size: 20px; cursive; color: #7E007F;">Massage Therapy</h6> <br>
				<?php
					include("db_connect.php");

					$query = "SELECT * FROM tbl_services WHERE Service_category = 'Massage Therapy'";
					$result = $db_connection->query($query);

					while ($row = $result->fetch_assoc()) {
					echo "<div class='col-md-6 col-lg-12'>
							<div class='card'>
								<div class='card-body'>
									<div class='row'>
										<div class='col-4 d-flex align-items-center'>
											<img src='assets/imgs/services1.jpg' alt='' style='width: 2.5in; height: 1.5in;'>
										</div>
										<div class='col-8'>
											<h6>" .$row["service"]." - A$".$row["price"]."</h6>
											<p>".$row["service_description"]."</p>
											<a href='user-Booking_SelectDate.php?selectedservice=".urlencode($row['service'])."' class='btn btn-primary btn-lg rounded w-md mt-3' style='font-size: 12px;'>Make an appointment</a>
											
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
			 	?>	

                <br><br>
                <h6 class="mb-0" style="font-size: 20px; cursive; color: #7E007F;">Bowen Therapy</h6> <br>

				<?php
					include("db_connect.php");

					$query = "SELECT * FROM tbl_services WHERE Service_category = 'Bowen Therapy'";
					$result = $db_connection->query($query);

					while ($row = $result->fetch_assoc()) {
					echo "<div class='col-md-6 col-lg-12'>
							<div class='card'>
								<div class='card-body'>
									<div class='row'>
										<div class='col-4 d-flex align-items-center'>
											<img src='assets/imgs/services1.jpg' alt='' style='width: 2.5in; height: 1.5in;'>
										</div>
										<div class='col-8'>
											<h6>" .$row["service"]." - A$".$row["price"]."</h6>
											<p>".$row["service_description"]."</p>
											<a href='user-Booking_SelectDate.php?selectedservice=".urlencode($row['service'])."' class='btn btn-primary btn-lg rounded w-md mt-3' style='font-size: 12px;'>Make an appointment</a>
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
				 ?>


				<br><br>
                <h6 class="mb-0" style="font-size: 20px; cursive; color: #7E007F;">Remedial Therapy</h6> <br>

				<?php
					include("db_connect.php");

					$query = "SELECT * FROM tbl_services WHERE Service_category = 'Remedial Therapy'";
					$result = $db_connection->query($query);

					while ($row = $result->fetch_assoc()) {
					echo "<div class='col-md-6 col-lg-12'>
							<div class='card'>
								<div class='card-body'>
									<div class='row'>
										<div class='col-4 d-flex align-items-center'>
											<img src='assets/imgs/services1.jpg' alt='' style='width: 2.5in; height: 1.5in;'>
										</div>
										<div class='col-8'>
											<h6>" .$row["service"]." - A$".$row["price"]."</h6>
											<p>".$row["service_description"]."</p>
											<a href='user-Booking_SelectDate.php?selectedservice=".urlencode($row['service'])."' class='btn btn-primary btn-lg rounded w-md mt-3' style='font-size: 12px;'>Make an appointment</a>
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
				 ?>
				
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
